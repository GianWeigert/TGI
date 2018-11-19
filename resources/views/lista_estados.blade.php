@extends('layout.app')

@section('titulo', 'Busca por Estado')
@section('subTitulo', 'Escolha um estado')

@section('conteudo')    
    <form class="row my-4" action="{{ route('listar.estados') }}" method="get">
        <div class="col-md-8 hidden-xs"></div>

        <div class="col-md-4 col-sm-12 text-center">
            <div class="d-flex flex-column">
                <div class="form-group">    
                    <div class="input-group">                            
                        <input class="form-control" placeholder="Buscar" id="pesquisa-estados" type="text" name="pesquisa" value="{{ Request::get('pesquisa') }}" />            
                        <div class="input-group-append">
                            <button class="btn mt-auto btn-primary mb-0">
                              <i class="icon-search " aria-hidden="true"></i> Pesquisar
                            </button>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </form>
    
    <div class="row">
        @foreach ($data['estados'] as $estado)
            <div class="card col-sm-12 col-md-3 my-3 px-0" >
                <div class="card-header">
                    <h5>{{ $estado['uf'] }}</h5>
                </div>
                <div class="card-body">
                    <h4 class="card-title my-1">{{ $estado['nome'] }}</h4>
                    <h5 class="card-subtitle my-1">Qtd Parlamentares {{ $estado['quantidadeParlamentares'] }}</h5>
                    <img class="card-img my-3 img-thumbnail" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [150x150]" src="{{ URL::asset($estado['image']) }}" data-holder-rendered="true">                    
                </div>
                <a class="btn btn-block rounded-0 btn-primary mb-0" href="{{ route('listar.parlamentares', ['estado' => $estado['nome']]) }}">Escolher</a>
            </div>
        @endforeach        
    </div>
@endsection