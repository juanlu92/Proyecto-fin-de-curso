<?php
include('../conexion.php');
conexion::desactivarComponente("ventilador");
/*CONEXIÓN CON ARDUINO*/
$fp =fopen("/dev/ttyACM0", "w+");
if( !$fp){
        die("error");
}
fwrite($fp, "A");
fclose($fp);
?>
