<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/custom.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="shortcut icon" href="favicon/favicon.gif">
  </head>
  <body id="loginBack">
    <div class="row">
      <div class="col-md-5 col-md-offset-5" id='login'>
        <h1 class="loginTitulo">Login</h1>
    <form action="index.php" method="post">
      <input class='form-control' type="text" name="Email" value="" placeholder="Email">
      <input class='form-control' type="password" name="Password" value="" placeholder="Contraseña">
      <input class='form-control' type="submit" name="Login" value="Enviar">
    </form>
    </div>
  </div>
  </body>
</html>
<?php
if (isset($_POST['Login'])) {
  include ('usuario.php');
  include ('conexion.php');
  $email=$_POST['Email'];
  $password=$_POST['Password'];
  //Encriptar contraseña
  $password=openssl_digest($password, 'sha512');
  $usuario= new Usuario(0,0,$email,$password,0,0,0,0);
  if ($usuario->verificar()) {
    session_start();
    /*Guardamos en sesión al usuario en cuestión, nuestro tema, y los privilegios que tenemos en cada componente*/
    $_SESSION['Usuario']=$usuario->verificar();
    $_SESSION['tema']="css/tema.css";
    $_SESSION['privilegios']=$usuario->privilegios();
    //Redirección
    header('Location: filtro.php');
  }
}
 ?>
