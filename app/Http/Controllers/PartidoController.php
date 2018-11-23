<?php 

namespace App\Http\Controllers;

use App\Entity\Partido;
use App\Entity\Parlamentar;
use Illuminate\Http\Request;
use App\Components\Pagination;
use Doctrine\ORM\EntityManager;
use App\Entity\DespesasParlamentares;
use Illuminate\Routing\Controller as BaseController;

class PartidoController extends BaseController
{
    private $partidoRepository;
    private $parlamentarRepository;
    private $despesasParlamentaresRepository;

    public function __construct(EntityManager $em)
    {
        $this->partidoRepository = $em->getRepository(
            Partido::class
        );
        $this->parlamentarRepository = $em->getRepository(
            Parlamentar::class
        );
        $this->despesasParlamentaresRepository = $em->getRepository(
            DespesasParlamentares::class
        );
    }

    public function listarPartidos(Request $request)
    {
        $parametros['pagina'] = $request->query('pagina', 1);
        $parametros['limite'] = $request->query('limite', 20);
        $parametros['direcao'] = $request->query('direcao', 'asc');
        $parametros['ordenacao'] = $request->query('ordenacao', 'p.sigla');
        $parametros['pesquisa'] = $request->query('pesquisa', '');

        $partidos = $this->partidoRepository->listarTodosPartidos($parametros);
        $quantidadePartidos = $this->partidoRepository->quantidadePartidos(
            $parametros
        );

        foreach ($partidos as $index => $partido) {
            $quantidadeParlamentares = $this->parlamentarRepository->totalDeParlamentares(
                ['partido' => $partido['sigla']]
            );

            $partidos[$index]['quantidadeParlamentares'] = $quantidadeParlamentares;
        }

        $pagination = Pagination::execute(
            $quantidadePartidos,
            $parametros['limite'],
            $parametros['pagina']
        );

        $data = [
            'partidos' => $partidos,
            'pagination' => $pagination
        ];

        return view('lista_partido', [
            'data' => $data
        ]);
    }

    public function perfilPartido(Request $request, $partidoId)
    {
        $partido = $this->partidoRepository->find($partidoId);
        $partido = $partido->getInArray();
        $partido['estadoComMaisParlamentares'] = 'Não há parlamentares deste partido.';

        $partido['quantidadeParlamentares'] = $this->parlamentarRepository->totalDeParlamentares([
            'partido' => $partido['sigla']
        ]);

        $estados = $this->parlamentarRepository->estadosMaisParalmentaresPartido(
            $partido['sigla']
        );

        foreach ($estados as $index => $estado) {
            if ($index > 0) {
                if ($estados[$index - 1]['quantidadeParlamentares'] != $estado['quantidadeParlamentares']) {
                    break;
                }

                $partido['estadoComMaisParlamentares'] = $partido['estadoComMaisParlamentares'] . ' e ' . $estado['estado'];
            } else {
                $partido['estadoComMaisParlamentares'] = $estado['estado'];
            }
        }

        if (!empty($estados)) {
            $partido['estadoComMaisParlamentares'] = $partido['estadoComMaisParlamentares'] . ' com ' . $estados[0]['quantidadeParlamentares'] . ' parlamentares';
        }

        $parametros['pagina'] = $request->query('pagina', 1);
        $parametros['limite'] = $request->query('limite', 10);
        $parametros['direcao'] = $request->query('direcao', 'desc');
        $parametros['ordenacao'] = $request->query('ordenacao', 'totalGasto');
        $parametros['partido'] = $partido['sigla'];

        $despesas = $this->despesasParlamentaresRepository->obterGastosDosParlamentares(
            $parametros
        );

        $pagination = Pagination::execute(
            $partido['quantidadeParlamentares'],
            $parametros['limite'],
            $parametros['pagina']
        );

        $data = [
            'partido' => $partido,
            'despesas' => $despesas,
            'pagination' => $pagination
        ];

        return view('perfil_partido',[
            'data' => $data
        ]);
    }
}