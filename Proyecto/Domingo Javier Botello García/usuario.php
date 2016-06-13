<?php

class usuario{
	/*Variables*/
	private $idUsuario;
	private $nombreUsuario;
	private $esAdmin;
	private $apellido1;
	private $apellido2;
	private $estado;
	private $email;
	private $password;

	/*Constructor*/

	function __construct($idUsuario=NULL, $esAdmin=NULL, $email, $password, $nombreUsuario=NULL, $apellido1=NULL, $apellido2=NULL, $estado=NULL){
		$this->idUsuario = $idUsuario;
		$this->esAdmin= $esAdmin;
		$this->email = $email;
		$this->password = $password;
		$this->nombreUsuario = $nombreUsuario;
		$this->apellido1 = $apellido1;
		$this->apellido2 = $apellido2;
		$this->estado = $estado;
	}

	/*Get y Set*/

	/*Id del usuario*/
	public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	/*Nombre del usuario*/
	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	/*Primer Apellido del Usuario*/
	public function getApellido1(){
		return $this->apellido1;
	}

	public function setApellido1($apellido1){
		$this->apellido1 = $apellido1;
	}

	/*Segundo Apellido del Usuario*/
	public function getApellido2(){
		return $this->apellido2;
	}

	public function setApellido2($apellido2){
		$this->apellido2 = $apellido2;
	}

	/*Estado*/
	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	/*Email*/
	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	/*Password*/
	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		openssl_digest($password, 'sha512');
		$this->password = $password;
	}
	/*esAdmin*/
	public function getEsAdmin(){
		return $this->esAdmin;
	}

	public function setEsAdmin($esAdmin){
		$this->esAdmin = $esAdmin;
	}

	/*Metodos*/

	/*Crear usuario*/
	public function crearUsuario(){
		conexion::conectar();
		mysql_query("INSERT INTO Usuarios values(0, '$this->nombreUsuario', '$this->apellido1', '$this->apellido2', '$this->estado','$this->nick', '$this->email', '$this->password', $this->rol)");
		conexion::desconectar();
	}

	/*Actualizar un usuario*/
	public function modificarUsuario(){
		conexion::conectar();
		if ($this->password!='') {
			$consulta=mysql_query("UPDATE Usuarios SET nombre='$this->nombreUsuario', primerApellido='$this->apellido1', segundoApellido='$this->apellido2', estado='$this->estado', email='$this->email', password='$this->password' WHERE idUsuario = $this->idUsuario");
		}
		else {
			$consulta=mysql_query("UPDATE Usuarios SET nombre='$this->nombreUsuario', primerApellido='$this->apellido1', segundoApellido='$this->apellido2', estado='$this->estado', email='$this->email' WHERE idUsuario = $this->idUsuario");
		}
		if (!$consulta) {
			die('ERROR:'.mysql_error());
		}
		conexion::desconectar();
	}

	/*Ver si existe un usuario*/
	public function buscarUsuario($idUsuario){
		conexion::conectar();
		mysql_query("SELECT idUsuario FROM Usuarios WHERE idUsuario = $idUsuario");
		conexion::desconectar();
	}

	/*Borrar un usuario mediante la id*/
	public function borrarUsuario($idUsuario){
		conexion::conectar();
		mysql_query("DELETE FROM Usuario WHERE idUsuario = $idUsuario");
		conexion::desconectar();
	}
	/*Mostrar usuarios*/
	public function mostrarUsuarios(){
		conexion::conectar();
		mysql_query("SELECT * FROM Usuarios ORDER BY idUsuario ASC");
		conexion::desconectar();
	}
	/*privilegios*/
	public function privilegios(){
		$consultaCasas= mysql_query("SELECT privilegios,idCasa FROM Pertenece WHERE idUsuario='$this->idUsuario'");
		$rol=array();
		$i=0;
		while($consultaCasas=mysql_fetch_array($consultaCasas)){
			$rol[$i]=$consultaCasas[$i];
			$i++;
		}
		return $rol;
	}
	/*Verificar*/
	public function verificar(){
		conexion::conectar();
		//echo "mis variables".$this->email, $this->password."<br>";
		$consulta = mysql_query("SELECT * FROM Usuarios WHERE email='$this->email'");
		if($consulta){
		$consulta= mysql_fetch_array($consulta);
		$estadoConsulta=$consulta[5];
		$emailConsulta=$consulta[6];
		$passwordConsulta=$consulta[7];
		$array=array($consulta[0],$consulta[1],$consulta[2],$consulta[3],$consulta[4],$consulta[5],$consulta[6],$consulta[7]);
		//echo "<h1>".$emailConsulta, $passwordConsulta."</h1>";
		if($this->password == $passwordConsulta && $this->email == $emailConsulta && $estadoConsulta == 0){
			return $array;
		}
		else{
			return False;
		}
		//
		}
		else{
			return False;
		}
		conexion::desconectar();
	}
	/*Verificar edición*/
	public function verificarModificado(){
		conexion::conectar();
		//echo "mis variables".$this->email, $this->password."<br>";
		$consulta = mysql_query("SELECT * FROM Usuarios WHERE email='$this->email'");
		if($consulta){
		$consulta= mysql_fetch_array($consulta);
		$estadoConsulta=$consulta[5];
		$emailConsulta=$consulta[6];
		$array=array($consulta[0],$consulta[1],$consulta[2],$consulta[3],$consulta[4],$consulta[5],$consulta[6],$consulta[7]);
		//echo "<h1>".$emailConsulta, $passwordConsulta."</h1>";
		if($this->email == $emailConsulta && $estadoConsulta == 0){
			return $array;
		}
		else{
			return False;
		}
		//
		}
		else{
			return False;
		}
		conexion::desconectar();
	}
	public function __toString(){
        return $this->foo;
    }

}


?>
