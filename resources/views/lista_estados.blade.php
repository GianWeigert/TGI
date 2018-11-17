@extends('layout.app')

@section('titulo', 'Menu Principal')
@section('subTitulo', 'index')

@section('conteudo')
    <div class="span12"> 
        <form class="row" action="{{ route('listar.estados') }}" method="get">
            <div class="span4">
                <label for="pesquisa-estado">Pesquisar pelo nome do estado</label>

                <div>
                    <input id="pesquisa-estado" type="text" name="pesquisa" value="{{ Request::get('pesquisa') }}
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
            @foreach ($data['estados'] as $estado)
                <a class="span2" href="{{ route('listar.parlamentares', ['estado' => $estado['nome']]) }}">    
                    <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">{{ $estado['uf'] }}</strong>

                            <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [150x150]" style="width: 200px; height: 150px;" src="{{ URL::asset($estado['image']) }}" data-holder-rendered="true">

                            <div class="mb-0 class="text-dark"">Nome: {{ $estado['nome'] }}</div>
                            <div class="mb-0 class="text-dark"">Quantidade de parlamentares: {{ $estado['quantidadeParlamentares'] }}</div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection