<?php
?>
<head>
		<meta charset="utf-8" http-equiv="Refresh" content="5;url=../Inicio.php">
		<!-- Font awesome -->
			<link rel="stylesheet" href="../.././Recursos/css/font-awesome.min.css">
			<!-- Sandstone Bootstrap CSS -->
			<link rel="stylesheet" href="../.././Recursos/css/bootstrap.min.css">
			<!-- Bootstrap Datatables -->
			<link rel="stylesheet" href="../.././Recursos/css/dataTables.bootstrap.min.css">
			<!-- Bootstrap social button library -->
			<link rel="stylesheet" href="../.././Recursos/css/bootstrap-social.css">
			<!-- Bootstrap select -->
			<link rel="stylesheet" href="../.././Recursos/css/bootstrap-select.css">
			<!-- Bootstrap file input -->
			<link rel="stylesheet" href="../.././Recursos/css/fileinput.min.css">
			<!-- Awesome Bootstrap checkbox -->
			<link rel="stylesheet" href="../.././Recursos/css/awesome-bootstrap-checkbox.css">
			<!-- Admin Stye -->
			<link rel="stylesheet" href="../.././Recursos/css/style.css">
			<link rel="stylesheet" href="../.././Recursos/css/fon.css">
	</head>
  <body background="../.././Recursos/img/fondo.jpg">
    <div class="brand clearfix">
<a class="logo"><img src="../.././Recursos/img/logo.jpg" class="img-responsive" alt=""></a>
<span class="menu-btn"><i class="fa fa-bars"></i></span>
<ul class="ts-profile-nav">
<li><a href="../Inicio.php">Panel de casas Principal</a></li>
<li><a href='../.././login/logout.php'>Cerrar Sesion</a></li>
</ul>
</div>
<div class="ts-main-content">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3"><br>
            <div class="well row pt-2x pb-3x bk-light">
              <div class="col-md-8 col-md-offset-2"><br><br><br>
                <section> <center>
                  <ul>

      </ul>
    </section>
  </div>

<?php
session_start();
include '../.././login/conadmin.php';
$idUsuario=$_POST['iddeusuario'];
$idCasa=$_SESSION['iddecasafinal'];
$fechacompra=$_SESSION['fechacomprafinal'];


$comprobarunion=mysql_query("SELECT idUsuario, idCasa FROM Poseen WHERE idUsuario='$idUsuario' AND idCasa='$idCasa'") or die (mysql_error());;
if (mysql_num_rows($comprobarunion)>0){
	echo "<br>";
	echo "<br>";
	echo "<br><br><center>Esta union ya está registrada, no puede realizarse";
}
if($fechacompra == 0000-00-00) {
	$insertado=mysql_query("INSERT INTO Poseen VALUES('$idUsuario','$idCasa', null)") or die (mysql_error());;
	echo "<br><br><center> Se ha realizado la union de Usuario a su casa como invitado";
}else{
	$insertado=mysql_query("INSERT INTO Poseen VALUES('$idUsuario','$idCasa', '$fechacompra')") or die (mysql_error());;
	echo "<center> Se ha realizado la union de Usuario a su casa como un dueño mas";
}
?>
