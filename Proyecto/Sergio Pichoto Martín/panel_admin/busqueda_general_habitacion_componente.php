<!DOCTYPE html>
<?php
?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href=".././Recursos/css/buscador.css">
    <link rel="stylesheet" href=".././Recursos/css/main_css.css">
    <title>Busqueda General: </title>
  </head>
  <body>
    <nav>
        <ul>
            <li><a href="pagina_panel_administrador.php">Volver al panel</a></li>
        </ul>
    </nav>
    <span>Busqueda general: </span>
  <form class="form" action="busqueda_habitacion.php" method="post">
    <input type="text" name="busqueda"></input>
    <input type="submit" value="Buscar"></input>
    <br><br>
    <a href="javascript:history.back()"> Volver Atras</a>
    <br><br>
    <a href='.././login/logout.php'>Cerrar Sesion</a>
  </form>
  </body>
</html>
