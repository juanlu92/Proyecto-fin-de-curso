<?php
	$conect = mysql_connect("localhost","root","alumno") or die ("No se encontró el servidor");
	mysql_select_db("Proyecto",$conect) or die ("No se encontró la base de datos");
 ?>
