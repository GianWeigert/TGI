@extends('layout.app')

@section('titulo', 'Menu Principal')
@section('subTitulo', 'index')

@section('conteudo')
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<h1>Bem-Vindo ao C.G.P!</h1>
			<br><br><br><br>

			<div class="d-flex flex-wrap">

				<div class="span12">
					<canvas id="line-chart"  width="500" height="250"></canvas>
				</div>

				<div  class="span6">
					<div>Total de despesas em 2009: {{ $data['totais']['2009'] }}</div>
					<div>Total de despesas em 2010: {{ $data['totais']['2010'] }}</div>
					<div>Total de despesas em 2011: {{ $data['totais']['2011'] }}</div>
					<div>Total de despesas em 2012: {{ $data['totais']['2012'] }}</div>
					<div>Total de despesas em 2013: {{ $data['totais']['2013'] }}</div>
					<div>Total de despesas em 2014: {{ $data['totais']['2014'] }}</div>
					<div>Total de despesas em 2015: {{ $data['totais']['2015'] }}</div>
					<div>Total de despesas em 2016: {{ $data['totais']['2016'] }}</div>
					<div>Total de despesas em 2017: {{ $data['totais']['2017'] }}</div>
					<div>Total de despesas em 9 anos: {{ $data['totais']['todosAnos'] }}</div>
				</div>
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
				label: "Gastos dos parlamentares nos últimos 9 anos",
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

		new Chart(document.getElementById("line-chart2"), {
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
				label: "Gastos dos parlamentares nos últimos 9 anos",
				borderColor: "#00F",
				fill: false
		      }
		    ]
		  },
		  options: {
		    title: {
		      display: true,
		      text: 'Partidos e gastos'
		    }
		  }
		});	
	</script>
@endsection