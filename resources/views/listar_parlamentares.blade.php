@extends('layout.app')

@section('titulo', 'Parlamentares')
@section('subTitulo', Request::get("estado") == "" ? "Todos os estados" : Request::get("estado"))

@section('conteudo')    
    <form class="row my-4" action="{{ route('listar.parlamentares') }}" method="get">                       
        <div class="col-md-4 col-sm-12">                
            <label for="filtro-partido"> Partido </label>
            <div class="form-group">
                <select id="filtro-partido"  class="form-control"  name="partido" onchange="this.form.submit();">
                    <option value="">Todos</option>
                    @foreach ($data['partidos'] as $partido)
                        <option value="{{$partido['sigla']}}" @if(Request::get('partido') == $partido['sigla']) selected @endif>{{ $partido['sigla'] }}</option>
                    @endforeach
                </select>
            </div>                
        </div>        
        <div class="col-md-4 col-sm-12">
            <label for="filtro-estado"> Estado </label>
            <div class="form-group">
                <select id="filtro-estado"  class="form-control"  name="estado" onchange="this.form.submit();">
                    <option value="">Todos</option>
                    @foreach ($data['estados'] as $estado)
                        <option value="{{$estado['nome']}}" @if(Request::get('estado') == $estado['nome']) selected @endif>{{ $estado['nome'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>        
        <div class="col-md-4 col-sm-12">
            <label class="" for="pesquisa-partido ">Nome do parlamentar</label>
            <div class="form-group">    
                <div class="input-group">    
                    <input id="pesquisa-partido" class="form-control" placeholder="Buscar" type="text" name="pesquisa" value="{{ Request::get('pesquisa') }}"/>
                    <div class="input-group-append">
                        <button class="btn btn-primary">
                            <i class="icon-search" aria-hidden="true"></i> Pesquisar
                        </button>                    
                    </div>
                </div>
            </div>
        </div>
    </form>            

    <div class="row">        
        @foreach ($data['parlamentares'] as $parlamentar)        
            <div class="card col-sm-12 col-md-3 my-3 px-0">
                <div class="card-header">
                    
                    <img class="card-img img-thumbnail " data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [150x150]" src="{{ URL::asset('images/parlamentares/parlamentar_sem_foto.png') }}" data-holder-rendered="true">
                </div>
                <div class="card-body">                    
                    <div class="text-dark"> Número de identificação: {{ $parlamentar['id'] }}</div>
                    <div class="text-dark "> Nome: {{ $parlamentar['nome'] }}</div>
                    <div class="text-dark "> Partido: {{ $parlamentar['partido'] }}</div>
                    <div class="text-dark "> Estado: {{ $parlamentar['estado'] }}</div>
                </div>
                <a class="btn btn-block rounded-0 btn-primary mb-0" href="">Escolher</a>
            </div>
        @endforeach        
    </div>
@endsection