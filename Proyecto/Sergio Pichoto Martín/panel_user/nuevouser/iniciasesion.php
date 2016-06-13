<!DOCTYPE html>
<?php
include '../.././login/conadmin.php';
if(isset($_SESSION['email'])){
  echo '<script> window.location="../Inicio.php"; </script>';
}
?>
<html>
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
    </head>
    <body>
      <div class="login-page bk-img" style="background-image: url(../.././Recursos/img/login-bg.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">Inicia sesión para continuar con el registro</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
        <form action="validar.php" method='post'>
        <div class="mt">
          <label for="" class="text-uppercase text-sm">Correo electrónico</label>
          <input type="text" placeholder="email" id='email' name='email' class="form-control mb" required />

          <label for="" class="text-uppercase text-sm">Password</label>
					<input type="password" placeholder="Password" class="form-control mb" id='password' name='password' placeholder='contrase&ntilde;a' required />
            <button class="btn btn-primary btn-block" type="submit" name='Enviar' value='Enviar'>LOGIN</button><br>
        </form>
        </div>
      </div>
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
