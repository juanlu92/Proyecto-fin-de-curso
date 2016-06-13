<?php
/*Verificación de la sesión*/
session_start();
if (!$_SESSION['Usuario']) {
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<!-- INICIO: Meta -->
	<meta charset="utf-8">
	<title>Focus Vita</title>
	<meta name="description" content="Proyecto">
	<meta name="author" content="Domingo Javier">
	<meta name="keyword" content="Proyecto,Instituto,Leopoldo,Queipo">
	<!-- FIN: Meta -->

	<!-- INICIO: Móviles -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- FIN: Móviles -->
	<!-- INICIO: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.css" rel="stylesheet">
	<!-- ESTILOS PERSONALIZADOS-->
	<link href="css/custom.css" rel="stylesheet" />
 	<link id="tema" href="<?php echo $_SESSION['tema'];?>" rel="stylesheet" />
	<!-- FONTAWESOME STYLES-->
 	<link href="css/plugins/font-awesome.css" rel="stylesheet" />
	<!-- FIN: CSS -->
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->

	<!-- INICIO: Favicon -->
	<link rel="shortcut icon" href="favicon/favicon.gif">
	<!-- FIN: Favicon -->
</head>
<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="hidden-xs" style="color: white;
				padding: 15px 50px 5px 50px;
				float: right;
				font-size: 16px;"><a href="cerrarsesion.php" class="btn btn-danger square-btn-adjust hidden-xs">Salir</a>
			</div>
			<!-- /. INICIO : BARRA DE NAVEGACIÓN  -->
			</nav>
			<nav class="navbar-default navbar-side" role="navigation">
				<div class="sidebar-collapse">
					<ul class="nav" id="menu">
						<li class="text-center">
							<img src="img/logo.svg" class="logo"></img>
						</li>
						<li>
							<a href="filtro.php"><i class="fa fa-3x"></i><img class="iconoBARRA" src="iconos/folder-7.svg"/> Casas<span class="fa arrow"></span></a>
						</li>
						<li>
							<a href="perfil.php"><i class="fa fa-3x"></i><img class="iconoBARRA" src="iconos/folder-7.svg"/> Perfil<span class="fa arrow"></span></a>
						</li>
						<li>
							<a href="buscador.php"><i class="fa fa-3x"></i><img class="iconoBARRA" src="iconos/folder-7.svg"/> Usuarios<span class="fa arrow"></span></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-3x"></i><img class="iconoBARRA" src="iconos/folder-7.svg"/> Temas<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<a onclick="cambiarTema('tema')">Agua</a>
							</li>
							<li>
								<a onclick="cambiarTema('tema2')">Hierba</a>
							</li>
							<li>
								<a onclick="cambiarTema('tema3')">Fuego</a>
							</li>
							<li>
								<a onclick="cambiarTema('tema4')">Sueño</a>
							</li>
						</ul>
						<li class="visible-xs">
							<a href="cerrarsesion.php"> Salir</span></a>
						</li>
						</li>
					</ul>
				</div>
			</nav>
			<!-- /. FIN: BARRAR DE NAVEGACIÓN  -->
			<div id="page-wrapper" >
				<div id="page-inner">
