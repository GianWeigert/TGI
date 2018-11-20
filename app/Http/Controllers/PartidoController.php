<?php 

namespace App\Http\Controllers;

use App\Entity\Partido;
use App\Entity\Parlamentar;
use Illuminate\Http\Request;
use App\Components\Pagination;
use Doctrine\ORM\EntityManager;
use Illuminate\Routing\Controller as BaseController;

class PartidoController extends BaseController
{
    private $partidoRepository;
    private $parlamentarRepository;

    public function __construct(EntityManager $em)
    {
        $this->partidoRepository = $em->getRepository(
            Partido::class
        );
        $this->parlamentarRepository = $em->getRepository(
            Parlamentar::class
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
}