<?php
class habitaciones{
  /* añadir habitación  */
  private $nombrehabitacion;
  private $idcasa;


  /* Borrar habitaciones */

  private $borrarhabitacion;

  /* Editar habitaciones*/

  private $nombreantiguo;
  private $nombrenuevo;
  private $nuevonombrecasa;


public function altahabitacion($nombrehabitacion, $idcasa){
  $this->nombrehabitacion=$nombrehabitacion;
  $this->idcasa=$idcasa;
  $comprobarhabitacion=mysql_query("SELECT nombre FROM Habitaciones WHERE nombre='$nombrehabitacion'") or die (mysql_error());;
  if (mysql_num_rows($comprobarhabitacion)>0){
    echo "<br>";
    echo "<br>";
    echo "<center>Esta habitacion ya esta registrada";
  }else{
  $insertar=mysql_query("INSERT INTO Habitaciones VALUES(NULL,'$this->nombrehabitacion','$this->idcasa')") or die (mysql_error());;
  if($insertar){
    echo "<br><br><center>enhorabuena, se ha añadido la habitacion
    en la base de datos, se te redirijira al menu principal en 5 segundos. ";
    }
  }
}

  public function borrarhabitacion($borrarhabitacion){
    $this->borrarhabitacion=$borrarhabitacion;
    $consultaborrar= mysql_query("DELETE FROM Habitaciones WHERE nombre = '$borrarhabitacion'") or die (mysql_error());;
    if($consultaborrar){
      echo "<br><br><center>enhorabuena, se ha borrado la habitacion
      de la base de datos, se te redirijira al menu principal en 5 segundos. ";
    }
  }

  public function editarhabitacion($nombreantiguo, $nombrenuevo, $nuevonombrecasa){
    $this->nombreantiguo=$nombreantiguo;
    $this->nombrenuevo=$nombrenuevo;
    $this->nuevonombrecasa=$nuevonombrecasa;
    $sql=mysql_query("UPDATE Habitaciones set nombre='$nombrenuevo', idCasa='$nuevonombrecasa' WHERE nombre='$nombreantiguo'") or die (mysql_error());;
    echo "<br><br><center>enhorabuena, se ha editado la habitacion,
    se te redirijira al menu principal en 5 segundos. ";
  }
}



?>
