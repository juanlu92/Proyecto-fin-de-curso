<?php
include('../conexion.php');
conexion::activarComponente("motor");
/*CONEXIÓN CON ARDUINO*/
$fp =fopen("/dev/ttyACM0", "w+");
if( !$fp){
        die("error");
}
fwrite($fp, "O");
fclose($fp);
?>
