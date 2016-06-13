<!DOCTYPE html>
<?php
session_start();
include ".././lib/casas.php"
?>
<html>
<head>
    <meta charset="utf-8" http-equiv="Refresh" content="5;url=Inicio.php">
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
    </head>
    <body>
      <div class="brand clearfix">
  <a class="logo"><img src=".././Recursos/img/logo.jpg" class="img-responsive" alt=""></a>
  <span class="menu-btn"><i class="fa fa-bars"></i></span>
  <ul class="ts-profile-nav">
    <li><a href="Inicio.php">Panel de casas principal</a></li>
    <li><a href='.././login/logout.php'>Cerrar Sesion</a></li>
  </ul>
  </div>
  <div class="ts-main-content">
  <nav class="ts-sidebar">
  <ul class="ts-sidebar-menu">
  				<li><a href="gestionar_casas.php">Gestionar casas</a></li>
  				<li><a href="asignar_posesiones/general.php">Asignaciones de usuario/casa</a></li>
  			</ul>
  		</nav>
  		</div>
      <div class="container">
  			<div class="row">
  				<div class="col-md-6 col-md-offset-3"><br>
  						<div class="well row pt-2x pb-3x bk-light">
  							<div class="col-md-8 col-md-offset-2"><br><br><br>
  								<section> <center>
  									<ul>
  				<label for="" class="text-uppercase text-sm"></label><br>
  			</ul>
  		</section>
  	</div>
        <?php
            include '.././login/conadmin.php';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            $nombrecasa = $_POST['nombrecasa'];
            $_SESSION['nombrecasa']=$nombrecasa;
            echo '<br>';
            echo '<br>';
            echo '<br>';
            $borrarcasa=new casas;
            $borrarcasa->borrarcasa($nombrecasa);
            ?>
        <div class='resolucion'>
        </div>
    </body>
</html>
