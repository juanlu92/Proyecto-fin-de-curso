<?php
?>
<head>
	<meta charset="utf-8">
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
			<li><a href='.././../login/logout.php'>Cerrar Sesion</a></li>
		</ul>
	</div>
  <div class="ts-main-content">
</div>
<div class="form-content">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3"><br>
					<div class="well row pt-2x pb-3x bk-light">
						<div class="col-md-8 col-md-offset-2"><br><br>

<?php
session_start();
$busqueda=$_POST['busqueda'];
include '../.././login/conadmin.php';

$sql1 = "SELECT * FROM Casas WHERE nombre LIKE '%$busqueda%'";
//--------------------COGE DATOS E INSERTA---------------------//

$query=mysql_query($sql1) or die('Error en la consulta: ' . mysql_error());

$numerodefilas=mysql_num_rows($query);
echo "<form method='post' action='relacionar.php'>";
echo "<input type='text' placeholder='Escriba la fecha de compra si el usuario es el dueño' id='email' name='fechacompra' class='form-control mb' /></input>";
echo "<pre class='form-control mb'>Casa a asociar: </pre>";
echo "<select name='iddecasa'>";

while ($row = mysql_fetch_array($query)){
  echo "<option name='todainformacion' class='form-control mb' value='" .$row['idCasa']."'>".$row['idCasa'] .' ||| Nombre ->'.$row['nombre']."</option>";
}
echo "<input type='submit' class='btn btn-primary btn-block' value='ASIGNAR' name='submit'>";
echo "<br><br>";
echo "<a class='btn btn-primary btn-block' href='javascript:history.back()''> Volver Atras</a>";
echo "</select>";
echo "</form>";

?>
</div>
</div>
</div>
</div>
</div>
</div>
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
