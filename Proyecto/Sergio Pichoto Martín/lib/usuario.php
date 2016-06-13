<?php
class Usuario {
  /* Alta usuario */
  private $esadmin;
  private $nombrealtausuario;
  private $apellidoaltausuario;
  private $apellidodosaltausuario;
  private $email;
  private $contrasenaaltausuario;

  /* Borrar usuario */
  private $borrarusuario;

  /* Editar usuarios */
  private $idusuario;
  private $editaradmin;
  private $editarnombreusuario;
  private $editarapellidousuario;
  private $editarapellidodosusuario;
  private $editaremail;

  /* Bloquear Usuario */
  private $iduser;
  private $emailbloquser;

  /* Desbloquear usuario */
  private $desbloquser;

  public function altausuario($esadmin, $nombrealtausuario, $apellidoaltausuario, $apellidodosaltausuario, $email, $contrasenaaltausuario){
    $this->esadmin=$esadmin;
    $this->nombrealtausuario=$nombrealtausuario;
    $this->apellidoaltausuario=$apellidoaltausuario;
    $this->apellidodosaltausuario=$apellidodosaltausuario;
    $this->email=$email;
    $this->contrasenaaltausuario=$contrasenaaltausuario;
    $comprobarusuario=mysql_query("SELECT email FROM Usuarios WHERE email='$email'") or die (mysql_error());;
    if (mysql_num_rows($comprobarusuario)>0){
      echo "<br>";
      echo "<br>";
      echo "Este correo electronico ya esta registrado";
    }else{
    $insertar=mysql_query("INSERT INTO Usuarios VALUES(null,'$this->esadmin','$this->nombrealtausuario','$this->apellidoaltausuario','$this->apellidodosaltausuario','1','$this->email','$this->contrasenaaltausuario')") or die (mysql_error());;
    if($insertar){
      echo "<br><br><center>enhorabuena, se ha insertado el usuario
      en la base de datos y se ha mandado un correo de confirmacion, revise su bandeja de entrada
      se te redirijira al menu principal en 5 segundos.";
    }
  }
}

  public function borrarusuario($borrarusuario){
    $this->borrarusuario=$borrarusuario;
    $consultaborrar= mysql_query("DELETE FROM Usuarios WHERE email = '$borrarusuario'") or die (mysql_error());;
    if($consultaborrar){
      echo "";
    }
  }

  public function editarusuario($correoidusuario, $editaradmin, $editarnombreusuario, $editarapellidousuario, $editarapellidodosusuario, $editaremail){
    $this->correoidusuario=$correoidusuario;
    $this->editaradmin=$editaradmin;
    $this->editarnombreusuario=$editarnombreusuario;
    $this->editarapellidousuario=$editarapellidousuario;
    $this->editarapellidodosusuario=$editarapellidodosusuario;
    $this->editaremail=$editaremail;
    if($editaradmin || $editarnombreusuario || $editarapellidousuario || $editarapellidodosusuario || $editaremail ){
      $sql1=mysql_query("UPDATE Usuarios set esAdmin='$editaradmin', nombre='$editarnombreusuario', primerApellido='$editarapellidousuario', segundoApellido='$editarapellidodosusuario', email='$editaremail' WHERE email='$correoidusuario'") or die (mysql_error());;
      echo "";
    }
    else
    {
      echo "<br>";
      echo "<br>";
      echo "No se ha podido editar el usuario";
    }
  }

  public function bloquser($iduser, $emailbloquser){
    $this->iduser=$iduser;
    $this->emailbloquser=$emailbloquser;
    if($iduser || $emailbloquser){
    $cambiarestado= mysql_query("UPDATE Usuarios set estado='$iduser' WHERE email = '$emailbloquser'") or die (mysql_error());;
    if($cambiarestado){
      echo "<br><br><center>enhorabuena, se ha cambiado el estado
        del usuario, se te redirijira al menu principal en 5 segundos. ";
      }
    }
  }
}


?>
