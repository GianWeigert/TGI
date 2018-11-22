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
		
    <div class="col-md-4">
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
    </div>
  </div>  
	
  <div class="row mt-5">
    <div class="col-md-12">
      <h1 class="display-1 text-center">Total Gasto 
      	<br> R$ {!! str_replace('.', ',', $data['totalGastoAno']) !!}
      </h1>
      <hr>
    </div>

    <div class="col-md-6">
      <h1 class="display-4 text-center">Gastos mensais</h1>

      <canvas id="gasto-mensal"  width="500" height="250"></canvas>
    </div>

    <div class="col-md-6">
      <h1 class="display-4 text-center">Despesas</h1>

      <canvas id="pizza"></canvas>
    </div>		
	
  </div>

  <div class="row mt-5">
    <div class="col-md-6">
      <h1 class="display-4 text-center">Top 5 Fornecedores</h1>

      <div class="table-reponsive">
        <table class="table table-dark">	
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome Fornecedor</th>
              <th scope="col">N° Visitas</th>
              <th scope="col">Valor Gasto</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>McDonalds</td>
              <td>32</td>
              <td>R$ 200,00</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-md-6">
      <h1 class="display-4 text-center">Top 5 maiores gastos</h1>

      <div class="table-responsive">
        <table class="table table-striped col-sm-12">
          <thead class=" bg-primary text-light">
            <tr>
              <th scope="col">Tipo</th>
              <th scope="col">Fornecedor</th>
              <th scope="col">Data</th>
              <th scope="col">Valor</th>
              <th scope="col">Tipo Documento</th>
            </tr>
          </thead>

          <tbody class="font-style text-truncate">
		    <tr>
              <td>1</td>
              <td>GOL</td>
              <td>02/03/2009</td>
              <td>R$ 13.200,00</td>
              <td>Nota Fiscal</td>
            </tr>
           </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    new Chart(document.getElementById("pizza"),{
      type: 'pie',
      data: {
        datasets: [{
          data: {{ $data['gastoPorDespesa']['porcentagem'] }},
          backgroundColor:["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(255, 205, 86)"]
        }],
        labels:  {{ $data['gastoPorDespesa']['descricao'] }}
      },
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
@endsection  