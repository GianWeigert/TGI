<?php 

namespace App\Http\Controllers;

use App\Entity\Estado;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use Illuminate\Routing\Controller as BaseController;

class EstadoController extends BaseController
{
    private $estadoRepository;

    public function __construct(EntityManager $em)
    {
        $this->estadoRepository = $em->getRepository(
            Estado::class
        );
    }

    public function listarEstados(Request $request)
    {
        $pesquisa = $request->query('pesquisa');

        $estados = $this->estadoRepository->listarTodosEstados($pesquisa);

        $data = [
            'estados' => $estados
        ];

        return view('lista_estados', [
            'data' => $data
        ]);
    }
}