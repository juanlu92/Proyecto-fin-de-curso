<!DOCTYPE html>
<?php
?>
<html leng = "es">
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
            <div class="ts-main-content">
            <nav class="ts-sidebar">
            <ul class="ts-sidebar-menu">
              <li><a href="gestionar_usuarios.php">Gestionar usuarios</a></li>
              <li><a href="gestionar_casas.php">Gestionar casas</a></li>
              <li><a href="gestionar_componentes.php">Gestionar componentes</a></li>
              <li><a href="gestionar_habitaciones.php">Gestionar habitaciones</a></li>
            </ul>
            </nav>
            </div>

            <div class="form-content">
              <div class="container">
                <div class="row">
          		    <div class="col-md-6 col-md-offset-3"><br><br>
                      <div class="well row pt-2x pb-3x bk-light">
          							<div class="col-md-8 col-md-offset-2">

            <form id="f1" name="f1" method="post" onsubmit="return validar();" action="enviardatoseditarusuarios.php" width="150" height="500">
              <div class "mt">

                <label for="" class="text-uppercase text-sm">Corréo Electrónico del Usuario a editar:</label>
                <input type="text" placeholder="Escriba el ID del usuario" id='correoidusuario' name="correoidusuario" class="form-control mb" pattern="{1,15}" required=""/>

                <label for="" class="text-uppercase text-sm">¿Es administrador?:</label>
                <select class="form-control mb" id='editaradmin' name="editaradmin" required />
                  <option value="1">Si</option>
                  <option value="0">No</option>
                </select>

                <label for="" class="text-uppercase text-sm">Nuevo Nombre de Usuario:</label>
                <input type="text" placeholder="Escriba el nuevo ID nombre de usuario" id='nombre' name="nombre" class="form-control mb" pattern="[a-zA-Zñ ]+[a-zA-Zñ]{1,15}" required=""/>


                <label for="" class="text-uppercase text-sm">Nuevo Primer Apellido de Usuario:</label>
                <input type="text" placeholder="Escriba el nuevo Primer Apellido de usuario" id='apellidouno' name="apellidouno" class="form-control mb" pattern="[a-zA-Zñ ]+[a-zA-Zñ]{1,20}" required=""/>

                <label for="" class="text-uppercase text-sm">Nuevo Segundo Apellido de Usuario:</label>
                <input type="text" placeholder="Escriba el nuevo Segundo Apellido de usuario" id='apellidodos' name="apellidodos" class="form-control mb" pattern="[a-zA-Zñ ]+[a-zA-Zñ]{1,20}" required=""/>

                <label for="" class="text-uppercase text-sm">Nuevo Email de Usuario:</label>
                <input type="text" placeholder="Escriba el nuevo Email de usuario" id='editaremail' name="editaremail" class="form-control mb" pattern="^[A-Za-z][A-Za-z0-9_]*@[A-Za-z0-9_]+\.[A-Za-z0-9_.]+[A-za-z]{1,40}$" required />

                <button class="btn btn-primary btn-block" type="submit" name='Enviar' class="boton" value='Enviar'>Confirmar Edicion</button><br>
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
