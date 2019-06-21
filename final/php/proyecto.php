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
         <?php
                include 'conexion.php';
                $conexion=conectar();
                $sqlMostrar="select * from Proyecto ";
                $result=mysqli_query($conexion,$sqlMostrar) or die("No se realizo la consulta");
                
            ?>

        <div class="box-header with-border">
            <button class="btn btn-info" data-toggle="modal" data-target="#modalAgregarFacu"> 
              Agregar Proyectos
            </button>
        </div>

        <div class="box-body">
            <caption>Proyectos</caption>
                <?php
                      include 'conexion.php';
                      $conexion=conectar();
                      $sqlMostrar="select * from Proyecto where codigoPro = $id ";
                      $result=mysqli_query($conexion,$sqlMostrar) or die("No se realizo la consulta");


                  while ($row=$result->fetch_array()){
                    $variables=$row['cedulaI']."||".$row['nombre']."||".$row['apellido']."||".$row['correo']."||".$row['telefono']."||".$row['cargaHoraria'];
                    printf("<p>Nombre del Progama</p>%s"
                            ."<p>Nombre del Progama</p>%s"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%d&nbsp;</td>"
                            ."<td><div class=\"btn-group\">
                              <button class=\"btn-warning\" onclick=\"agregaform('$variables')\" data-toggle=\"modal\" data-target=\"#modalEditar\"> <i class=\"fa fa-pencil\"></i></button>
                             <button class=\"btn-danger\" onclick=\"preguntar('$row[0]')\"><i class=\"fa fa-times\"></i></button>
                              </div></td></tr>", $row['nombrePrograma'],$row['nombre'],$row['apellido'],$row['correo'],$row['telefono'],$row['cargaHoraria']);
                    }
                  ?>
          
        </div> 
      </div>
    </section>
    <!-- /.content -->
  </div>

  <script>
      function capturarid(id){
          alert(id)
      }
</script>

<!-- Modal -->
<div class="modal fade" id="modalAgregarFacu"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
     <form  role="form" method="POST" enctype="multipart/form-data" action="ingresarProy">
       <div class="modal-header" style="background: #39CCCC; color:white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" style="text-align: center;">PROYECTO</h5>
        </div>





      <div class="modal-body">
        <div class="box-body">
         
   <!------------------- CODIGO PROYECTO----------------------------------------->
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                    <input type="text" class="form-control input-lg" name="codigoPro" placeholder="Código del Proyecto" required>
             </div>
             <br>


            <!------------------- CEDULA DE COORDINADOR ----------------------------------------->
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                    <input type="text" class="form-control input-lg" name="cedulaC" placeholder="Cédula Coordinador" required>
             </div>
             <br>

        <!-------------------------------- NOMBRE PROGRAMA --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="nombrePrograma" placeholder="Nombre del Programa" required>
                </div>
              </div>

              <!-------------------------------- NOMBRE DEL PROYECTO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="nombreProyecto" placeholder="Nombre del Proyecto" required>
                </div>
              </div>

              <!-----------------------------------DURACION-------------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-at"></i></div>
                            <input type="text" class="form-control input-lg" name="duracion" placeholder="Duración" required>
                      </div>
                    </div>
<!-----------------------------------TIPO-------------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-at"></i></div>
                            <input type="text" class="form-control input-lg" name="tipo" placeholder="Tipo" required>
                      </div>
                    </div>
              <!--------------------------------INICIO--------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                            <input type="text" class="form-control input-lg" name="fechaInicio" placeholder="Fecha Inicio" required >
                      </div>
                    </div>
    
                <!---------------------------------- FINAL PLANIFICADA ------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="finalPlanificado" placeholder="Final Planificado" required>
                      </div>
                    </div>
                <!---------------------------------- FINAL REAL ------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="finalReal " placeholder="Final Real" required>
                      </div>
                    </div>
                <!---------------------------------- LOCALIZACION------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="localizacion" placeholder="Localización" required>
                      </div>
                    </div>
  

                <!---------------------------------- OBJETIVO GENERAL------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="objetivoGeneral" placeholder="Objetivo General" required>
                      </div>
                    </div>
                <!--------------------------------BENEFICIARIOS D------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="beneficiariosD" placeholder="Beneficiarios D" required>
                      </div>
                    </div>
                <!------------------------------BENEFICIARIOS I------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="beneficiariosI" placeholder="Beneficiarios I" required>
                      </div>
                    </div>

                <!---------------------------ESTADO------------------------------------>
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="estado" placeholder="Estado" required>
                      </div>
                    </div>

              <!----------------------------------------- CARGO ----------------------------------------
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-users"></i></div>
                      <select name="cargo" class="form-control input-lg">
                        <option value="">Coordinador de Facultad</option>
                        <option value="">Coordinador de Carrera</option>
                        <option value="">Docente</option>
                        <option value="">Estudiante</option>
                      </select>
                </div>
              </div>


             <div class="form-group">
                <div class="panle">Subir foto   </div>
                <input type="file" id="foto" name="nuevafoto">
                <p class="help-block"> Peso máximo 200 MB</p>
                <img src="vistas/img/usuarios/perfil.png" alt="">
             </div>-->
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
     <form  role="form" method="POST" enctype="multipart/form-data" action="actualizar">
       <div class="modal-header" style="background: #39CCCC; color:white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" style="text-align: center;">PROYECTO</h5>
        </div>

      <div class="modal-body">
        <div class="box-body">
          <!---------------------------------CODIGO PROYECTO----------------------------------------->
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                    <input type="text" class="form-control input-lg" name="codigoPro" id="codigoProu" required>
             </div>
             <br>


          <!-------------------------------------CEDULA DE COORDINADOR ----------------------------------------->
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                    <input type="text" class="form-control input-lg" name="cedulaC" id="cedulaCu" required>
             </div>
             <br>

        <!-------------------------------- NOMBRE PROGRAMA --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="nombrePrograma" id="nombreProgramau" required>
                </div>
              </div>

              <!-------------------------------- NOMBRE DEL PROYECTO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="nombreProyecto"  required>
                </div>
              </div>

              <!-----------------------------------DURACION-------------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-at"></i></div>
                            <input type="text" class="form-control input-lg" name="duracion" id="duracionu" required>
                      </div>
                    </div>

                <!----------------------------TIPO--------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                            <input type="text" class="form-control input-lg" name="tipo" id="tipou" required >
                      </div>
                    </div>
    
              <!--------------------------------FECHA INICIO--------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                            <input type="text" class="form-control input-lg" name="fechaInicio" id="fechaIniciou" required >
                      </div>
                    </div>
    
                <!---------------------------------- FINAL PLANIFICADA ------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="finalPlanificado" id="finalPlanificadou" required>
                      </div>
                    </div>
                <!---------------------------------- FINAL REAL ------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="finalReal" id="finalRealu" required>
                      </div>
                    </div>
                <!---------------------------------- LOCALIZACION------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="localizacion" id="localizacionu"required>
                      </div>
                    </div>
  

                <!--------------OBJETIVO GENERAL----------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="objetivoGeneral" id="objetivoGeneralu" required>
                      </div>
                    </div>
                <!-----------------------BENEFICIARIOS D------------------------>
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="beneficiariosD" id="beneficiariosDu" required>
                      </div>
                    </div>
                <!------------------------BENEFICIARIOS I----------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="beneficiariosI" id="beneficiariosIu"  required>
                      </div>
                    </div>

                <!-------------------------ESTADO----------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="estado" id="estadou" required>
                      </div>
                    </div>

               
              <!----------------------------------------- CARGO ----------------------------------------
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-users"></i></div>
                      <select name="cargo" class="form-control input-lg">
                        <option value="">Coordinador de Facultad</option>
                        <option value="">Coordinador de Carrera</option>
                        <option value="">Docente</option>
                        <option value="">Estudiante</option>
                      </select>
                </div>
              </div>


             <div class="form-group">
                <div class="panle">Subir foto   </div>
                <input type="file" id="foto" name="nuevafoto">
                <p class="help-block"> Peso máximo 200 MB</p>
                <img src="vistas/img/usuarios/perfil.png" alt="">
             </div>-->
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
