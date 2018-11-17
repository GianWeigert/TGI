<?php 

namespace App\Http\Controllers;

use App\Entity\Estado;
use App\Entity\Parlamentar;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use Illuminate\Routing\Controller as BaseController;

class EstadoController extends BaseController
{
    private $estadoRepository;
    private $parlamentarRepository;

    public function __construct(EntityManager $em)
    {
        $this->estadoRepository = $em->getRepository(
            Estado::class
        );
        $this->parlamentarRepository = $em->getRepository(
            Parlamentar::class
        );
    }

    public function listarEstados(Request $request)
    {
        $pesquisa = $request->query('pesquisa');

        $estados = $this->estadoRepository->listarTodosEstados($pesquisa);

        foreach ($estados as $index => $estado) {
            $quantidadeParlamentares = $this->parlamentarRepository->totalDeParlamentares(
                ['estado' => $estado['nome']]
            );

            $estados[$index]['quantidadeParlamentares'] = $quantidadeParlamentares;
        }

        $data = [
            'estados' => $estados
        ];

        return view('lista_estados', [
            'data' => $data
        ]);
    }
}