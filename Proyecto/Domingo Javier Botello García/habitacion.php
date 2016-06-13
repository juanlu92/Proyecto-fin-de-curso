<?php
class habitacion
{
  private $idHabitacion;
  private $nombre;
  private $idCasa;
  private $componente;
  private $arrayConsulta;
  function __construct($idHabitacion=NULL,$nombre=NULL,$idCasa=NULL,$componente=NULL, $arrayConsulta=NULL)
  {
      $this->idHabitacion=$idHabitacion;
      $this->nombre=$nombre;
      $this->idCasa=$idCasa;
      $this->componente= array();
      $this->arrayConsulta= array();
  }
  /*Crear Casa*/
  public function Crear(){
    conexion::conectar();
    $consulta = mysql_query("INSERT INTO habitaciones VALUES (0,'$this->nombre','$this->idCasa')");
    $ultima=mysql_query("SELECT LAST_INSERT_ID()");
    $ultima=mysql_fetch_array($ultima);
    $consultaId= mysql_query("SELECT idCasa FROM Habitaciones WHERE idHabitacion='$ultima[0])'");
    $consultaId= mysql_fetch_array($consultaId);
    $this->idHabitacion=$consultaId[0];
    return $this->idHabitacion;
    if (!$consulta) {
      die('ERROR:'.mysql_error());
    }
    conexion::desconectar();
  }
  /*Modificar Casa*/
  public function Modificar(){
    conexion::conectar();
    $consulta = mysql_query("UPDATE Habitaciones SET nombre='$this->nombre' WHERE idHabitacion='$this->idHabitacion'");
    if (!$consulta) {
      die('ERROR:'.mysql_error());
    }
    conexion::desconectar();
  }
  /*Borrar Casa*/
  public function Borrar($id){
    conexion::conectar();
    $consulta = mysql_query("DELETE FROM Habitaciones WHERE idHabitacion='$id'");
    if (!$consulta) {
      die('ERROR:'.mysql_error());
    }
    conexion::desconectar();
  }
  /*Obtener Casa*/
  public function BuscarCasa(){
    conexion::conectar();
    $consulta = mysql_query("SELECT idCasa FROM habitaciones WHERE idHabitacion='$this->idHabitacion'");
    $consulta=mysql_fetch_array($consulta);
    $this->idCasa=$consulta[0];
    if (!$consulta) {
      die('ERROR:'.mysql_error());
    }
    else {
      return $this->idCasa;
    }
    conexion::desconectar();
  }
  /*Mostrar Casas*/
  public function Mostrar(){
    conexion::conectar();
    $consulta=mysql_query("SELECT idHabitacion,nombre,idCasa FROM habitaciones WHERE idCasa='$this->idCasa'");
    $z=0;
    while ($consultaDatos=mysql_fetch_row($consulta)){
        $this->arrayConsulta[$z]=$consultaDatos[0];
        $this->arrayConsulta[$z+1]=$consultaDatos[1];
        $this->arrayConsulta[$z+2]=$consultaDatos[2];
        $z=$z+3;
    }
    conexion::desconectar();
    if (!$consulta) {
      die('ERROR:'.mysql_error());
    }
    else {
      return $this->arrayConsulta;
    }
  }
  /*Filtrar*/
  public function Buscar(){
    $consulta = "SELECT * FROM Habitaciones WHERE";
    $and=false;
    if ($this->idHabitacion!=NULL) {
        $and=true;
        $consulta = $consulta." idHabitacion='$this->idHabitacion'";
    }
    if ($this->nombre!=NULL) {
      if($and){
        $consulta = $consulta." AND nombre='$this->nombre'";
      }
      else {
        $and=true;
        $consulta = $consulta." nombre='$this->nombre'";
      }
    }
    if ($this->idCasa!=NULL) {
      if($and){
        $consulta = $consulta." AND idCasa='$this->idCasa'";
      }
      else {
        $and=true;
        $consulta = $consulta." idCasa='$this->idCasa'";
      }
    }
    if ($this->idHabitacion==NULL && $this->nombre==NULL && $this->idCasa==NULL && $this->numComponentes==NULL){
        return NULL;
    }
    else{
    conexion::conectar();
    $consulta = mysql_query($consulta);
    $z=0;
    while ($consultaDatos=mysql_fetch_row($consulta)){
        $this->arrayConsulta[$z]=$consultaDatos[0];
        $this->arrayConsulta[$z+1]=$consultaDatos[1];
        $this->arrayConsulta[$z+2]=$consultaDatos[2];
        $this->arrayConsulta[$z+3]=$consultaDatos[3];
        $z=$z+4;
    }
    conexion::desconectar();
    //echo "<script>window.location='filtro.php'</script>";
    if (!$consulta) {
      die('ERROR:'.mysql_error());
    }
    else {
      return $this->arrayConsulta;
    }
    }
  }
  //GET Y SETS
  /*Nombre*/
  public function setNombre($nombre) {
     $this->nombre= $nombre;
  }
  public function getNombre() {
     return $this->nombre;
  }
  /*IdCasa*/
  public function setIdCasa($idCasa) {
     $this->idCasa= $idCasa;
  }

  public function getIdCasa() {
     return $this->idCasa;
  }
  /*Consulta*/
  public function getArrayConsulta() {
     return $this->arrayConsulta;
  }
  /*Componentes*/
  public function getComponentes() {
    conexion::conectar();
    $listaComponentes=array();
     $consulta=mysql_query("SELECT Pertenece.idComponente, Componentes.estado, Componentes.tipo, Componentes.privilegios privilegios, Pertenece.privilegios comp FROM Pertenece INNER JOIN Componentes ON Pertenece.idComponente=Componentes.idComponente WHERE Pertenece.idHabitacion='$this->idHabitacion' ORDER BY Pertenece.idComponente") or die("Error en: : " . mysql_error());
     $i=0;
     while ($consultaDatos=mysql_fetch_array($consulta)) {
        $listaComponentes[$i] = $consultaDatos[0];
        $listaComponentes[$i+1] = $consultaDatos[1];
        $listaComponentes[$i+2] = $consultaDatos[2];
        $listaComponentes[$i+3] = $consultaDatos[3];
        $listaComponentes[$i+4] = $consultaDatos[4];
        $i=$i+5;
     }
     $this->componente=$listaComponentes;
     return $this->componente;
     conexion::desconectar();
  }
  public function setComponentes($componente){
    $this->componente=$componente;
  }
  //Método para convertir variable a String
  public function __toString()
   {
       return $this->nombre;
   }
}



 ?>
