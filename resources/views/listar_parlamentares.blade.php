@extends('layout.app')

@section('titulo', 'Menu Principal')
@section('subTitulo', 'index')

@section('conteudo')
    <div class="span12"> 
        <form class="row" action="{{ route('listar.parlamentares') }}" method="get">
            <div class="span4">
                <label for="pesquisa-partido">Pesquisar pelo nome do parlamentar</label>

                <div>
                    <input id="pesquisa-partido" type="text" name="pesquisa" value="{{ Request::get('pesquisa') }}
" />

                    <button>
                        <i class="icon-search" aria-hidden="true"></i> Pesquisar
                    </button>
                </div>
            </div>

            <div class="span4">
                <label for="filtro-partido"> Partido </label>
                <select id="filtro-partido" name="partido" onchange="this.form.submit();">
                    <option value="">--</option>
                    @foreach ($data['partidos'] as $partido)
                        <option value="{{$partido['sigla']}}" @if(Request::get('partido') == $partido['sigla']) selected @endif>{{ $partido['sigla'] }}</option>
                    @endforeach
                </select>
            </div>


            <div class="span4">
                <label for="filtro-estado"> Estado </label>
                <select id="filtro-estado" name="estado" onchange="this.form.submit();">
                    <option value="">--</option>
                    @foreach ($data['estados'] as $estado)
                        <option value="{{$estado['nome']}}" @if(Request::get('estado') == $estado['nome']) selected @endif>{{ $estado['nome'] }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

    <div class="span12">
        <div clas="row">
            @foreach ($data['parlamentares'] as $parlamentar)
                <div class="span3">    
                    <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [150x150]" style="width: 200px; height: 200px;" src="{{ URL::asset('images/parlamentares/parlamentar_sem_foto.png') }}" data-holder-rendered="true">
                            
                            <div class="text-primary"> Número de identificação: {{ $parlamentar['id'] }}</div>
                            <div class="text-primary"> Nome: {{ $parlamentar['nome'] }}</div>
                            <div class="text-primary"> Partido: {{ $parlamentar['partido'] }}</div>
                            <div class="text-primary"> Estado: {{ $parlamentar['estado'] }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection