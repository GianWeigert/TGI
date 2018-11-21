@extends('layout.app')

@section('titulo', 'Perfil Partido')
@section('msgTop', 'Perfil do Partido')
@section('msgTop2', '')

@section('conteudo')
  <div class="card text-justify mt-5">
    <!--div class="card-header bg-primary text-light">
     Gastos públicos
    </div-->
    <div class="card-body">
      <div class="row">
        <div class="card-title col-sm-12 h3 col-md-12 mb-3">{{ '*Nome Partido*' }} </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
          <img class="card-img img-thumbnail" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [150x150]" src="{{ URL::asset('images/partidos/pt.png') }}" data-holder-rendered="true">
        </div>

        <div class="card-subtitle col-lg-5 col-sm-12 col-md-5">

          <h5> Sigla: </h5>

          <p>
             {{ 'PT' }}
          </p>
          <h5> Número de parlamentares: </h5>

          <p>
             {{ '255' }}
          </p>
          <h5> Estado com mais parlamentares: </h5>

          <p>
             {{ 'São Paulo' }}
          </p>
        </div>

        <div class="card-subtitle col-lg-4 col-sm-12 col-md-4 ">

          <h5> Parlamentar que mais gastou: </h5>

          <p>
            R$ {!! 'Lula' !!}
          </p>
          <h5> Parlamentar que menos gastou: </h5>

          <p>
             {!! 'Dilma' !!}
          </p>

        </div>

      </div>
      <div class="row">
        <div class="col-sm-12 text-center my-4">
          <p class=" display-4">Total de gastos dos parlamentares</p>
        </div>
      </div>

    <div class="row">
      <div class="table-responsive">
        
        <table class="table table-striped col-sm-12">
          <thead class=" bg-primary text-light">
            <tr>
              <th scope="col">Parlamentar</th>
              <th scope="col">Estado</th>
              <th scope="col">Total Gasto</th>
            </tr>
          </thead>

          <tbody class="font-style text-truncate">
            <tr>
              <td scope="col">nome</td>
              <td scope="col">nome estado</td>
              <td scope="col">Valor </td>
            </tr>
          </tbody>
        </table>
      </div>
 
    </div>

  </div>
@endsection