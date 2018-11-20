<?php 

namespace App\Http\Controllers;

use App\Entity\Estado;
use App\Entity\Parlamentar;
use Illuminate\Http\Request;
use App\Components\Pagination;
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
        $parametros['pagina'] = $request->query('pagina', 1);
        $parametros['limite'] = $request->query('limite', 20);
        $parametros['direcao'] = $request->query('direcao', 'asc');
        $parametros['ordenacao'] = $request->query('ordenacao', 'e.uf');
        $parametros['pesquisa'] = $request->query('pesquisa', '');

        $estados = $this->estadoRepository->listarTodosEstados($parametros);
        $quantidadeEstados = $this->estadoRepository->quantidadeEstados(
            $parametros
        );

        $pagination = Pagination::execute(
            $quantidadeEstados,
            $parametros['limite'],
            $parametros['pagina']
        );

        foreach ($estados as $index => $estado) {
            $quantidadeParlamentares = $this->parlamentarRepository->totalDeParlamentares(
                ['estado' => $estado['nome']]
            );

            $estados[$index]['quantidadeParlamentares'] = $quantidadeParlamentares;
        }

        $data = [
            'estados' => $estados,
            'pagination' => $pagination
        ];

        return view('lista_estados', [
            'data' => $data
        ]);
    }
}