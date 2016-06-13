<?php
	session_start();

?>
<!DOCTYPE html>
<html>
<head>
<head>
	<title>Validando...</title>
	<meta charset="utf-8">
</head>
</head>
<body>
		<?php
			include 'conadmin.php';
			if(isset($_POST['Enviar'])){
				$email = $_POST['email'];
				$password = $_POST['password'];
        $contrasenacod=openssl_digest($password, 'sha512');
				$logear = mysql_query("SELECT * FROM Usuarios WHERE email='$email' and password='$contrasenacod'") or die (mysql_error());;
				$casas = mysql_query("SELECT * FROM Casas") or die (mysql_error());;
				$comprobarbloqueo = mysql_query("SELECT estado FROM Usuarios WHERE email='$email' and password='$contrasenacod'") or die (mysql_error());;
				$numrows = mysql_num_rows($comprobarbloqueo);

				if ($numrows!=0)
				{
				//bucle while que pilla todas las lineas de la consulta y las almacena como $row.
				  while ($row2 = mysql_fetch_assoc($comprobarbloqueo))
				  {
				    $_SESSION['estadousuario']= $row2['estado'];

				    $comprobarbaneo=$_SESSION['estadousuario'];

				    if ($comprobarbaneo=='0') {
				      header ("Location: bloqueado.php");
				    }
					}
				}

				if (mysql_num_rows($logear)>0) {
					$row = mysql_fetch_array($logear);
					$_SESSION["email"] = $row['email'];
          $ns=$row['esAdmin']; // descargo el niver de usuario
          if($ns==1){ // relizo la comparacion para saber a q menu de usuario me va direcionar si es NivelUsuario 1 va al pagina inicio administrador
           header("refresh:0.1 ;url=goadmin.php");
         }else{header("refresh:0.1 ;url=gouser.php"); //si el NivelUsuario es mayor o diferente a 1 va la pagina inicio del usuario normal
         }
				  	echo 'Iniciando sesión para '.$_SESSION['email'].' <p>';
				}
				else{
					echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
					echo '<script> window.location="principal.php"; </script>';
				}
				$patata=$_SESSION['idUsuario'] = $row['idUsuario'];
				$pillarcasas = mysql_query("SELECT idCasa FROM poseen");
				$row2 = mysql_fetch_array($pillarcasas);
				$patata2=$_SESSION['idCasa'] = $row2['idCasa'];
		}
		?>
</body>
</html>
