<?php
session_start();
include('conexion.php');
include('usuario.php');
/*Variables y métodos*/
$idUsuario=$_POST['idUsuario'];
$nombre=$_POST['nombre'];
$primerApellido=$_POST['primerApellido'];
$segundoApellido=$_POST['segundoApellido'];
$email=$_POST['email'];
$password=$_POST['password'];
$password=openssl_digest($password, 'sha512');
$usuario= new usuario($idUsuario,0,$email,$password,$nombre,$primerApellido,$segundoApellido,0);
$usuario->modificarUsuario();
$_SESSION['Usuario']=$usuario->verificarModificado();
/*Cuadro de AJAX*/
echo "<div class='row'><div class='col-md-4 col-md-offset-4'><p class='saludo'>".$_SESSION['Usuario'][2].", se han realizado los cambios correctamente</p></div></div>";
 ?>
