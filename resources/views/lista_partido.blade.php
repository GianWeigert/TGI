@extends('layout.app')

@section('titulo', 'Partidos')
@section('msgTop', 'Escolha um partido')
@section('msgTop2', '')

@section('conteudo')
    <form class="row my-4" action="{{ route('listar.partidos') }}" method="get">
        <div class="col-md-8 hidden-xs"></div>
        <div class="col-md-4 col-sm-12 text-center">
            <div class="d-flex flex-column">              
                <div class="form-group">    
                    <div class="input-group">                                                    
                        <input class="form-control" placeholder="Buscar" id="pesquisa-partido" type="text" name="pesquisa" value="{{ Request::get('pesquisa') }}" />
                        <div class="input-group-append">
                          <button class="btn mt-auto btn-primary  mb-0">
                            Pesquisar
                          </button>                            
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </form>
    
    <div class="row">
      @if(!empty($data['partidos']))
        @foreach ($data['partidos'] as $partido)
            <div class="card col-sm-12  col-md-3 my-3 p-0" >
                <div class="card-header">
                    <h5>{{ $partido['sigla'] }}</h5>
                </div>
              <div class="card-body  ">
                <h4 class="card-title my-1">{{ $partido['nome'] }}</h4>
                <h5 class="card-subtitle my-1">Qtd Parlamentares {{ $partido['quantidadeParlamentares'] }}</h5>
                 <img class="card-img img-thumbnail " data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [150x150]" src="{{ URL::asset($partido['image']) }}" data-holder-rendered="true">
              </div>
              <a class="btn btn-block rounded-0 btn-primary mb-0 rou" href="{{ route('listar.parlamentares', ['partido' => $partido['sigla']]) }}">Escolher</a>
            </div>
        @endforeach

        @include('layout.pagination', ['pagination' => $data['pagination']])
      @else
        <p> Nenhum partido encontrado!</p>
      @endIf
    </div>
@endsection