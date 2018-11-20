<?php 

namespace App\Http\Controllers;

use App\Entity\Estado;
use App\Entity\Partido;
use App\Entity\Parlamentar;
use Illuminate\Http\Request;
use App\Components\Pagination;
use Doctrine\ORM\EntityManager;
use App\Entity\DespesasParlamentares;
use Illuminate\Routing\Controller as BaseController;

class ParlamentarController extends BaseController
{
    private $estadoRepository;
    private $partidoRepository;
    private $parlamentarRepository;

    public function __construct(EntityManager $em)
    {
        $this->estadoRepository = $em->getRepository(
            Estado::class
        );
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

    public function perfilParlamentar(Request $request, $id)
    {
        $parametros['pagina'] = $request->query('pagina', 1);
        $parametros['limite'] = $request->query('limite', 20);
        $parametros['direcao'] = $request->query('direcao', 'desc');
        $parametros['ordenacao'] = $request->query('ordenacao', 'dp.dataEmissao');
        $parametros['parlamentarId'] = $id;

        $parlamentar = $this->parlamentarRepository->procurarParlamentar($id);

        $maiorDespesa = $this->despesasParlamentaresRepository->listarMaiorDespesaParlamentar(
            $id
        );

        $despesas = $this->despesasParlamentaresRepository->listarTodasDespesas(
            $parametros
        );

        $quantidadeDespesas = $this->despesasParlamentaresRepository->quantidadeDespesas(
            $parametros
        );

        $pagination = Pagination::execute(
            $quantidadeDespesas,
            $parametros['limite'],
            $parametros['pagina']
        );

        $data = [
            'parlamentar'  => $parlamentar,
            'maiorDespesa' => $maiorDespesa,
            'despesas'  => $despesas,
            'pagination' => $pagination
        ];

        return view('perfil_parlamentar', [
            'data' => $data
        ]);
    }

    public function listarParlamentares(Request $request)
    {
        $parametros['partido'] = $request->query('partido', '');
        $parametros['estado'] = $request->query('estado', '');
        $parametros['pagina'] = $request->query('pagina', 1);
        $parametros['limite'] = $request->query('limite', 20);
        $parametros['direcao'] = $request->query('direcao', 'asc');
        $parametros['ordernacao'] = $request->query('ordenacao', 'pa.nome');
        $parametros['pesquisa'] = $request->query('pesquisa', '');

        $totalDeParlamentares = $this->parlamentarRepository->totalDeParlamentares(
            $parametros
        );

        $parlamentares = $this->parlamentarRepository->listarTodosParlamentares(
            $parametros
        );

        $partidos = $this->partidoRepository->listarTodosPartidos([
            'pagina' => 1,
            'limite' => 100,
            'ordenacao' => 'p.sigla',
            'direcao' => 'asc',
            'pesquisa' => ''
        ]);

        $estados = $this->estadoRepository->listarTodosEstados([
            'pagina' => 1,
            'limite' => 100,
            'ordenacao' => 'e.nome',
            'direcao' => 'asc',
            'pesquisa' => ''
        ]);

        $pagination = Pagination::execute(
            $totalDeParlamentares,
            $parametros['limite'],
            $parametros['pagina']
        );

        $data = [
            'parlamentares' => $parlamentares,
            'partidos' => $partidos,
            'estados' => $estados,
            'pagination' => $pagination
        ];

        return view('listar_parlamentares', [
            'data' => $data
        ]);
    }

    public function estatisticaParlamentar(){
        return view('estatisticas_parlamentares');
    }
}