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
                $sqlMostrar="select * from estudiante ";
                $result=mysqli_query($conexion,$sqlMostrar) or die("No se realizo la consulta");
                
            ?>

        <div class="box-header with-border">
            <button class="btn btn-info" data-toggle="modal" data-target="#modalAgregarFacu"> 
              Agregar Proyectos
            </button>
        </div>

        <div class="box-body">
            <caption>Proyectos</caption>
                <p>Código</p>
                <p>Cédula Coordinador</p>
                <p>Nombre del Programa</p>
                <p>Nombre del Proyecto</p>
                <p>Duración</p>
                <p>Fecha de inicio</p>
                <p>Final planificado</p>
                <p>Final Real</p>
                <p>Localización</p>
                <p>Area del conocimiento</p>
                <p>Subarea del conocimiento</p>
                <p>Subarea específica</p>
                <p>Objetivo General</p>
                <p>Objetivo Específica</p>
                <p>Acciones</p>
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

              <!-------------------------------------FINAL INICIO--------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                            <input type="text" class="form-control input-lg" name="fechainicio" placeholder="Fecha Inicio" required >
                      </div>
                    </div>
    
                <!---------------------------------- FINAL PLANIFICADA ------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="finalPlanificada" placeholder="Final Planificada" required>
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
  

                <!---------------------------------- AREA DE CONOCIMIENTO ------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="areaDelConocimiento" placeholder="Area Del Conocimiento" required>
                      </div>
                    </div>
                <!----------------------------------SUBAREA DE CONOCIMIENTO ------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="subAreaConocimiernto" placeholder="SubArea Del Conocimiento" required>
                      </div>
                    </div>
                <!---------------------------------- OBJETIVO GENERAL------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="objetivoGeneral" placeholder="Objetivo General" required>
                      </div>
                    </div>

                <!---------------------------------- OBJETIVO ESPECIFICO------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="objetivoEspecifico" placeholder="Objetivo Específico" required>
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
          <!-------------------------------------CEDULA DE COORDINADOR ----------------------------------------->
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                    <input type="text" class="form-control input-lg" name="cedulaC"  required>
             </div>
             <br>

        <!-------------------------------- NOMBRE PROGRAMA --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="nombrePrograma"  required>
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
                            <input type="text" class="form-control input-lg" name="duracion" required>
                      </div>
                    </div>

              <!-------------------------------------FINAL INICIO--------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                            <input type="text" class="form-control input-lg" name="fechainicio"  required >
                      </div>
                    </div>
    
                <!---------------------------------- FINAL PLANIFICADA ------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="finalPlanificada" required>
                      </div>
                    </div>
                <!---------------------------------- FINAL REAL ------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="finalReal " required>
                      </div>
                    </div>
                <!---------------------------------- LOCALIZACION------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="localizacion"required>
                      </div>
                    </div>
  

                <!---------------------------------- AREA DE CONOCIMIENTO ------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="areaDelConocimiento" required>
                      </div>
                    </div>
                <!----------------------------------SUBAREA DE CONOCIMIENTO ------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="subAreaConocimiernto" required>
                      </div>
                    </div>
                <!---------------------------------- OBJETIVO GENERAL------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="objetivoGeneral"  required>
                      </div>
                    </div>

                <!---------------------------------- OBJETIVO ESPECIFICO------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="objetivoEspecifico"  required>
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
