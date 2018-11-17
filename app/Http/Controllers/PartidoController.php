<?php 

namespace App\Http\Controllers;

use App\Entity\Partido;
use App\Entity\Parlamentar;
use Illuminate\Http\Request;
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
        $pesquisa = $request->query('pesquisa');

        $partidos = $this->partidoRepository->listarTodosPartidos($pesquisa);

        foreach ($partidos as $index => $partido) {
            $quantidadeParlamentares = $this->parlamentarRepository->totalDeParlamentares(
                ['partido' => $partido['sigla']]
            );

            $partidos[$index]['quantidadeParlamentares'] = $quantidadeParlamentares;
        }

        $data = [
            'partidos' => $partidos
        ];

        return view('lista_partido', [
            'data' => $data
        ]);
    }
}