<?php 

namespace App\Http\Controllers;

use App\Entity\Estado;
use App\Entity\Partido;
use App\Entity\Parlamentar;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
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

        $partidos = $this->partidoRepository->listarTodosPartidos('');

        $estados = $this->estadoRepository->listarTodosEstados('');

        $data = [
            'parlamentares' => $parlamentares,
            'partidos' => $partidos,
            'estados' => $estados
        ];

        return view('listar_parlamentares', [
            'data' => $data
        ]);
    }
}