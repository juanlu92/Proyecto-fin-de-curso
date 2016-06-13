<?php
include('../Conexion.php');
/*Encriptación de toda la base de datos de forma manual*/
conexion::conectar();
$consulta=mysql_query("SELECT idUsuario,password FROM Usuarios");
while ($consultaDatos=mysql_fetch_array($consulta)) {
  $password = openssl_digest($consultaDatos[1], 'sha512');
  $consultaN=mysql_query("UPDATE Usuarios SET password='$password' WHERE idUsuario='$consultaDatos[0]'");
}
echo "Realizado";
conexion::desconectar();
 ?>
