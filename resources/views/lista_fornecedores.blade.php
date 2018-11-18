@extends('layout.app')

@section('titulo', 'Menu Principal')
@section('subTitulo', 'index')

@section('conteudo')
    <div class="span12"> 
        <form class="row" action="{{ route('listar.fornecedores') }}" method="get">
            <div class="span4">
                <label for="pesquisa-fornecedor-nome">Pesquisar pelo nome do forncedor</label>

                <div>
                  <input id="pesquisa-fornecedo-nome" type="text" name="pesquisa" value="{{ Request::get('pesquisa') }}" />
                </div>
            </div>

            <div class="span4">
                <label for="pesquisa-fornecedor-cnpj">Pesquisar pelo cnpj do forncedor</label>

                <div>
                  <input id="pesquisa-fornecedo-cnpj" type="text" name="cnpj" value="{{ Request::get('cnpj') }}" />
                </div>
            </div>


            <button>
                <i class="icon-search" aria-hidden="true"></i> Pesquisar
            </button>
        </form>
    </div>

    <div class="span12">
        <div clas="row">
            <table>
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Nome </th>
                        <th> CNPJ ou CPF </th>
                    </tr>
                </thead>

                @foreach ($data['fornecedores'] as $fornecedor)
                    <tbody>
                        <tr>
                            <td>{{ $fornecedor['id'] }}</td>
                            <td>{{ $fornecedor['nome'] }}</td>
                            <td>{{ $fornecedor['cnpj'] }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection