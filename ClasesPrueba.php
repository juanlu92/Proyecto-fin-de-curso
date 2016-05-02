// HABITACIÓN

<?php
/**
 * Habitación EJEMPLO PARA PICHOTO
 */
 include('componente.php');
class habitacion
{
  private $id;
  private $nombre;
  private $componente;
  private $numComponentes;
  function __construct($id,$nombre)
  {
    $this->id=$id;
    $this->nombre=$nombre;
    $this->componente= array();
    $this->numComponentes=$numComponentes;
    for ($i=0; $i < $this->numComponentes; $i++) {
      $this->componente[$i] = new componente();
    }
  }

  public function Crear(){
    conexion::conectar();
    mysql_query("INSERT INTO habitacion VALUES ('prueba')");
  }
  public function Borrar(){
    conexion::conectar();
    mysql_query("DELETE FROM habitacion WHERE id='$this->id'");
  }
  //GET Y SETS
  public function setNombre($nombre) {
     $this->nombre= $nombre;
  }

  public function getNombre() {
     return $this->nombre;
  }
  //RELLENAR CON LOS GET Y SETS COMO EN EL EJEMPLO DE NOMBRE
  //Método para convertir variable a String
  public function __toString()
   {
       return $this->nombre;
   }
}



 ?>
 
 // CASA
 
 <?php
/**
 * Casa EJEMPLO PARA PICHOTO
 */
 include('conexion.php');
 include('habitacion.php');
class casa
{
  private $id;
  private $nombre;
  private $habitacion;
  private $numHabitacion;
  function __construct($id,$nombre,$numHabitacion)
  {
    $this->id=$id;
    $this->nombre=$nombre;
    $this->habitacion= array();
    $this->numHabitacion=$numHabitacion;
    for ($i=0; $i < $this->numHabitacion; $i++) {
      $this->habitacion[$i] = new habitacion();
    }
  }

  public function Crear(){
    conexion::conectar();
    mysql_query("INSERT INTO casa VALUES ('prueba')");
  }
  public function Borrar(){
    conexion::conectar();
    mysql_query("DELETE FROM casa WHERE id='$this->id'");
  }
  //GET Y SETS
  public function setNombre($nombre) {
     $this->nombre= $nombre;
  }

  public function getNombre() {
     return $this->nombre;
  }
  //RELLENAR CON LOS GET Y SETS COMO EN EL EJEMPLO DE NOMBRE
  //Método para convertir variable a String
  public function __toString()
   {
       return $this->nombre;
   }
}



 ?>
