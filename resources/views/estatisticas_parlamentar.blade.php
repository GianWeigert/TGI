@extends('layout.app')

@section('titulo', 'Estatistica Parlamentar')
@section('msgTop', 'Estatistica  Parlamentar')
@section('msgTop2', Request::get("ano") == "" ? "" : 'Ano de '. Request::get("ano"))

@section('conteudo')  
  <div class="row  mt-5">
    <div class="col-md-4">
      <h3>{{ $data['parlamentar']['nome'] }}</h3>
	</div>
	
    <div class="col-md-4">
      <h3>{{ $data['parlamentar']['partido'] }}</h3>
    </div>
		
    <form class="col-md-4" action="{{ route('estatistica.parlamentar', ['id' => $data['parlamentar']['id']]) }}" method="get">
      <label class="" for="pesquisa-partido ">Ano dos gastos</label>
      
      <div class="form-group">
        <div class="input-group">
          <select id="filtro-estatistica-parlamentar"  class="form-control"  name="ano" onchange="this.form.submit();">
          
            @for($i = 2009; $i < 2018 ; $i++)
              <option value="{{ $i }}" @if(Request::get('ano') == $i) selected @endif >{{ $i }}</option>
            @endfor
          </select>
        </div>
      </div>
    </form>
  </div>  

  @if ($data['totalGastoAno'] != 0)
  <div class="row mt-5">
    <div class="col-md-12">
      <h1 class="display-1 text-center">Total Gasto 
      	<br> R$ {!! str_replace('.', ',', $data['totalGastoAno']) !!}
      </h1>
      <hr>
    </div>

    <div class="col-md-12">
      <h1 class="display-4 text-center">Gastos mensais</h1>

      <canvas id="gasto-mensal"  width="500" height="250"></canvas>
    </div>

    <div class="col-md-12">
      <h1 class="display-4 text-center">Despesas</h1>

      <canvas id="pizza"></canvas>
    </div>		
	
  </div>

  <div class="row mt-5">
    <div class="col-md-12">
      <h1 class="display-4 text-center">Com quem mais gastou? (Top 5)</h1>

      <div class="table-reponsive">
        <table class="table table-dark">	
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome Fornecedor</th>
              <th scope="col">Número de vezes que gastou</th>
              <th scope="col">Valor total Gasto</th>
            </tr>
          </thead>

          <tbody>
          	@foreach ($data['fornecedores'] as $fornecedor)
              <tr>
                <td>{{ $fornecedor['id'] }}</td>
                <td>{{ $fornecedor['nome'] }}</td>
                <td class="align-middle">{{ $fornecedor['vezesGasta'] }}</td>
                <td>R$ {!! str_replace('.', ',', $fornecedor['totalGasto']) !!}</td>
              </tr>
        	@endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-md-12">
      <h1 class="display-4 text-center">Maiores gastos do ano (Top 5)</h1>

      <div class="table-responsive">
        <table class="table table-striped col-sm-12">
          <thead class=" bg-primary text-light">
            <tr>
              <th scope="col">Descrição da despesa</th>
              <th scope="col">Fornecedor</th>
              <th scope="col">Data</th>
              <th scope="col">Valor</th>
              <th scope="col">Tipo Documento</th>
            </tr>
          </thead>

          <tbody class="font-style text-truncate">
          	@foreach($data['top5Despesas'] as $despesa)
              <tr>
                <td>{{ $despesa['descricao'] }}</td>
                <td>{{ $despesa['fornecedor'] }}</td>
                <td>{!! $despesa['dataEmissao']->format('d/m/Y') !!}</td>
                <td>R$ {!! str_replace('.', ',', $despesa['valorLiquido']) !!}</td>
                <td>{{ $despesa['tipoDocumento']}}</td>
              </tr>
            @endforeach
           </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    var legendas = {!! json_encode($data['gastoPorDespesa']['descricao']) !!};
    var valores = {!! json_encode($data['gastoPorDespesa']['porcentagem']) !!}
    var cores = [];

    var coresDinamicas = function() {
      var r = Math.floor(Math.random() * 255);
      var g = Math.floor(Math.random() * 255);
      var b = Math.floor(Math.random() * 255);
      return "rgb(" + r + "," + g + "," + b + ")";
    };

    for (var i in legendas) {
      cores.push(coresDinamicas());
    }

    new Chart(document.getElementById("pizza"),{
      type: 'pie',
      data: {
        labels: legendas,
        datasets: [{
          data: valores,
          backgroundColor: cores
        }]
      },
      cutoutPercentage: 70
    });
  </script>

  <script>
    new Chart(document.getElementById("gasto-mensal"), {
      type: 'line',
      data: {
        labels: ['JAN','FEV','MAR','ABR','MAI','JUN',"JUL",'AGO','SET','OUT','NOV','DEZ'],
        datasets: [{
        data: [
          {{ $data['totalGastoMes'][1] }},
          {{ $data['totalGastoMes'][2] }},
          {{ $data['totalGastoMes'][3] }},
          {{ $data['totalGastoMes'][4] }},
          {{ $data['totalGastoMes'][5] }},
          {{ $data['totalGastoMes'][6] }},
          {{ $data['totalGastoMes'][7] }},
          {{ $data['totalGastoMes'][8] }},
          {{ $data['totalGastoMes'][9] }},
          {{ $data['totalGastoMes'][10] }},
          {{ $data['totalGastoMes'][11] }},
          {{ $data['totalGastoMes'][12] }}
        ],
        label: "Gastos dos parlamentares em R$",
        borderColor: "#00F",
        fill: false
          }
        ]
      }
    });
  </script>
  @else
  	<div>
  		<p> Este parlamentar não possui gatos neste ano</p>
  	</div>
  @endif
@endsection  