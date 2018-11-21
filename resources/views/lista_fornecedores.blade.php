@extends('layout.app')

@section('titulo', 'Fornecedores')
@section('msgTop', 'Lista de Fornecedores')
@section('msgTop2', '')


@section('conteudo')
    <div class="span12"> 
        <form class="row my-4" action="{{ route('listar.fornecedores') }}" method="get">
            <div class="col-md-4 hidden-xs"></div>
            <div class="col-md-4 col-sm-12">
                <label  for="pesquisa-fornecedor-cnpj">CNPJ</label>
                <div class="form-group">    
                    <div class="input-group">    
                        <input id="pesquisa-fornecedo-cnpj" class="form-control" placeholder="Buscar" type="text" name="cnpj" value="{{ Request::get('cnpj') }}"/>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <label class="" for="pesquisa-fornecedor-nome">Nome do forncedor</label>
                <div class="form-group">    
                    <div class="input-group">    
                        <input id="pesquisa-fornecedo-nome" class="form-control" placeholder="Buscar" type="text" name="pesquisa" value="{{ Request::get('pesquisa') }}"/>
                        <div class="input-group-append">
                            <button class="btn btn-primary">
                                <i class="icon-search" aria-hidden="true"></i> Pesquisar
                            </button>                    
                        </div>
                    </div>
                </div>
            </div>    
        </form>
    </div>



    <table class="table col-sm-12">
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

    @include('layout.pagination', ['pagination' => $data['pagination']])
@endsection