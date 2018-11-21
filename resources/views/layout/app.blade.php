<!DOCTYPE html>
<html lang="pt-br">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="../js/Chart.js"></script>

    <title>CGP - @yield('titulo')</title>
    
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      .card:hover{
        background-color:rgba(0,0,0,.03);
      }
      .font-style{
        font-family: "Arial", Sans-serif;
        font-style: normal;
        font-size: 0.775em;

      }
    </style>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="/"><strong>Consulta de Gastos Públicos</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard') }}" data-toggle="tooltip" title="Dashboard">Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('listar.partidos') }}" data-toggle="tooltip" title="Lista de partidos">Partido</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('listar.parlamentares') }}" data-toggle="tooltip" title="Lista de parlamentares">Parlamentar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('listar.estados') }}" data-toggle="tooltip" title="Lista de estados">Estado</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('listar.fornecedores') }}" data-toggle="tooltip" title="Lista de estados">Fornecedores</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">        
          <div class="mt-5 col-md-12 col-sm-12 text-center">
            <h1 class="display-4"> @yield('msgTop')</h1>
            <h1 class="display-4"> @yield('msgTop2')</h1>
          </div>
      </div>             
      @yield('conteudo')        
    </div>
    <br><br><br><br>
    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  <footer class="text-muted mt-5">
      <div class="container">
        <hr class="my-4">
        <p class="float-right">
          <a href="#">Voltar ao topo</a>
        </p>
        <p>&reg; copyright 2018 Consulta de Gastos Públicos</p>
      </div>
    </footer>
  </body>


</html>

