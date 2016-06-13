<?php
session_start();

if(isset($_SESSION['email'])) {?>
	<html>
	<head>
				<meta charset = "UTF-8">
				<!-- Font awesome -->
					<link rel="stylesheet" href=".././Recursos/css/font-awesome.min.css">
					<!-- Sandstone Bootstrap CSS -->
					<link rel="stylesheet" href=".././Recursos/css/bootstrap.min.css">
					<!-- Bootstrap Datatables -->
					<link rel="stylesheet" href=".././Recursos/css/dataTables.bootstrap.min.css">
					<!-- Bootstrap social button library -->
					<link rel="stylesheet" href=".././Recursos/css/bootstrap-social.css">
					<!-- Bootstrap select -->
					<link rel="stylesheet" href=".././Recursos/css/bootstrap-select.css">
					<!-- Bootstrap file input -->
					<link rel="stylesheet" href=".././Recursos/css/fileinput.min.css">
					<!-- Awesome Bootstrap checkbox -->
					<link rel="stylesheet" href=".././Recursos/css/awesome-bootstrap-checkbox.css">
					<!-- Admin Stye -->
					<link rel="stylesheet" href=".././Recursos/css/style.css">
					<link rel="stylesheet" href=".././Recursos/css/fon.css">
			</head>
			<body background=".././Recursos/img/fondo.jpg">
				<div class="brand clearfix">
		<a class="logo"><img src=".././Recursos/img/logo.jpg" class="img-responsive" alt=""></a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
		<li><a href="pagina_panel_administrador.php">Panel Administrador Principal</a></li>
		<li><a href='.././login/logout.php'>Cerrar Sesion</a></li>
		</ul>
		</div>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3"><br>
				<div class="well row pt-2x pb-3x bk-light">
					<div class="col-md-8 col-md-offset-2"><br><br><br>
		<section> <center>
			<ul>
					<label for="" class="text-uppercase text-sm">Panel Administrador Principal </label><br>
					<li><a class="form-control mb" href="gestionar_usuarios.php">Gestionar usuarios</a></li>
					<li><a class="form-control mb" href="gestionar_casas.php">Gestionar casas</a></li>
					<li><a class="form-control mb" href="gestionar_componentes.php">Gestionar componentes</a></li>
					<li><a class="form-control mb" href="gestionar_habitaciones.php">Gestionar habitaciones</a></li>
					<br><br>
					<a class="form-control mb" href="javascript:history.back()"> Volver Atras</a>
				</section>
			</div>
		<div class="container-fluid">

			<div class="row">
				<div class="col-md-12">
					  <div class="mt">
							<center><div class="mt">
					<p class="text-uppercase text-sm" class="form-control mb"> Estás conectado como <?php echo $_SESSION['email']; ?><br>
						<a href='.././login/logout.php'>Cerrar Sesion</a></p>
					</p>
				</div>

			</div>
		</div>

					<br><br>

	<!-- Loading Scripts -->
	<script src=".././Recursos/js/jquery.min.js"></script>
	<script src=".././Recursos/js/bootstrap-select.min.js"></script>
	<script src=".././Recursos/js/bootstrap.min.js"></script>
	<script src=".././Recursos/js/jquery.dataTables.min.js"></script>
	<script src=".././Recursos/js/dataTables.bootstrap.min.js"></script>
	<script src=".././Recursos/js/Chart.min.js"></script>
	<script src=".././Recursos/js/fileinput.js"></script>
	<script src=".././Recursos/js/chartData.js"></script>
	<script src=".././Recursos/js/main.js"></script>
		</body>
	</html>
	<?php }else{
		echo '<script> window.location=".././login/principal.php"; </script>';
	} ?>
