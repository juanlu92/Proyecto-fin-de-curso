<?php

define('HOST','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BASE','Proyecto');

class conexion{
	public static function conectar(){
		$conectar=mysql_connect(HOST,USUARIO,PASSWORD);
		mysql_select_db(BASE);
		mysql_set_charset("utf8");
	}

	public static function desconectar(){
		mysql_close();
	}
	public static function cerrarsesion(){
		session_start();
		$_SESSION['Usuario']=NULL;
		session_destroy();
		header("Location: index.php");
	}
	public static function desactivarComponente($componente){
		conexion::conectar();
		$consulta=mysql_query("UPDATE Componentes SET estado='0' WHERE tipo='$componente'");
		conexion::desconectar();
	}
	public static function activarComponente($componente){
		conexion::conectar();
		$consulta=mysql_query("UPDATE Componentes SET estado='1' WHERE tipo='$componente'");
		conexion::desconectar();
	}
	public static function autoComponente($componente){
		conexion::conectar();
		$consulta=mysql_query("UPDATE Componentes SET estado='2' WHERE tipo='$componente'");
		conexion::desconectar();
	}
	/*Mostrar casas únicamente en el filtro*/
	public static function mostrar($id){
		conexion::conectar();
		$consulta=mysql_query("SELECT Casas.idCasa, Casas.nombre FROM Casas INNER JOIN Poseen ON Casas.idCasa=Poseen.idCasa WHERE Poseen.idUsuario='$id' ORDER BY Casas.idCasa") or die("Error en: : " . mysql_error());
		while ($consultaDatos=mysql_fetch_row($consulta)){
        echo "<option value='$consultaDatos[0]'>$consultaDatos[1]</option>";
    }
		conexion::desconectar();
	}
}
?>
