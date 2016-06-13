<?php
include('../conexion.php');
conexion::activarComponente("led");
/*CONEXIÓN CON ARDUINO*/
$fp =fopen("/dev/ttyACM0", "w+");
if( !$fp){
        die("error");
}
fwrite($fp, "H");
fclose($fp);
?>
