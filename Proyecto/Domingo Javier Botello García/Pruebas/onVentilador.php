<?php
include('../conexion.php');
conexion::activarComponente("ventilador");
/*CONEXIÓN CON ARDUINO*/
$fp =fopen("/dev/ttyACM0", "w+");
if( !$fp){
        die("error");
}
fwrite($fp, "E");
fclose($fp);
?>
