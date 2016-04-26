/*FUNCIONA*/

/**
 * Habitación
 */
 include('conexion.php');
class habitacion
{
  private $id;
  private $nombre;
  function __construct($id,$nombre)
  {
    $this->id=$id;
    $this->nombre=$nombre;
  }

  public function Crear(){
    conexion::conectar();
    mysql_query("INSERT INTO habitacion VALUES ('prueba')");
  }
  public function Borrar(){
    conexion::conectar();
    mysql_query("DELETE FROM habitación WHERE id='$this->id'");
  }
  //GET Y SETS

}

/**
 * Casa
 */
 include('conexion.php');
 include('habitacion.php');
class casa
{
  private $id;
  private $nombre;
  private $habitacion;
  function __construct($id,$nombre,$habitacion)
  {
    $this->id=$id;
    $this->nombre=$nombre;
		$this->habitacion = new habitacion();
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
  
}

