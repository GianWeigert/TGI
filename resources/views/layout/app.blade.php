<?php
// include 'util/config.php'
 ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="pt-br"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>CGP - @yield('titulo')</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="bootstrap/css/metro.css" rel="stylesheet" />
	<link href="bootstrap/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="bootstrap/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="bootstrap/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="bootstrap/css/style.css" rel="stylesheet" />
	<link href="bootstrap/css/style_responsive.css" rel="stylesheet" />
	<link href="bootstrap/css/style_default.css" rel="stylesheet" id="style_color" />
	<link rel="stylesheet" type="text/css" href="bootstrap/chosen-bootstrap/chosen/chosen.css" />
	<link rel="stylesheet" type="text/css" href="bootstrap/uniform/css/uniform.default.css" />
	<link rel="shortcut icon" href="favicon.ico" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
	<!-- END HEAD -->
	<!-- BEGIN BODY -->
	<body class="fixed-top">
		<!-- BEGIN HEADER -->
		<div class="header navbar navbar-inverse navbar-fixed-top">
			<!-- BEGIN TOP NAVIGATION BAR -->
			<div class="navbar-inner">
				<div class="container-fluid">
					<!-- BEGIN LOGO -->
					<a class="brand" href="/"><strong>Consulta de Gastos Públicos</strong></a>
					<!-- END LOGO -->
					<!-- BEGIN RESPONSIVE MENU TOGGLER -->
					<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
						<img src="assets/img/menu-toggler.png" alt="" />
					</a>          
					<!-- END RESPONSIVE MENU TOGGLER -->				
					<!-- BEGIN TOP NAVIGATION MENU -->				
				</div>
			</div>
			<!-- END TOP NAVIGATION BAR -->
		</div>
		<!-- END HEADER -->
		<!-- BEGIN CONTAINER -->
		
		<div class="page-container row-fluid">
			<!-- BEGIN SIDEBAR -->
			<div class="page-sidebar nav-collapse collapse">
				<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
				<div class="slide hide">
					<i class="icon-angle-left"></i>
				</div>
				<form class="sidebar-search" />
				<div class="input-box">
					<input type="text" class="" placeholder="Search" />
					<input type="button" class="submit" value=" " />
				</div>
				</form>

				<div class="clearfix"></div>
				<!-- END RESPONSIVE QUICK SEARCH FORM -->
				<!-- BEGIN SIDEBAR MENU -->
				<ul>
					<li>
						<a href="/">
							<i class="icon-home"></i> Menu
						</a>					
					</li>
					<li class="has-sub">
						<a href="/partidos" class="">
							<i class="icon-group"></i> Partido
							<span class="arrow"></span>
						</a>
					</li>
					
					<li class="has-sub">
						<a href="/parlamentares" class="">
							<i class="icon-user"></i> Parlamentar
							<span class="arrow"></span>
						</a>
					</li>

					<li class="has-sub">
						<a href="/estados" class="">
							<i class="icon-user"></i> Estados
							<span class="arrow"></span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="icon-home"></i> Total Geral R$ 
						</a>					
					</li>
				</ul>
				<!-- END SIDEBAR MENU -->
			</div>
		<!-- END SIDEBAR -->

<!-- BEGIN PAGE -->
<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<!-- BEGIN PAGE CONTAINER-->
	<div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->
		<div class="row-fluid">
			<div class="span12">
				
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
				<h3 class="page-title">
					@yield('titulo')
					<small>@yield('subTitulo')</small>
				</h3>
				<ul class="breadcrumb">
					<li>
						<i class="icon-home"></i>
						<a href="/">Home</a> 
						<i class="icon-angle-right"></i>
					</li>
				</ul>
				<!-- END PAGE TITLE & BREADCRUMB-->
			</div>
		</div>
		<!-- END PAGE HEADER-->

	@yield('conteudo')


</div>
<!-- END PAGE -->

</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		2013 &copy; Metronic by keenthemes.
		<div class="span pull-right">
			<span class="go-top"><i class="icon-angle-up"></i></span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS -->
	<!-- Load javascripts at bottom, this will reduce page load time -->
	<script src="assets/js/jquery-1.8.3.min.js"></script>			
	<script src="assets/breakpoints/breakpoints.js"></script>			
	<script src="assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>	
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.blockui.js"></script>
	<script src="assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>	
	<script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
	<!-- ie8 fixes -->
	<!--[if lt IE 9]>
	<script src="assets/js/excanvas.js"></script>
	<script src="assets/js/respond.js"></script>
	<![endif]-->
	<script src="assets/js/app.js"></script>		
	<script>
		jQuery(document).ready(function() {			
			// initiate layout and plugins
			App.setPage('calendar');
			App.init();
		});
	</script>
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-37564768-1']);
	  _gaq.push(['_setDomainName', 'keenthemes.com']);
	  _gaq.push(['_setAllowLinker', true]);
	  _gaq.push(['_trackPageview']);
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>