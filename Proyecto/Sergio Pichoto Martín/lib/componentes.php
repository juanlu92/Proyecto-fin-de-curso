<?php
class Componentes {
  /* Alta familiar */
  private $tipocomponente;
  private $privilegiocomponente;

  /* borrar componente */

  private $borrarcomponente;

  /* Editar Componente */

  private $idcomponente;
  private $nuevoprivilegiocomponente;
  private $nuevotipo;

  public function altacomponente($tipocomponente, $privilegiocomponente){
    $this->tipocomponente=$tipocomponente;
    $this->privilegiocomponente=$privilegiocomponente;
    $comprobarcomponentes=mysql_query("SELECT tipo FROM Componentes WHERE tipo='$tipocomponente'") or die (mysql_error());;
    if (mysql_num_rows($comprobarcomponentes)>0){
      echo "<br>";
      echo "<br>";
      echo "<br><br><center>Esta componente ya esta registrado";
    }else{
    $insertar=mysql_query("INSERT INTO Componentes VALUES (null,'1','$this->tipocomponente','$this->privilegiocomponente')") or die (mysql_error());;
      if($insertar){
        echo "<br><br><center>enhorabuena, se ha insertado el componente
        en la base de datos, se te redirijira al menu principal en 5 segundos. ";
      }
    }
  }


  public function borrarcomponente($borrarcomponente){
    $this->borrarcomponente=$borrarcomponente;
    $consultaborrar= mysql_query("DELETE FROM Componentes WHERE tipo = '$borrarcomponente'") or die (mysql_error());;
    if($consultaborrar){
      echo "<br><br><center>enhorabuena, se ha borrado el componente
      de la base de datos, se te redirijira al menu principal en 5 segundos. ";

    }else{
      echo "No se ha podido borrar el componente";
    }
  }

  public function editarcomponentes($viejotipo, $nuevotipo, $nuevoprivilegiocomponente){
    $this->viejotipo=$viejotipo;
    $this->nuevotipo=$nuevotipo;
    $this->nuevoprivilegiocomponente=$nuevoprivilegiocomponente;
    if($nuevotipo){
      $sql=mysql_query("UPDATE Componentes set tipo='$nuevotipo', privilegios='$nuevoprivilegiocomponente' WHERE tipo='$viejotipo'") or die (mysql_error());;
      echo "<br><br><center>enhorabuena, se ha editado el componente,
      se te redirijira al menu principal en 5 segundos. ";
    }
    else
    {
      echo "No se ha podido editar el componente";
    }
  }
}

?>
