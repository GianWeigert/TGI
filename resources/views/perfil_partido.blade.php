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
        <div class="card-title col-sm-12 h3 col-md-12 mb-3">{{ $data['partido']['nome'] }} </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
          <img class="card-img img-thumbnail" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [150x150]" src="{{ URL::asset($data['partido']['image']) }}" data-holder-rendered="true">
        </div>

        <div class="card-subtitle col-lg-5 col-sm-12 col-md-5">

          <h5> Sigla: </h5>

          <p>
             {{ $data['partido']['sigla'] }}
          </p>
          <h5> Número de parlamentares: </h5>

          <p>
             {{ $data['partido']['quantidadeParlamentares'] }}
          </p>
          <h5> Estado com mais parlamentares: </h5>

          <p>
             {{ $data['partido']['estadoComMaisParlamentares'] }}
          </p>
        </div>

        <div class="card-subtitle col-lg-4 col-sm-12 col-md-4 ">

        </div>

      </div>
      <div class="row">
        <div class="col-sm-12 text-center my-4">
          <p class=" display-4">Gastos dos parlamentares deste partido</p>
        </div>
      </div>

    <div class="row">
      <div class="table-responsive">
        
        <table class="table table-striped col-sm-12">
          <thead class=" bg-primary text-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Parlamentar</th>
              <th scope="col">Estado</th>
              <th scope="col">Número de despesas</th>
              <th scope="col">Total Gasto</th>
            </tr>
          </thead>

          <tbody class="font-style text-truncate">
            @foreach($data['despesas'] as $despesa)
              <tr>
                <td scope="col">{{ $despesa['parlamentarId'] }}</td>
                <td scope="col">{{ $despesa['parlamentarNome']}}</td>
                <td scope="col">{{ $despesa['estado']}}</td>
                <td scope="col">{{ $despesa['vezesGasta']}}</td>
                <td scope="col">R$ {!! str_replace('.', ',', $despesa['totalGasto']) !!}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @include('layout.pagination', ['pagination' => $data['pagination']])
  </div>
@endsection