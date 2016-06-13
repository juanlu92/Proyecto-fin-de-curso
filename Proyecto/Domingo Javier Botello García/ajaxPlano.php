<?php
include('conexion.php');
include('habitacion.php');
session_start();
/*Solo si recibe un valor*/
if (isset($_GET['q'])) {
  $q = intval($_GET['q']);
  /*SI EL VALOR NO ES 0 REALIZA LA BÚSQUEDA*/
  if ($q!=0){
      conexion::conectar();
      /*Generador de planos y Modales*/
      $consulta=mysql_query("SELECT * FROM Habitaciones WHERE idCasa='$q'");
      $i=0;
      $habitacion=array();
      while ($consultaDatos=mysql_fetch_row($consulta)){
        $habitacion[$i]= new habitacion($consultaDatos[0],$consultaDatos[1],$consultaDatos[2],array(),array());
        //print_r($habitacion);
        echo ("<div class='col-md-6 celdaCasa'><figure class='figure casas'><figcaption id='$i' class='figure-caption'><span class='datoCasa'>$consultaDatos[1]</span></figcaption><button class='btn btn-primary btn-md botonCambiar' data-toggle='modal' data-target='#".$consultaDatos[1]."Modal'>Editar</button>");
        if($habitacion[$i]->getComponentes()){
            $componentes=$habitacion[$i]->getComponentes();
           echo "<button class='btn btn-primary btn-md botonComponente' data-toggle='modal' data-target='#".$consultaDatos[1]."ModalComponentes'>Componentes</button>";
        }
        else {
          echo "<button class='btn btn-primary btn-md botonComponente' disabled>Componentes</button>";
        }
        echo "</figure></div>";
        echo '<div class="modal fade" id="'.$consultaDatos[1].'Modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close"
                           data-dismiss="modal">
                               <span aria-hidden="true">&times;</span>
                               <span class="sr-only">Cerrar</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            '.$consultaDatos[1].'
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">

                        <form class="form-horizontal" role="form" method="POST" action="ajaxCambiar.php">
                          <div class="form-group">
                                <input type="text" class="form-control"
                                id="inputNombre" name="nombre" placeholder="Nombre"/>
                            <input type="hidden" name="id" value="'.$consultaDatos[0].'"/>
                          </div>
                              <input type="submit" class="btn btn-default" name="Cambiar" value="Cambiar" class="seleccionarFiltro"></input>
                        </form>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">
                                    Cerrar
                        </button>
                    </div>
                    </div>
            </div>
            </div>';
            if($habitacion[$i]->getComponentes()){
            echo '<div class="modal fade" id="'.$consultaDatos[1].'ModalComponentes" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="row">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close"
                               data-dismiss="modal">
                                   <span aria-hidden="true">&times;</span>
                                   <span class="sr-only">Cerrar</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
                                '.$consultaDatos[1].'
                            </h4>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">

                            <form class="form-horizontal"><div class="form-group">
                            ';
                            $TipoComponente=2;
                            $privilegioPertenece=3;
                            $privilegioComponente=4;
                            $estadoComponente=1;
                            $numeroC=$habitacion[$i]->getComponentes();
                            $numeroC=count($numeroC);
                          for ($h=0; $h < $numeroC/5 ; $h++) {
                            echo "<div class='col-sm-8'>
                                      <p>$h - ".$componentes[$TipoComponente]."</p>";
                                      //echo "<h1>".$componentes[$privilegioComponente].", C:".$componentes[$privilegioPertenece]."</h1>";
                                      if ($componentes[$privilegioComponente] >= $componentes[$privilegioPertenece]) {
                                      echo "<button class='".$componentes[$TipoComponente]."' onclick='BotonAjax(this); return false;'>";

                                      if ($componentes[$estadoComponente]==0) {
                                        echo  "<img class='apagado' src='img/off.png'></img></button>
                                        </div>";
                                      }
                                      elseif ($componentes[$estadoComponente]==1) {
                                        echo  "<img class='encendido' src='img/on.png'></img></button>
                                        </div>";
                                      }
                                      else {
                                        echo  "<img class='auto' src='img/auto.png'></img></button>
                                        </div>";
                                      }
                                    }
                                    else{
                                      echo "<p class='bloqueado'>Componente bloqueado</p></div>";
                                    }
                                  /*echo '<div class="col-sm-8">
                                        <input type="button" class="btn-default"
                                        id="'.$componentes[$TipoComponente].'" name="nombre" value="activar"/>
                                    </div>';*/
                                    $TipoComponente=$TipoComponente+5;
                                    $estadoComponente=$estadoComponente+5;
                                    $privilegioComponente=$privilegioComponente+5;
                                    $privilegioPertenece=$privilegioPertenece+5;
                          }
                          echo '</div>
                            </div>
                            </form>

                        <!-- Modal Footer -->
                        <div class="form-group">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">
                                        Cerrar
                            </button>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>';
              }
        $i++;
      }
      conexion::desconectar();
      }
      else {
        /*Si el valor es 0 Busca en todas las casas*/
        conexion::conectar();
        $idSesion=$_SESSION['Usuario'][0];
        $consulta=mysql_query("SELECT Habitaciones.idHabitacion, Habitaciones.nombre, Habitaciones.idCasa FROM Habitaciones INNER JOIN Poseen ON Habitaciones.idCasa=Poseen.idCasa WHERE Poseen.idUsuario='$idSesion' ORDER BY Habitaciones.idCasa") or die("Error en: : " . mysql_error());
        $i=0;
        $habitacion=array();
        while ($consultaDatos=mysql_fetch_row($consulta)){
          $habitacion[$i]= new habitacion($consultaDatos[0],$consultaDatos[1],$consultaDatos[2],array(),array());
          echo ("<div class='col-md-6 celdaCasa'><figure class='figure casas'><figcaption id='$i' class='figure-caption'><span class='datoCasa'>$consultaDatos[1]</span></figcaption><button class='btn btn-primary btn-md botonCambiar' data-toggle='modal' data-target='#".$consultaDatos[1]."Modal'>Editar</button>");
          if($habitacion[$i]->getComponentes()){
              $componentes=$habitacion[$i]->getComponentes();
             echo "<button class='btn btn-primary btn-md botonComponente' data-toggle='modal' data-target='#".$consultaDatos[1]."ModalComponentes'>Componentes</button>";
          }
          else {
            echo "<button class='btn btn-primary btn-md botonComponente' disabled>Componentes</button>";
          }
          echo "</figcaption></figure></div>";
          echo '<div class="modal fade" id="'.$consultaDatos[1].'Modal" tabindex="-1" role="dialog"
               aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                          <button type="button" class="close"
                             data-dismiss="modal">
                                 <span aria-hidden="true">&times;</span>
                                 <span class="sr-only">Cerrar</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">
                              '.$consultaDatos[1].'
                          </h4>
                      </div>

                      <!-- Modal Body -->
                      <div class="modal-body">

                          <form class="form-horizontal" role="form" method="POST" action="ajaxCambiar.php">
                            <div class="form-group">
                                  <input type="text" class="form-control"
                                  id="inputNombre" name="nombre" placeholder="Nombre"/>
                              <input type="hidden" name="id" value="'.$consultaDatos[0].'"/>
                            </div>
                                <input type="submit" class="btn btn-default" name="Cambiar" value="Cambiar" class="seleccionarFiltro"></input>
                          </form>
                      </div>

                      <!-- Modal Footer -->
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default"
                                  data-dismiss="modal">
                                      Cerrar
                          </button>
                      </div>
                  </div>
              </div>
              </div>';
              if($habitacion[$i]->getComponentes()){
              echo '<div class="modal fade" id="'.$consultaDatos[1].'ModalComponentes" tabindex="-1" role="dialog"
                   aria-labelledby="myModalLabel" aria-hidden="true">
                   <div class="row">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <!-- Modal Header -->
                          <div class="modal-header">
                              <button type="button" class="close"
                                 data-dismiss="modal">
                                     <span aria-hidden="true">&times;</span>
                                     <span class="sr-only">Cerrar</span>
                              </button>
                              <h4 class="modal-title" id="myModalLabel">
                                  '.$consultaDatos[1].'
                              </h4>
                          </div>

                          <!-- Modal Body -->
                          <div class="modal-body">

                              <form class="form-horizontal"><div class="form-group">
                              ';
                              $TipoComponente=2;
                              $privilegioPertenece=3;
                              $privilegioComponente=4;
                              $estadoComponente=1;
                              $numeroC=$habitacion[$i]->getComponentes();
                              $numeroC=count($numeroC);
                            for ($h=0; $h < $numeroC/5 ; $h++) {
                              echo "<div class='col-sm-8'>
                                        <p>$h - ".$componentes[$TipoComponente]."</p>";
                                        if ($componentes[$privilegioComponente] >= $componentes[$privilegioPertenece]) {
                                        echo "<button class='".$componentes[$TipoComponente]."' onclick='BotonAjax(this); return false;'>";

                                        if ($componentes[$estadoComponente]==0) {
                                          echo  "<img class='apagado' src='img/off.png'></img></button>
                                          </div>";
                                        }
                                        elseif ($componentes[$estadoComponente]==1) {
                                          echo  "<img class='encendido' src='img/on.png'></img></button>
                                          </div>";
                                        }
                                        else {
                                          echo  "<img class='auto' src='img/auto.png'></img></button>
                                          </div>";
                                        }
                                      }
                                      else{
                                        echo "<p class='bloqueado'>Componente bloqueado</p></div>";
                                      }
                                      $TipoComponente=$TipoComponente+5;
                                      $estadoComponente=$estadoComponente+5;
                                      $privilegioComponente=$privilegioComponente+5;
                                      $privilegioPertenece=$privilegioPertenece+5;
                            }
                            echo '</div>
                              </div>
                              </form>


                          <!-- Modal Footer -->
                          <div class="form-group">
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default"
                                      data-dismiss="modal">
                                          Cerrar
                              </button>
                          </div>
                          </div>
                          </div>
                      </div>
                  </div>
                  </div>
                  </div>';
                }
          $i++;
      }
}
}
else{
  conexion::conectar();
  $consultaUsuario=mysql_query("SELECT idCasa FROM Poseen WHERE idUsuario='2'");
  $consulta=mysql_query("SELECT * FROM Habitaciones WHERE idCasa='$q'");
  conexion::desconectar();
}
 ?>
