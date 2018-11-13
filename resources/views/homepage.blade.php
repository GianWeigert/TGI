<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title> Homepage </title>
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
			    labels: [2009,2010,2011,2012,2013,2014,2025,2016,2017],
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
	</body>
</html>