@extends('layout.app')

@section('titulo', 'Menu Principal')
@section('subTitulo', 'index')

@section('conteudo')
 <div class="container">
    <div> 
        <select>
            
        </select>
    </div>

    @foreach ($data['partidos'] as $partido)
        <div class="span2">    
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">{{ $partido['sigla'] }}</strong>

                    <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [150x150]" style="width: 200px; height: 200px;" src="{{URL::asset($partido['image'])}}" data-holder-rendered="true">

                    <p class="mb-0">
                        <a class="text-dark" href="#">{{ $partido['nome'] }}</a>
                    </p>

                </div>
            </div>
        </div>
    @endforeach
<div>
@endsection