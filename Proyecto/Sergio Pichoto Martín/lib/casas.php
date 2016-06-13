<?php
class casas {
  /*Alta casa*/
  private $nombrecasa;

  /*Borrar casa*/
  private $borrarcasa;

  /* Editar casa */
  private $viejonombrecasa;
  private $editarnombrecasa;

  public function altacasa($nombrecasa){
    $this->nombrecasa=$nombrecasa;
    $comprobarcasa=mysql_query("SELECT nombre FROM Casas WHERE nombre='$nombrecasa'") or die (mysql_error());;
    if (mysql_num_rows($comprobarcasa)>0){
      echo "<br>";
      echo "<br>";
      echo "Esta casa ya esta registrada";
    }else{
    $insertar=mysql_query("INSERT INTO Casas VALUES(null, '$this->nombrecasa')") or die (mysql_error());;
    if($insertar){
      echo "<br><br><center>enhorabuena, se ha insertado la casa
      en la base de datos, se te redirijira en 5 segundos. ";
    }
  }
}

  public function borrarcasa($borrarcasa){
    $this->borrarcasa=$borrarcasa;
    $consultaborrar= mysql_query("DELETE FROM Casas WHERE nombre = '$borrarcasa'") or die (mysql_error());;
    if($consultaborrar){
      echo "<br><br><center>enhorabuena, se ha borrado la casa
      en la base de datos, se te redirijira al menu principal en 5 segundos. ";
    }
  }

  public function editarcasa($viejonombrecasa, $editarnombrecasa){
    $this->viejonombrecasa=$viejonombrecasa;
    $this->editarnombrecasa=$editarnombrecasa;
    if($editarnombrecasa){
      $sql=mysql_query("UPDATE Casas set nombre='$editarnombrecasa' WHERE nombre='$viejonombrecasa'") or die (mysql_error());;
      echo "<br><br><center>enhorabuena, se ha editado la casa,
      se te redirijira al menu principal en 5 segundos. ";
    }
    else
    {
      echo "<br><br><center>No se ha podido editar la casa";
    }
  }
}

?>
