<!DOCTYPE html>
<?php
?>
<html leng = "es">
    <head>
        <meta charset = "UTF-8">
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
        <body background="../.././Recursos/img/fondo.jpg">
          <div class="brand clearfix">
		<a class="logo"><img src="../.././Recursos/img/logo.jpg" class="img-responsive" alt=""></a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
	</div>
  <div class="ts-main-content">
</div>
  <div class="form-content">
    <div class="container">
      <div class="row">
		    <div class="col-md-6 col-md-offset-3"><br>
            <div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
          <form id="f1" name="f1" method="post" onsubmit="return validar();" action="registratenevio.php" width="150" height="500">
            <div class="mt">


                <label for="" class="text-uppercase text-sm">Nombre de Usuario</label>
                <input type="text" placeholder="Escriba el nombre de usuario" id='nombre' name="nombre" class="form-control mb" pattern="[a-zA-Zñ ]+[a-zA-Zñ]{1,15}" required />

                <label for="" class="text-uppercase text-sm">Primer Apellido</label>
                <input type="text" placeholder="Escriba el Primer Apellido" id='apellidouno' name="apellidouno" class="form-control mb" pattern="[a-zA-Zñ ]+[a-zA-Zñ]{1,20}" required />

                <label for="" class="text-uppercase text-sm">Segundo Apellido</label>
                <input type="text" placeholder="Escriba el Segundo Apellido" id='apellidodos' name="apellidodos" class="form-control mb" pattern="[a-zA-Zñ ]+[a-zA-Zñ]{1,20}" required />

                <label for="" class="text-uppercase text-sm">Email</label>
                <input type="text" placeholder="Escriba el E-mail" id='email' name="email" class="form-control mb" pattern="^[A-Za-z][A-Za-z0-9_]*@[A-Za-z0-9_]+\.[A-Za-z0-9_.]+[A-za-z]{1,40}$" required />

                <label for="pass" class="text-uppercase text-sm"><span>Contraseña</span>
                <input type="password" placeholder="Password" class="form-control mb" id='pass' name='pass' placeholder='contrase&ntilde;a' onkeyup="passwordStrength(this.value)" required />



                <label for="pass2" class="text-uppercase text-sm"><span>Confirmar Contraseña</span></label>
                <input type="password" placeholder="Confirma Password" class="form-control mb" name="pass2" id="pass2" placeholder='contrase&ntilde;a' onkeyup="passwordStrength(this.value)" required />

                <button class="btn btn-primary btn-block" type="submit" name='Enviar' class="boton" value='Enviar'>Registrarse</button>
                <br><br>
                <center><a href="javascript:history.back()"> Volver Atras</a>
                <span id="passstrength"></span>
            </form>
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
