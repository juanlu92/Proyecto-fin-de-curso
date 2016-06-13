<?php
include('../conexion.php');
conexion::desactivarComponente("motor");
/*CONEXIÓN CON ARDUINO*/
$fp =fopen("/dev/ttyACM0", "w+");
if( !$fp){
        die("error");
}
fwrite($fp, "C");
fclose($fp);
?>
