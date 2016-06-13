<?php
include('../conexion.php');
conexion::desactivarComponente("led");
/*CONEXIÓN CON ARDUINO*/
$fp =fopen("/dev/ttyACM0", "w+");
if( !$fp) {
        die("error");
}
fwrite($fp, "L");
fclose($fp);
?>
