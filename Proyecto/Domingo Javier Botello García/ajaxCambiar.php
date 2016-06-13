<?php
include('conexion.php');
include('habitacion.php');
/*Variables y métodos*/
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$habitacionNueva= new habitacion($id,$nombre,array(),array());
$habitacionNueva->Modificar();
$habitacionNueva->BuscarCasa();
header('Location: filtro.php');
?>
