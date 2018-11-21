@extends('layout.app')

@section('titulo', 'Estatistica Parlamentar')
@section('msgTop', 'Estatistica  Parlamentar')
@section('msgTop2', Request::get("ano") == "" ? "" : 'Ano de '. Request::get("ano"))

@section('conteudo')  
	<div class="row  mt-5">
		<div class="col-md-4">
			<h3>*Nome parlamentar*</h3>
		</div>
		<div class="col-md-4">
			<h3>*Nome Partido*</h3>
		</div>
		<div class="col-md-4">
            <label class="" for="pesquisa-partido ">Ano dos gastos</label>
            <div class="form-group">    
                <div class="input-group">    
                    <select id="filtro-estatistica-parlamentar"  class="form-control"  name="estatistica-parlamentar" onchange="this.form.submit();">
                    @for($i = 2009; $i < 2018 ; $i++)
                        <option value="{{ $i }}" >{{ $i }}</option>
                    @endfor
                </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary">
                            <i class="icon-search" aria-hidden="true"></i> Pesquisar
                        </button>                    
                    </div>
                </div>
            </div>
		</div>
	</div>  
	<div class="row mt-5">

		<div class="col-md-12">
			<h1 class="display-1 text-center">Total Gasto <br> R$ 1212121</h1>
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
				        data: [10, 20, 100],
						backgroundColor:["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(255, 205, 86)"]
				    }],

			    // These labels appear in the legend and in the tooltips when hovering different arcs
			    labels: [
			        'Red',
			        'Yellow',
			        'Blue'
			    ]	
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