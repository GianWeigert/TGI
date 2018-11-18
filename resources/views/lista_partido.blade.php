@extends('layout.app')

@section('titulo', ' Partidos')
@section('subTitulo', 'Escolha um partido')

@section('conteudo')
    <form class="row" action="{{ route('listar.partidos') }}" method="get">
        <div class="col-12 text-center m-4">
            <div class="d-flex flex-column">
                <input class="text-center form-control" placeholder="Buscar" id="pesquisa-partido" type="text" name="pesquisa" value="{{ Request::get('pesquisa') }}
" />
              <button class="btn mt-auto btn-outline-primary  mb-0">
                <i class="icon-search " aria-hidden="true"></i> Pesquisar
              </button>
            </div>
        </div>
    </form>   
    
    <div class="row">
        @foreach ($data['partidos'] as $partido)
            <div style="height: 400px; width: 400px;" class="card col-sm-12  col-md-6 col-lg-3 float-left my-3 clearfix" >
                <div class="card-header">
                    <h5>{{ $partido['sigla'] }}</h5>
                </div>
              <div class="card-body d-flex flex-column ">
                <h4 class="card-title my-1">{{ $partido['nome'] }}</h4>
                 <img style="width: 200px; height: 150px;" class="card-img flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [150x150]" src="{{ URL::asset($partido['image']) }}" data-holder-rendered="true">
                <a class="btn mt-auto btn-outline-primary  mb-0" href="{{ route('listar.parlamentares', ['partido' => $partido['sigla']]) }}">Escolher</a>
              </div>
            </div>
        @endforeach            
    </div>    
@endsection