<?php
include('../conexion.php');
conexion::autoComponente("ventilador");
/*CONEXIÓN CON ARDUINO*/
$fp =fopen("/dev/ttyACM0", "w+");
if( !$fp){
        die("error");
}
fwrite($fp, "V");
fclose($fp);
?>
