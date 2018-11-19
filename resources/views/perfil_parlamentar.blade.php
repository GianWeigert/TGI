@extends('layout.app')

@section('titulo', 'Perfil')
@section('subTitulo', '')

@section('conteudo')
  <div class="card text-justify mt-5">
    <!--div class="card-header bg-primary text-light">
     Gastos públicos
    </div-->
    <div class="card-body">
      <div class="row">
        <div class="card-title col-sm-12 h3 col-md-12 mb-3">{{ $data['parlamentar']['nome'] }} </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
          <img class="card-img img-thumbnail" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [150x150]" src="{{ URL::asset('images/parlamentares/parlamentar_sem_foto.png') }}" data-holder-rendered="true">
        </div>

        <div class="card-subtitle col-lg-3 col-sm-12 col-md-2">

          <h5> Partido: </h5>

          <p>
             {{ $data['parlamentar']['partido'] }}
          </p>
          <h5> Estado: </h5>

          <p>
             {{ $data['parlamentar']['estado'] }}
          </p>
        </div>

        <div class="card-subtitle col-lg-3 col-sm-12 col-md-3 ">

          <h5> Maior gasto: </h5>

          <p>
            R$ {!! str_replace('.', ',', $data['maiorDespesa']['valorLiquido']) !!}
          </p>
          <h5> Data : </h5>

          <p>
             {!! $data['maiorDespesa']['dataEmissao']->format('d/m/Y') !!}
          </p>

        </div>

        <div class="card-subtitle col-lg-3 col-sm-12 col-md-3 ">

          <h5> Descrição gasto: </h5>

          <p>
             {{ $data['maiorDespesa']['despesa'] }}
          </p>
          <h5> Fornecedor </h5>

          <p>
             {{ $data['maiorDespesa']['fornecedor'] }}
          </p>

        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center my-4">
          <p class=" display-3">Todos os gastos</p>
        </div>
      </div>

    <div class="row mt-3">
      <table class="table  table-striped col-lg-12 col-md-12 col-sm-12 float-right">
        <thead class="bg-primary text-light">
          <tr>
            <th scope="col">Tipo</th>
            <th scope="col">Fornecedor</th>
            <th scope="col">Data</th>
            <th scope="col">Valor </th>
          </tr>
        </thead>

        <tbody>
          @foreach ($data['despesas'] as $despesa)
            <tr>
              <td>{{ $despesa['descricao'] }}</td>
              <td>{{ $despesa['fornecedor'] }}</td>
              <th>{!! $despesa['dataEmissao']->format('d/m/Y') !!}</th>
              <th scope="row">R$ {!! str_replace('.', ',', $despesa['valorLiquido']) !!}</th>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @include('layout.pagination')
	</div>
@endsection