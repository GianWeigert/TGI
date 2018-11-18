@extends('layout.app')

@section('titulo', 'Busca por Estado')
@section('subTitulo', 'Escolha um estado')

@section('conteudo')
    <div class="span12 my-4"> 
        <form class="row" action="{{ route('listar.estados') }}" method="get">
            <div class="col-12 text-center m-4">
                <div class="d-flex flex-column">
                    <input class="text-center form-control" placeholder="Buscar" id="pesquisa-estados" type="text" name="pesquisa" value="{{ Request::get('pesquisa') }}
" />

                  <button class="btn mt-auto btn-outline-primary  mb-0">
                    <i class="icon-search " aria-hidden="true"></i> Pesquisar
                  </button>
                </div>
            </div>
        </form>
    </div>

    @foreach ($data['estados'] as $estado)
            <div style="height: 400px; width: 400px;" class="card col-sm-12  col-md-6 col-lg-3 float-left my-3 clearfix" >
                <div class="card-header">
                    <h5>{{ $estado['uf'] }}</h5>
                </div>
              <div class="card-body d-flex flex-column ">
                <h4 class="card-title my-1">{{ $estado['nome'] }}</h4>
                 <img style="width: 200px; height: 150px;" class="card-img flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [150x150]" src="{{ URL::asset($estado['image']) }}" data-holder-rendered="true">
                <a class="btn mt-auto btn-outline-primary  mb-0" href="{{ route('listar.parlamentares', ['estado' => $estado['nome']]) }}">Escolher</a>
              </div>
            </div>
    @endforeach
    



        </div>
    </div>
@endsection