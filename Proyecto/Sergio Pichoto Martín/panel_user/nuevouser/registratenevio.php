<!DOCTYPE html>
<?php
session_start();
include "../.././lib/usuario.php"
?>
<html>
<head>
      <meta charset="utf-8" http-equiv="Refresh" content="5;url=iniciasesion.php">
    <!-- Font awesome -->
      <link rel="stylesheet" href="../.././Recursos/css/font-awesome.min.css">
      <!-- Sandstone Bootstrap CSS -->
      <link rel="stylesheet" href="../.././Recursos/css/bootstrap.min.css">
      <!-- Bootstrap Datatables -->
      <link rel="stylesheet" href="../.././Recursos/css/dataTables.bootstrap.min.css">
      <!-- Bootstrap social button library -->
      <link rel="stylesheet" href="../.././Recursos/css/bootstrap-social.css">
      <!-- Bootstrap select -->
      <link rel="stylesheet" href="../.././Recursos/css/bootstrap-select.css">
      <!-- Bootstrap file input -->
      <link rel="stylesheet" href="../.././Recursos/css/fileinput.min.css">
      <!-- Awesome Bootstrap checkbox -->
      <link rel="stylesheet" href="../.././Recursos/css/awesome-bootstrap-checkbox.css">
      <!-- Admin Stye -->
      <link rel="stylesheet" href="../.././Recursos/css/style.css">
      <link rel="stylesheet" href="./.././Recursos/css/fon.css">

    </head>
    <body background="../.././Recursos/img/fondo.jpg">
      <div class="brand clearfix">
  <a class="logo"><img src="../.././Recursos/img/logo.jpg" class="img-responsive" alt=""></a>
  <span class="menu-btn"><i class="fa fa-bars"></i></span>
  <ul class="ts-profile-nav">
  <li><a href="pagina_panel_administrador.php">Panel Administrador Principal</a></li>
  <li><a href='../.././login/logout.php'>Cerrar Sesion</a></li>
  </ul>
  </div>
  <div class="ts-main-content">
  		</div>
      <div class="container">
  			<div class="row">
  				<div class="col-md-6 col-md-offset-3"><br>
  						<div class="well row pt-2x pb-3x bk-light">
  							<div class="col-md-8 col-md-offset-2"><br><br><br>
  								<section> <center>
  									<ul>
  				<label for="" class="text-uppercase text-sm"></label><br>
  			</ul>
  		</section>
  	</div>
        <?php
            include '../.././login/conadmin.php';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            $nombre = $_POST['nombre'];
            $apellidouno = $_POST['apellidouno'];
            $apellidodos = $_POST['apellidodos'];
            $email = $_POST['email'];
            $contrasena = $_POST['pass'];
            echo '<br>';
            echo '<br>';
            echo '<br>';
            $ordenar=mysql_query('ALTER TABLE Usuarios AUTO_INCREMENT=1');
            $altausuario=new Usuario;
            $altausuario->altausuario(0, $nombre, $apellidouno, $apellidodos, $email, openssl_digest($contrasena, 'sha512'));
        ?>
        <?php
        //Incluimos la clase de PHPMailer
        require('../.././lib/phpmailer/class.phpmailer.php');
        require('../.././lib/phpmailer/class.smtp.php');
        // Información para configuracion
        $mail = new PHPMailer();

            $mail->From     = 'sergio_coloso@hotmail.com';
            $mail->FromName = 'Equipo Nautilus';
            $mail->AddAddress($email); // Dirección a la que llegaran los mensajes.

        // Aquí van los datos que apareceran en el correo que reciba

        $mail->WordWrap = 50;
        $mail->IsHTML(true);
        $mail->Subject  =  "Greetings, $nombre, usted se ha registrado en Proyecto Nautilus.
        Aqui encontraras la informacion de registro"; // Asunto del mensaje.
        $mail->Body     =  "Nombre de Usuario: $nombre \n<br />
        Primer Apellido: $apellidouno \n<br />
        Segundo Apellido: $apellidodos \n<br />
        Correo de Registro: $email \n<br />
        Gracias por Registrarte, que pase buen dia.".    // Email del usuario

        // Datos del servidor SMTP, podemos usar el de Google, Outlook, etc...
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com:25';  // Servidor de Salida. 465 es uno de los puertos que usa Google para su servidor SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'nautilussjd@gmail.com';  // Correo Electrónico
            $mail->Password = 'nautilus12'; // Contraseña del correo

            if( ! $mail->Send() )
            {
                echo "No se pudo enviar el Mensaje.";
                echo "<br><br><br>";
                echo $mail->ErrorInfo;
            }
            else
            {
                echo "";
            }

        ?>
        <div class='resolucion'>
        </div>
    </body>
</html>
