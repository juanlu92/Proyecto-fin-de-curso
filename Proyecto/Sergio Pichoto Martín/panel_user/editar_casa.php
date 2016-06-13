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
  			<li><a href="Inicio.php">Panel de casas principal</a></li>
  			<li><a href='.././login/logout.php'>Cerrar Sesion</a></li>
  		</ul>
      </div>
            <div class="ts-main-content">
            <nav class="ts-sidebar">
              <ul class="ts-sidebar-menu">
                <li><a href="registro_casa.php">Dar de alta una casa</a></li>
                <li><a href="borrarcasas.php">Borrar mi casa</a></li>
                <li><a href="editar_casa.php">Editar mi casa</a></li>
                <li><a href="asignar_posesiones/buscador.php">Asignarme una casa</a></li>
                <li><a href="asignar_posesiones/anadirusuarioacasapropietario.php">Añadir usuario a mi casa</a></li>
                <li><a href="registro_habitaciones.php">Registrar una nueva habitacion</a></li>
                <li><a href="registro_componentes.php">Registrar un nuevo componente</a></li>
                <li><a href="buscador_busqueda_habitacion.php">Añadir un componente a una habitación</a></li>
              </ul>
            </nav>
            </div>

            <div class="form-content">
              <div class="container">
                <div class="row">
                  <div class="col-md-6 col-md-offset-3"><br><br>
                      <div class="well row pt-2x pb-3x bk-light">
                        <div class="col-md-8 col-md-offset-2">

<?php
@session_start();
include '.././login/conadmin.php';
$patata = $_SESSION['idUsuario'];
$patata2 = $_SESSION['idCasa'];

$sql1 = "SELECT a.idCasa, a.nombre, b.idUsuario, b.idCasa
FROM Casas a, Poseen b
where $patata=b.idUsuario
and a.idCasa=b.idCasa";
//--------------------COGE DATOS E INSERTA---------------------//

$query=mysql_query($sql1) or die('Error en la consulta: ' . mysql_error());
//$movida2 = $_SESSION['nuevoidcasa'];
$numerodefilas=mysql_num_rows($query);
echo "<form method='post'  action='form_casa.php'>";
echo "<pre class='texto'>Selecciona la casa para editar: </pre>";
echo "<select name='viejonombrecasa'>";

while ($row = mysql_fetch_array($query)){
  echo "<option name='todainformacion' class='fila' value='" .$row['nombre']."'>".$row['idCasa'] .' ||| Nombre ->'.$row['nombre']."</option>";
}
//$movida2 = mysql_query("SELECT idCasa FROM poseen WHERE idCasa = '$row['idCasa']' ");
//echo "$row['idCasa']";
echo "<input type='submit' value='EDITAR' name='submit'>";
echo "<br><br>";
echo "<center><a href='javascript:history.back()''> Volver Atras</a>";
echo "</select>";
echo "</form>";

?>
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
