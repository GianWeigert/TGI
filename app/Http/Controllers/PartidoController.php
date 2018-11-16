<?php 

namespace App\Http\Controllers;

use App\Entity\Partido;
use Doctrine\ORM\EntityManager;
use Illuminate\Routing\Controller as BaseController;

class PartidoController extends BaseController
{
    private $partidoRepository;

    public function __construct(EntityManager $em)
    {
        $this->partidoRepository = $em->getRepository(
            Partido::class
        );
    }

    public function listarPartido()
    {
        $partidos = $this->partidoRepository->listarTodosPartidos();

        $data = [
            'partidos' => $partidos
        ];

        return view('lista_partido', [
            'data' => $data
        ]);
    }
}