@extends('layout.app')

@section('titulo', 'Menu Principal')
@section('subTitulo', 'index')

@section('conteudo')
    <div class="span12"> 
        <form class="row" action="{{ route('listar.partidos') }}" method="get">
            <div class="span4">
                <label for="pesquisa-partido">Pesquisar pelo nome do partido</label>

                <div>
                    <input id="pesquisa-partido" type="text" name="pesquisa" value="{{ Request::get('pesquisa') }}
" />

                  <button>
                    <i class="icon-search" aria-hidden="true"></i> Pesquisar
                  </button>
                </div>
            </div>
        </form>
    </div>

    <div class="span12">
        <div clas="row">
            @foreach ($data['partidos'] as $partido)
                <a class="span2" href="{{ route('listar.parlamentares', ['partido' => $partido['sigla']]) }}">    
                    <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">{{ $partido['sigla'] }}</strong>

                            <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [150x150]" style="width: 200px; height: 200px;" src="{{ URL::asset($partido['image']) }}" data-holder-rendered="true">

                            <div class="mb-0 class="text-dark"">Nome: {{ $partido['nome'] }}</div>
                            <div class="mb-0 class="text-dark"">Quantidade de parlamentares: {{ $partido['quantidadeParlamentares'] }}</div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection