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
	public int getIdUsuario(){
		return $this->idUsuario;
	}

	public void setIdUsuario(int $idUsuario){
		$this->idUsuario = $idUsuario;
	}

	/*Nombre del usuario*/
	public String getNombreUsuario(){
		return $this->nombreUsuario;
	}

	public void setNombreUsuario(String $nombreUsuario){
		$this->nombreUsuario = $nombreUsuario;
	}

	/*Primer Apellido del Usuario*/
	public String getApellido1(){
		return $this->apellido1;
	}

	public void setApellido1(String $apellido1){
		$this->apellido1 = $apellido1;
	}

	/*Segundo Apellido del Usuario*/
	public String getApellido2(){
		return $this->apellido2;
	}

	public void setApellido2(String $apellido2){
		$this->apellido2 = $apellido2;
	}

	/*Estado*/
	public boolean getEstado(){
		return $this->estado;
	}

	public void setEstado(boolean $estado){
		$this->estado = $estado;
	}

	/*Nick*/
	public String getNick(){
		return $this->nick;
	}

	public void setNick(String $nick){
		$this->nick = $nick;
	}

	/*Email*/
	public String getEmail(){
		return $this->email;
	}

	public void setEmail(String $email){
		$this->email = $email;
	}

	/*Password*/
	public String getPassword(){
		return $this->password;
	}

	public void setPassword(String $password){
		$this->password = $password;
	}

	/*Metodos*/

	/*Crear usuario*/
	public void crearUsuario(){
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
	public void borrarUsuario(int $idUsuario){
		conexion::conectar();
		mysql_query("DELETE FROM Usuario WHERE idUsuario = $idUsuario");
		conexion::desconectar();
	}

	/*Mostrar usuarios*/
	public mostrarUsuarios(){
		conexion::conectar();
		mysql_query("SELECT * FROM Usuarios ORDER BY ASC");
		conexion::desconectar();
	}

	/*Verificar*/
	public boolean verificar(String $nick, String $password){
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
