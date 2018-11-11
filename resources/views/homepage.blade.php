<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>{{$gian['title']}}</title>
		<link rel="stylesheet" href="{{asset('css/stylesheet.css')}}">
		<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

	</head>
	<body>
		<canvas id="line-chart" width="500" height="250"></canvas>

		<script>
			new Chart(document.getElementById("line-chart"), {
			  type: 'line',
			  data: {
			    labels: [2009,2010,2011,2012],
			    datasets: [{ 
			        data: [10000,24512,454545,0],
			        label: "PT",
			        borderColor: "#F00",
			        fill: false
			      }, { 
			        data: [ {{ $gian['totais']['2009'] }} ,{{ $gian['totais']['2010'] }},
			        {{ $gian['totais']['2011'] }},{{ $gian['totais']['2012'] }} ],
			        label: "PSDB",
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
			
		{{ $totais['2010'] }}
		{{ $gian['totais']['2009'] }}

	</body>
</html>