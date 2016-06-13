<!DOCTYPE html>
<?php
?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href=".././Recursos/css/buscador.css">
    <link rel="stylesheet" href=".././Recursos/css/main_css.css">
    <title></title>
  </head>
  <body>
    <body>
      <nav>
          <ul>
              <li><a href="pagina_panel_administrador.php">Volver al panel</a></li>
          </ul>
      </nav>
  <span>Pulsa para buscar: </span>
  <form class="formulariobusqueda" action="busqueda_general_habitacion_componente.php" method="post">
  <select name="busqueda">
    <option value="general">Búsqueda general</option>
  </select>
  <button type="submit" value="Buscar por filtro">Enviar</button>
  <br><br>
  <a href="javascript:history.back()"> Volver Atras</a>
  <br><br>
  <a href='.././login/logout.php'>Cerrar Sesion</a>

  </form>
  </body>
</html>
