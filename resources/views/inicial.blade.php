@extends('layout.app')

@section('titulo', 'Menu Principal')
@section('subTitulo', 'index')

@section('conteudo')
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<h1 class="display-3 text-center">Bem-Vindo ao C.G.P!</h1>
			<br><br><br><br>

			<div class="row">

				<div class="col-sm-1 col-md-12 my-2">
					<canvas id="line-chart"  width="500" height="250"></canvas>
				</div>

				<table class="table col-sm-10">
					<thead>
						<tr>
							<th scope="col">Ano</th>
							<th scope="col">Total Gastos</th>
							<th scope="col">Quantidade de gastos</th>
							<th scope="col">Partido c/ maior gasto</th>
							<th scope="col">Despesa mais recorrente</th>


						</tr>
						
					</thead>
					<tbody>
						<tr>
							<th scope="row">2009</th>
						    <td>R$ {{ $data['totais']['2009'] }}</td>
     						<td></td>
						</tr>
						<tr>
							<th scope="row">2010</th>
						    <td>R$ {{ $data['totais']['2010'] }}</td>
     						<td></td>
						</tr>
						
						<tr>
							<th scope="row">2011</th>
						    <td>R$ {{ $data['totais']['2011'] }}</td>
     						<td></td>
						</tr>	
									
						<tr>
							<th scope="row">2012</th>
						    <td>R$ {{ $data['totais']['2012'] }}</td>
     						<td></td>
						</tr>	
											
						<tr>
							<th scope="row">2013</th>
						    <td>R$ {{ $data['totais']['2013'] }}</td>
     						<td></td>
						</tr>	
											
						<tr>
							<th scope="row">2014</th>
						    <td>R$ {{ $data['totais']['2014'] }}</td>
     						<td></td>
						</tr>	
											
						<tr>
							<th scope="row">2015</th>
						    <td>R$ {{ $data['totais']['2015'] }}</td>
     						<td></td>
						</tr>
														
						<tr>
							<th scope="row">2016</th>
						    <td>R$ {{ $data['totais']['2016'] }}</td>
     						<td></td>
						</tr>
																	
						<tr>
							<th scope="row">2017</th>
						    <td>R$ {{ $data['totais']['2017'] }}</td>
     						<td></td>
						</tr>

					</tbody>
				</table>

			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
	<!-- END PAGE CONTENT-->
		
</div>
<!-- END PAGE CONTAINER-->	
	<script>
		new Chart(document.getElementById("line-chart"), {
		  type: 'line',
		  data: {
		    labels: [2009,2010,2011,2012,2013,2014,2015,2016,2017],
		    datasets: [{
				data: [
					{{ $data['totais']['2009'] }},
					{{ $data['totais']['2010'] }},
					{{ $data['totais']['2011'] }},
					{{ $data['totais']['2012'] }},
					{{ $data['totais']['2013'] }},
					{{ $data['totais']['2014'] }},
					{{ $data['totais']['2015'] }},
					{{ $data['totais']['2016'] }},
					{{ $data['totais']['2017'] }}
				],
				label: "Gastos dos parlamentares em R$",
				borderColor: "#00F",
				fill: false
		      }
		    ]
		  },
		  options: {
		    title: {
		      display: true,
		      text: 'Gastos dos parlamentares nos últimos 9 anos'
		    }
		  }
		});	
	</script>
@endsection