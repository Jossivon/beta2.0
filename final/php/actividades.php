<script type="text/javascript" src="../js/validaractividad.js"></script>
<?php
  session_start();

  if(isset($_SESSION["inicio"])){

    $id=$_SESSION['idp'];
?>


<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ACTIVIDAD
        <small>TABLERO DE ACTIVIDADES</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> INICIO</a></li>
        <li><a href="#">ACTIVIDAD</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
            <?php
                include 'conexion.php';
                $conexion=conectar();
                $sqlMostrar="select A.codigoA, A.codigoC, A.nombreA, A.fechaInicio, A.fechaFin, A.estado, A.descripcion
                              from Proyecto P
                              INNER JOIN Componente C
                              On P.codigoPro = C.codigoPro
                              INNER JOIN Actividad A
                              On A.CodigoC = C.CodigoC
                              where P.codigoPro = $id";
                $result=mysqli_query($conexion,$sqlMostrar) or die("No se realizo la consulta");

            ?>
          <div class="box-header with-border">
              <button class="btn btn-info" data-toggle="modal" data-target="#modalAgregarFacu">
                Agregar Actividad
              </button>
          </div>

          <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tablas ">
              <caption>ACTIVIDAD</caption>
              <thead class="thead-dark">
                <tr>
                  <th scope="col">&nbsp;Nombre Actividad&nbsp;</th>
                  <th scope="col">&nbsp;Descripción&nbsp;</th>
                  <th scope="col">&nbsp;Fecha Inicio&nbsp;</th>
                  <th scope="col">&nbsp;Fecha Fin&nbsp;</th>
                  <th scope="col">&nbsp;Estado&nbsp;</th>
                  <th scope="col">&nbsp;Acciones&nbsp;</th>
                </tr>
              </thead>

              <tbody>
                  <?php

                  while ($row=$result->fetch_array()){
                    $variables=$row['codigoA']."||".$row['codigoC']."||".$row['descripcion']."||".$row['nombreA']."||".$row['fechaInicio']."||".$row['fechaFin']."||".$row['estado'];
                    printf("<tr>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td><div class=\"btn-group\">
                              <button class=\"btn-warning\" onclick=\"editarA('$variables')\" data-toggle=\"modal\" data-target=\"#modalEditar\"> <i class=\"fa fa-pencil\" ></i></button>
                             <button class=\"btn-danger\" onclick=\"preguntarA('$row[0]')\"><i class=\"fa fa-times\"></i></button>
                              </div></td></tr>"
                            ,$row['nombreA'],$row['descripcion'],$row['fechaInicio'],$row['fechaFin'],$row['estado']);
                    }
                  ?>
              </tbody>
            </table>
          </div>
      </div>
   </section>
</div>

<script>
      function capturarid(id){
          alert(id)
      }
</script>

<div class="modal fade" id="modalAgregarFacu"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
     <form  role="form" method="POST" enctype="multipart/form-data" action="ingresarActivi.php" onsubmit="return validaractividad()">
       <div class="modal-header" style="background: #39CCCC; color:white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" style="text-align: center;">AGREGAR ACTIVIDADES</h5>
        </div>

      <div class="modal-body">
        <div class="box-body">
            <!------------------- CODIGO A----------------------------------------->
             <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                        <input type="text" class="form-control input-lg" name="codigo" id="codigo" placeholder="Codigo" required>
                 </div>
              </div>

              <!--------------- CODIGO C----------------------------------------->

              <!-------------------------------- CODIGO COMPONENTE --------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user"></i></div>
                          <?php
                          $conexion=conectar();
                          $sqlMostrar="select * from Componente";
                          $result=mysqli_query($conexion,$sqlMostrar) or die("No se realizo la consulta");
                          ?>
                          <select name="codigoC" id="codigo" class="form-control input-lg">
                            <?php
                            while ($row=$result->fetch_assoc()){
                                printf("<option value=\"%d\">%s</option>",$row['codigoC'],$row['nombre']);
                            }
                            ?>
                          </select>
                            <!--<input type="text" class="form-control input-lg" name="codigoE" id="codigoE" placeholder="codigo de la Empresa" required>-->
                      </div>
                    </div>


          <!--    <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="codigoc" id="codigoc" placeholder="Nombre de la actividad" required>
                </div>
              </div>
            -->

        <!-------------------------------- NOMBRE DE USUARIO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="nombre" id="nombre" placeholder="Nombre de la actividad" required>
                </div>
              </div>

              <!--------------------------DESCRIPCION--------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="descripcion" id="descripcion"  placeholder="Descripcion de la actividad" required>
                </div>
              </div>

              <!-------------------FECHA INICIO-------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-at"></i></div>
                      <input type="date" class="form-control input-lg" name="fecha" id="fecha" placeholder="Fecha Inicio" min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                </div>
              </div>

              <!-----------------FECHA FINAL--------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                      <input type="date" class="form-control input-lg" name="fechaf" id="fechaf" placeholder="Fecha Final" min=<?php $fecha = date('Y-m-j');$nuevafecha = strtotime ('+1 day' ,strtotime ($fecha)); $nuevafecha = date ('Y-m-j', $nuevafecha);echo $nuevafecha; ?> >
                </div>
              </div>

              <!-------------------------------ESTADO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-angle-double-down"></i></div>
                    <select name="estado" id="estado" class="form-control input-lg">
                      <option value="Inicializado">Inicializado</option>
                      <option value="En Ejecucion">En ejecucion</option>
                      <option value="Finalizado">Finalizado</option>
                    </select>

                </div>
              </div>


                <!-------------------ESTADO------------------------------------->
              <!-- <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-bussines-time"></i></div>
                      <input type="text" class="form-control input-lg" name="estado" id="estado" placeholder="Estado">
                </div>
              </div> -->

              <!-------------------ARCHIVO------------------------------------->
              <div class="form-group">
                <div class="panle">Subir archivo</div>
                <input type="file" id="archivo" name="nuevoarchivo">
                <p class="help-block"> Peso máximo 200 MB</p>
             </div>
         </div>
       </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Agregar usuario</button>
      </div>
    </form>
  </div>
 </div>
</div>


<!-- EDITAR -->

<div class="modal fade" id="modalEditar"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
     <form  role="form" method="POST" enctype="multipart/form-data" action="actualizarActivi.php" onsubmit="return validaractividad()">
       <div class="modal-header" style="background: #39CCCC; color:white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" style="text-align: center;">AGREGAR COORDINADOR DE FACULTAD</h5>
        </div>

      <div class="modal-body">
        <div class="box-body">
            <!------------------- ----------------------------------------->
             <div class="form-group">
                  <div class="input-group">
                        <input type="hidden" class="form-control input-lg" name="codigo" id="codigou">
                 </div>
              </div>

        <!-------------------------------- NOMBRE DE USUARIO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="nombre" id="nombreu">
                </div>
              </div>

              <!--------------------------DESCRIPCION--------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="descripcion" id="descripcionu">
                </div>
              </div>

              <!-------------------FECHA INICIO-------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-at"></i></div>
                      <input type="date" class="form-control input-lg" name="fechai" id="fechaiu" min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                </div>
              </div>

              <!-----------------FECHA FINAL--------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                      <input type="date" class="form-control input-lg" name="fechaf" id="fechafu" min=<?php $fecha = date('Y-m-j');$nuevafecha = strtotime ('+1 day' ,strtotime ($fecha)); $nuevafecha = date ('Y-m-j', $nuevafecha);echo $nuevafecha; ?>>
                </div>
              </div>


                <!-------------------------------ESTADO --------------------------------->
                <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-angle-double-down"></i></div>
                      <select name="estado" id="estadou" class="form-control input-lg">
                        <option value="Inicializado">Inicializado</option>
                        <option value="En Ejecucion">En Ejecucion</option>
                        <option value="Finalizado">Finalizado</option>
                      </select>

                  </div>
                </div>
          <!--    <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-bussines-time"></i></div>
                      <input type="text" class="form-control input-lg" name="estado" id="estadou">
                </div>
              </div>
         </div>
       </div>
      -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Agregar usuario</button>
      </div>
    </form>
  </div>
 </div>
</div>


<?php
  }else {include("../iniciarsesion.php");}

?>
