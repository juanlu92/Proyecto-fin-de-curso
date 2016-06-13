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
            <form id="f1" name="f1" method="post" onsubmit="return validar();" action="enviardatosborrarcomponentes.php" width="150" height="500">
              <?php
              session_start();
              include '.././login/conadmin.php';
              $busqueda = $_POST['busqueda'];
              $sql1 = "SELECT * FROM Componentes WHERE tipo LIKE '%$busqueda%'";
                            //--------------------COGE DATOS E INSERTA---------------------//

              $query=mysql_query($sql1) or die('Error en la consulta: ' . mysql_error());

              $numerodefilas=mysql_num_rows($query);
              echo "<pre class='form-control mb'>componente a borrar: </pre>";
              echo "<select name='nombreComponente'>";

              while ($row = mysql_fetch_array($query)){
              echo "<option name='todainformacion' class='form-control mb' value='" .$row['tipo']."'>".$row['idComponente'] .' ||| Nombre ->'.$row['tipo']."</option>";
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
