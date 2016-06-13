<?php
session_start();
$tema=$_GET['h'];
$_SESSION['tema']="css/".$tema.".css";
echo "<script type='text/javascript'>alert('".$_SESSION['tema']."')</script>";
 ?>
