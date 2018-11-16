@extends('layout.app')

@section('titulo', 'Menu Principal')
@section('subTitulo', 'index')

@section('conteudo')
		<!-- BEGIN PAGE CONTENT-->
		<div class="row-fluid">
			<div class="span12">
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
				<h1>Bem-Vindo ao C.G.P!</h1>
				<div class="portlet box red">
							<div class="portlet-title">
								<h4><i class="icon-reorder"></i>Menu</h4>
			
							</div>
							<div class="portlet-body">
								<div class="row-fluid">
									<a href="#" class="icon-btn span4">
										<i class="icon-group"></i>
										<div>Partido</div>
									</a>
									<a href="#" class="icon-btn span4">
										<i class="icon-user"></i>
										<div>Parlamentar</div>
									</a>
									<a href="#" class="icon-btn span4">
										<i class="icon-globe"></i>
										<div>Estados</div>
									</a>
								</div>

								<div class="row-fluid">

									<a href="#" class="icon-btn span4">
										<i class="icon-plane"></i>
										<div>Viagens</div>
									</a>

									<a href="#" class="icon-btn span4">
										<i class="icon-calendar"></i>
										<div>Anual</div>
									</a>

									<a href="#" class="icon-btn span4">
										<i class="icon-signal"></i>
										<div>Recordes</div>
									</a>
								
								</div>
							</div>
						</div>
				<!-- END EXAMPLE TABLE PORTLET-->
			</div>
		</div>
		<!-- END PAGE CONTENT-->
	</div>
	<!-- END PAGE CONTAINER-->	
@endsection