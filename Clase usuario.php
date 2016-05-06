<?php

include('conexion.php');
class usuario{
	/*Variables*/
	private $idUsuario;
	private $nombreUsuario;
	private $apellido1;
	private $apellido2;
	private $estado;
	private $nick;
	private $email;
	private $password;

	/*Constructor*/

	function __construct($idUsuario=NULL, $nombreUsuario=NULL, $apellido1=NULL, $apellido2=NULL, $estado=NULL, $nick=NULL, $email=NULL, $password=NULL){
		$this->idUsuario = $idUsuario;
		$this->nombreUsuario = $nombreUsuario;
		$this->apellido1 = $apellido1;
		$this->apellido2 = $apellido2;
		$this->estado = $estado;
		$this->nick = $nick;
		$this->email = $email;
		$this->password = $password;
	}

	/*Get y Set*/

	/*Id del usuario*/
	public getIdUsuario(){
		return $this->idUsuario;
	}

	public setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	/*Nombre del usuario*/
	public getNombreUsuario(){
		return $this->nombreUsuario;
	}

	public setNombreUsuario($nombreUsuario){
		$this->nombreUsuario = $nombreUsuario;
	}

	/*Primer Apellido del Usuario*/
	public getApellido1(){
		return $this->apellido1;
	}

	public setApellido1($apellido1){
		$this->apellido1 = $apellido1;
	}

	/*Segundo Apellido del Usuario*/
	public getApellido2(){
		return $this->apellido2;
	}

	public setApellido2($apellido2){
		$this->apellido2 = $apellido2;
	}

	/*Estado*/
	public getEstado(){
		return $this->estado;
	}

	public setEstado($estado){
		$this->estado = $estado;
	}

	/*Nick*/
	public getNick(){
		return $this->nick;
	}

	public setNick($nick){
		$this->nick = $nick;
	}

	/*Email*/
	public getEmail(){
		return $this->email;
	}

	public setEmail($email){
		$this->email = $email;
	}

	/*Password*/
	public getPassword(){
		return $this->password;
	}

	public setPassword($password){
		$this->password = $password;
	}

	/*Metodos*/

	/*Crear usuario*/
	public crearUsuario(){
		conexion::conectar();
		mysql_query("INSERT INTO Usuarios values(0, '$this->nombreUsuario', '$this->apellido1', '$this->apellido2', '$this->estado')");
		conexion::desconectar();
	}

	/*Ver si existe un usuario*/
	public buscarUsuario(int $idUsuario){
		conexion::conectar();
		mysql_query("SELECT idUsuario FROM Usuarios WHERE idUsuario = $idUsuario");
		conexion::desconectar();
	}

	/*Borrar un usuario mediante la id*/
	public borrarUsuario(int $idUsuario){
		conexion::conectar();
		mysql_query("DELETE FROM Usuario WHERE idUsuario = $idUsuario");
		conexion::desconectar();
	}

	/*Mostrar usuarios*/
	public mostrarUsuarios(){
		conexion::conectar();
		mysql_query("SELECT * FROM Usuarios ORDER BY idUsuario ASC");
		conexion::desconectar();
	}

	/*Verificar*/
	public verificar($nick, $password){
		conexion::conectar();
		$consulta = mysql_query("SELECT password FROM Usuarios WHERE nick = $nick");
		if($password == $consulta[0]){
			return True;
		}
		else{
			return False;
		}
		conexion::desconectar();
	}


}


?>
