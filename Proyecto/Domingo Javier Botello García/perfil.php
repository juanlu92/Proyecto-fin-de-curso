<?php
include ('PlantillaCabecera.php');
 ?>
<!--FORMULARIO PERFIL-->
<div id="caja">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
       <form id='perfil' class="form-horizontal" role="form" action="ajaxPerfil.php" method="post">
         <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['Usuario'][0];?>">
         <label>Nombre :</label><input type='text' class="form-control" name="nombre" value="<?php echo $_SESSION['Usuario'][2];?>" placeholder="<?php echo $_SESSION['Usuario'][2];?>">
         <label>Primer apellido :</label><input type='text' class="form-control" name="primerApellido" value="<?php echo $_SESSION['Usuario'][3];?>" placeholder="<?php echo $_SESSION['Usuario'][3];?>">
         <label>Segundo apellido :</label><input type='text' class="form-control" name="segundoApellido" value="<?php echo $_SESSION['Usuario'][4];?>" placeholder="<?php echo $_SESSION['Usuario'][4];?>">
         <label>Email :</label><input type='email' class="form-control" name="email" value="<?php echo $_SESSION['Usuario'][6];?>" placeholder="<?php echo $_SESSION['Usuario'][6];?>">
         <label>Contraseña :</label><input type='password' class="form-control" name="password">
         <input class="btn btn-default" type="submit" name="Enviar" value="Enviar">
       </form>
     </div>
   </div>
</div>
<?php
/*Sección para AJAX*/
echo "<section id='todo'>";
echo "</section>";
include('PlantillaPiePag.php');
 ?>
