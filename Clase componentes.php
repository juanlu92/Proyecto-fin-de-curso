<?php
include('conexion.php')
class componentes{
  /*Variables*/
  private $idComponente;
  private $idPropiedad;
  private $nombreComponente;
  private $estadoComponente;
  private $tipoComponente;
  /*Constructor*/
  function __construct($idComponente=NULL, $idPropiedad=NULL, $nombreComponente=NULL, $estadoComponente=NULL, $tipoComponente=NULL){
    $this->idComponente = $idComponente;
    $this->idPropiedad = $idPropiedad;
    $this->nombreComponente = $nombreComponente;
    $this->estadoComponente = $estadoComponente;
    $this->tipoComponente = $tipoComponente;
  }
  /*Get y Set*/
  /* ID componente */
  public int getidComponente(){
    return $this->idComponente;
  }
  public void setidComponente(int $idComponente){
    $this->idComponente = $idComponente;
  }
  /* ID propiedad */
  public int getidPropiedad(){
    return $this->idPropiedad;
  }
  public void setidPropiedad(int $idPropiedad){
    $this->idPropiedad = $idPropiedad;
  }
  /* Nombre de compoonentes */
  public int getnombreComponente(){
    return $this->nombreComponente;
  }
  public void setnombreComponente(int $nombreComponente){
    $this->nombreComponente = $nombreComponente;
  }
  /* Estado componente */
  public int getestadoComponente(){
    return $this->estadoComponente;
  }
  public void setestadoComponente(int $estadoComponente){
    $this->estadoComponente = $estadoComponente;
  }
  /* Tipo de componente */
  public int gettipoComponente(){
    return $this->tipoComponente;
  }
  public void settipoComponente(int $tipoComponente){
    $this->tipoComponente = $tipoComponente;
  }
  /* Metodos */
  /*Crear componente*/
  public void crearComponente(){
    conexion::conectar();
    mysql_query("INSERT INTO Componentes values(0, '$this->idComponente', '$this->idPropiedad', '$this->nombreComponente', '$this->estadoComponente', '$this->tipoComponente')");
    conexion::desconectar();
  }
  /*Comprobar la existencia de algun componente*/
  public buscarComponente(int $idComponente){
    conexion::conectar();
    mysql_query("SELECT idComponente FROM Componentes WHERE idComponente = $idComponente");
    conexion::desconectar();
  }
  /* Borrar un componente mediante su ID*/
  public void borrarComponente(int $idComponente){
    conexion::conectar();
    mysql_querry("DELETE FROM Componentes WHERE idComponente = $idComponente");
    conexion::desconectar();
  }
  /* Mostrar todos los componentes en orden ascendente */
  public mostrarComponentes(){
    conexion::conectar();
    mysql_query("SELECT * FROM Componentes ORDER BY ASC");
    conexion::desconectar();
  }

  /* Editar los componentes */
  public editarComponente(){
    conexion::conectar();
    mysql_query("UPDATE Componentes SET nombreComponente = $nombreComponente WHERE idComponente = $idComponente");
    mysql_query("UPDATE Componentes SET estadoComponente = $estadoComponente WHERE idComponente = $idComponente");
    mysql_query("UPDATE Componentes SET tipoComponente = $tipoComponente WHERE idComponente = $idComponente");
    conexion::desconectar();
}
?>
