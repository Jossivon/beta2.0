<script type="text/javascript" src="../js/validarproyecto.js"></script>
<?php
  session_start();

  if(isset($_SESSION["inicio"])){

    $id=$_SESSION['idp'];
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PROYECTOS
        <small>TABLERO DE PROYECTOS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> INICIO</a></li>
        <li><a href="#">PROYECTOS</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
            <button class="btn btn-info" data-toggle="modal" data-target="#modalAgregarFacu">
              Agregar Proyectos
            </button>
        </div>

        <div class="box-body">
            <tbody>
                <?php
                      include 'conexion.php';
                      $conexion=conectar();
                      $sqlMostrar="select * from Proyecto where codigoPro = $id ";
                      $result=mysqli_query($conexion,$sqlMostrar) or die("No se realizo la consulta");


                  while ($row=$result->fetch_array()){
                    $variables=$row['codigoPro']."||".$row['cedulaC']."||".$row['nombrePrograma']."||".$row['nombreProyecto']."||".$row['duracion']."||".$row['tipo']."||".$row['fechaInicio']."||".$row['finalPlanificado']."||".$row['finalReal']."||".$row['localizacion']."||".$row['objetivoGeneral']."||".$row['beneficiariosD']."||".$row['beneficiariosI']."||".$row['estado'];
                    printf("<p>Cedula Coordinador: %s</p>"
                            ."<p>Nombre del Progama: %s</p>"
                            ."<p>Nombre del Proyecto: %s</p>"
                            ."<p>Duracion: %d</p>"
                            ."<p>Tipo: %s</p>"
                            ."<p>Fecha de Inicio: %s </p>"
                            ."<p>Fecha Final de Planificación: %s</p>"
                            ."<p>Fecha Final Real: %s </p>"
                            ."<p>Localizacion: %s</p>"
                            ."<p>Objetivo General: %s</p>"
                            ."<p>Beneficiarios Directos: %s</p>"
                            ."<p>Beneficiarios Indirectos: %s</p>"
                            ."<p>Estado: %s </p>"

                            ."<td><div class=\"btn-group\">
                              <button class=\"btn-warning\" onclick=\"editarp('$variables')\" data-toggle=\"modal\" data-target=\"#modalEditar\"> <i class=\"fa fa-pencil\"></i></button>
                             <button class=\"btn-danger\" onclick=\"preguntarP('$row[0]')\"><i class=\"fa fa-times\"></i></button>
                              </div>
                              </td></tr>",$row['cedulaC'],$row['nombrePrograma'],$row['nombreProyecto'],$row['duracion'],$row['tipo'],$row['fechaInicio'],$row['finalPlanificado'],$row['finalReal'],$row['localizacion'],$row['objetivoGeneral'],$row['beneficiariosD'],$row['beneficiariosI'],$row['estado']);

                    }
                  ?>
            </tbody>
        </div>
      </div>
    </section>
 </div>


<!-- Modal -->
<div class="modal fade" id="modalAgregarFacu"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
     <form  role="form" method="POST" enctype="multipart/form-data" action="ingresarProy.php" onsubmit="return validarproyecto()">
       <div class="modal-header" style="background: #39CCCC; color:white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" style="text-align: center;">PROYECTO</h5>
       </div>

      <div class="modal-body">
        <div class="box-body">
          <!----------------- CODIGO PROYECTO------------------------------------>
              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                        <input type="text" class="form-control input-lg" name="codigoPro" id="codigoPro" placeholder="Código del Proyecto" required>
                  </div>
              </div>

                    <!-------------------------------- CEDULA COORDINADOR GENERAL --------------------------------->
                          <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <?php
                                $conexion=conectar();
                                $sqlMostrar="select * from CoordinadorGeneral";
                                $result=mysqli_query($conexion,$sqlMostrar) or die("No se realizo la consulta");
                                ?>
                                <select name="cedulaC" id="cedula" class="form-control input-lg">
                                  <?php
                                  while ($row=$result->fetch_assoc()){
                                      printf("<option value=\"%d\">%s&nbsp;%s</option>",$row['cedulaC'],$row['nombre'],$row['apellido']);
                                  }
                                  ?>
                                </select>
                                  <!--<input type="text" class="form-control input-lg" name="codigoE" id="codigoE" placeholder="codigo de la Empresa" required>-->
                            </div>
                          </div>



           <!------------------- CEDULA DE COORDINADOR ----------------------------------------->
           <!--
              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                        <input type="text" class="form-control input-lg" name="cedulaC" id="cedulaC" placeholder="Cédula Coordinador" required>
                  </div>
              </div>
    -->

        <!-------------------------------- NOMBRE PROGRAMA --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="nombrePrograma" id="nombrePrograma" placeholder="Nombre del Programa" required>
                </div>
              </div>

              <!-------------------------------- NOMBRE DEL PROYECTO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="nombreProyecto" id="nombreProyecto" placeholder="Nombre del Proyecto" required>
                </div>
              </div>

              <!-----------------------------------DURACION-------------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-at"></i></div>
                      <input type="text" class="form-control input-lg" name="duracion" id="duracion" placeholder="Duración" required>
                </div>
              </div>
<!-----------------------------------TIPO-------------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-at"></i></div>
                      <input type="text" class="form-control input-lg" name="tipo" id="tipo" placeholder="Tipo" required>
                </div>
              </div>
              <!--------------------------------INICIO--------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                      <input type="date" class="form-control input-lg" name="fechaInicio" id="fechaInicio" placeholder="Fecha Inicio" min=<?php $hoy=date("Y-m-d"); echo $hoy;?> required >
                </div>
              </div>

                <!---------------------------------- FINAL PLANIFICADA ------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                      <input type="date" class="form-control input-lg" name="finalPlanificado" id="finalPlanificado" placeholder="Final Planificado" min=<?php $fecha = date('Y-m-j');$nuevafecha = strtotime ('+1 day' ,strtotime ($fecha)); $nuevafecha = date ('Y-m-j', $nuevafecha);echo $nuevafecha; ?> required >
                </div>
              </div>
                <!------------------- FINAL REAL ------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                      <input type="date" class="form-control input-lg" name="finalReal " id="finalReal" placeholder="Final Real" min=<?php $fecha = date('Y-m-j');$nuevafecha = strtotime ('+1 day' ,strtotime ($fecha)); $nuevafecha = date ('Y-m-j', $nuevafecha);echo $nuevafecha; ?> required>
                </div>
              </div>
                <!--------------------- LOCALIZACION------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                      <input type="text" class="form-control input-lg" name="localizacion" id="localizacion" placeholder="Localización" required>
                </div>
              </div>


                <!-------------- OBJETIVO GENERAL------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                      <input type="text" class="form-control input-lg" name="objetivoGeneral" id="objetivoGeneral" placeholder="Objetivo General" required>
                </div>
              </div>
                <!----------------------BENEFICIARIOS D--------------------------------->

              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                      <input type="text" class="form-control input-lg" name="beneficiariosD" id="beneficiariosD" placeholder="Beneficiarios D" required>
                </div>
              </div>
                <!------------------------------BENEFICIARIOS I------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                      <input type="text" class="form-control input-lg" name="beneficiariosI" id="beneficiariosI" placeholder="Beneficiarios I" required>
                </div>
              </div>

              <!--ESTADO------------------------------------------>
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-users"></i></div>
                      <select name="estado" id="estado" class="form-control input-lg">
                        <option value="">Inicializado</option>
                        <option value="">En Ejecucion</option>
                        <option value="">Finalizado</option>
                      </select>
                </div>
              </div>

         </div>
       </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Agregar Proyecto</button>
      </div>
    </form>
  </div>
 </div>
</div>




<!-- EDITAR -->
<div class="modal fade" id="modalEditar"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
     <form  role="form" method="POST" enctype="multipart/form-data" action="actualizarProy.php"  onsubmit="return validar()">
       <div class="modal-header" style="background: #39CCCC; color:white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" style="text-align: center;">AGREGAR COORDINADOR DE FACULTAD</h5>
        </div>

      <div class="modal-body">
        <div class="box-body">

         <!--------CODIGO DEL PROYECTO--------------------------------->
             <div class="form-group">
                <div class="input-group">
                      <input type="hidden" class="form-control input-lg" name="codigop" id="codigop" required>
                </div>
              </div>

        <!-------------- NOMBRE DE USUARIO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                   <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="nombre" id="nombreu" required>
                </div>
              </div>

              <!-------------------------------- APELLIDO DEL USUARIO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="apellido" id="apellidou"  required>
                </div>
              </div>

              <!------------------------------------CORREO--------------------------------------------->
              <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-at"></i></div>
                            <input type="email" class="form-control input-lg" name="correo" id="correou" >
                      </div>
              </div>

              <!------------------------------------- TELEFONO --------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                      <input type="text" class="form-control input-lg" name="telefono" id="telefonou" >
                </div>
              </div>

                <!---------------------------------- CARGA HORARIO ------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                      <input type="text" class="form-control input-lg" name="carga" id="cargau" >
                </div>
              </div>


          </div>
         </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar datos</button>
      </div>

    </form>
  </div>
 </div>
</div>

<?php
  }else {include("../iniciarsesion.php");}

?>
