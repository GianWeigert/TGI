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

    public function estatisticaParlamentar(Request $request, $id)
    {
        $parlamentar = $this->parlamentarRepository->procurarParlamentar($id);
        $ano = $request->query('ano', 2009);
        $meses30dias = [4, 6, 9, 11];
        $totalGastoMes = [];
        $totalGastoAno = 0;

        for ($mes = 1; $mes <= 12; $mes ++) {
            $dataInicial = $ano . '-' . $mes . '-01';
            $dataInicial = new \DateTime($dataInicial);

            if ($mes == 2) {
                $dataFinal = $ano . '-' . $mes . '-27';

                if ($ano % 4 == 0) {
                    $dataFinal = $ano . '-' . $mes . '-28';
                }
            } else if (in_array($mes, $meses30dias)) {
                $dataFinal = $ano . '-' . $mes . '-30';
            } else {
                $dataFinal = $ano . '-' . $mes . '-31';
            }
            $dataFinal = new \DateTime($dataFinal);

            $totalGastoMes[$mes] = $this->despesasParlamentaresRepository->procurarValorDespesaPorData(
                $dataInicial,
                $dataFinal,
                ['parlamentarId' => $id]
            );

            $totalGastoAno = $totalGastoAno + $totalGastoMes[$mes];
        }

        $despesas = $this->despesasParlamentaresRepository->obterGastosPorDespesa([
            'parlamentarId' => $id,
            'ano' => $ano
        ]);

        $despesaTotal = 0;
        foreach ($despesas as $index => $despesa) {
            $despesas['porcentagem'][] =  (($despesa['valorLiquido'] * 100) / $totalGastoAno);
            $despesas['descricao'][] =  'abc';
        }

        $despesas['porcentagem'] = json_encode($despesas['porcentagem']);
        $despesas['descricao'] = json_encode($despesas['descricao']);

        $data = [
            'parlamentar' => $parlamentar,
            'totalGastoAno' => $totalGastoAno,
            'totalGastoMes' => $totalGastoMes,
            'gastoPorDespesa' => $despesas
        ];

        return view('estatisticas_parlamentar', [
            'data' => $data
        ]);
    }
}