<?php 

namespace App\Http\Controllers;

use App\Entity\Fornecedor;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use Illuminate\Routing\Controller as BaseController;

class FornecedorController extends BaseController
{
    private $fornecedorRepository;

    public function __construct(EntityManager $em)
    {
        $this->fornecedorRepository = $em->getRepository(
            Fornecedor::class
        );
    }

    public function listarFornecedores(Request $request)
    {
        $parametros['pagina'] = $request->query('pagina', 1);
        $parametros['limite'] = $request->query('limite', 40);
        $parametros['direcao'] = $request->query('direcao', 'asc');
        $parametros['ordernacao'] = $request->query('ordenacao', 'f.nome');
        $parametros['pesquisa'] = $request->query('pesquisa', '');
        $parametros['cnpj'] = $request->query('cnpj', '');

        $fornecedores = $this->fornecedorRepository->listarTodosFornecedores(
            $parametros
        );

        $data = [
            'fornecedores' => $fornecedores
        ];

        return view('lista_fornecedores', [
            'data' => $data
        ]);
    }
}
