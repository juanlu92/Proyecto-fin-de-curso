<?php
include('conexion.php');
session_start();
/*RECIBE UN POST*/
$buscar = $_POST['b'];
/*Si es vacío o mayor que tres, para no sobrecargar la base de datos*/
if(!empty($buscar) && strlen($buscar)>=3) {
  buscar($buscar);
}
function buscar($b) {
  conexion::conectar();
  $consulta = mysql_query("SELECT * FROM usuarios WHERE nombre LIKE '%".$b."%'");
  $contar = mysql_num_rows($consulta);
  if($contar == 0){
    echo "No se han encontrado resultados para '<b>".$b."</b>'.";
  }
  else{
    while($row=mysql_fetch_array($consulta)){
      $nombre = $row['nombre'];
      $id = $row['idUsuario'];
      echo $id." - ".$nombre."<br/>";
    }
  }
  conexion::desconectar();
}
?>
