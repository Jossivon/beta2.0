<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DOCENTE
        <small>TABLERO DE DOCENTE</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> INICIO</a></li>
        <li><a href="#">DOCENTE</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
            <?php
                include 'conexion.php';
                $conexion=conectar();
                $sqlMostrar="select * from intdoce ";
                $result=mysqli_query($conexion,$sqlMostrar) or die("No se realizo la consulta");
                
            ?>
          <div class="box-header with-border">
              <button class="btn btn-info" data-toggle="modal" data-target="#modalAgregarFacu"> 
                Agregar Integrantes
              </button>
          </div>

          <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tablas ">
              <caption>DOCENTE</caption>
              <thead class="thead-dark">
                <tr>
                  <th scope="col">&nbsp;Cedula&nbsp;</th>
                  <th scope="col">&nbsp;Nombre&nbsp;</th>
                  <th scope="col">&nbsp;Apellido&nbsp;</th>
                  <th scope="col">&nbsp;Correo&nbsp;</th>
                  <th scope="col">&nbsp;Telefono&nbsp;</th>
                  <th scope="col" style="width:8px">&nbsp;Carga Horario&nbsp;</th>
                  <th scope="col">&nbsp;Cargo&nbsp;</th>
                  <th scope="col">&nbsp;Acciones&nbsp;</th>
                </tr>
              </thead>

              <tbody>
                  <?php

                  while ($row=$result->fetch_assoc()){
                    printf("<tr><td scope=\"row\">%s</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%d&nbsp;</td>"
                            ."<td><div class=\"btn-group\">
                              <button class=\"btn-warning\" onclick=\"capturarid(%s)\")> <i class=\"fa fa-pencil\"></i></button>
                              <button class=\"btn-danger\"> <i class=\"fa fa-times\"></i></button>
                              </div></td></tr>"
                            ,$row['cedula'],$row['nombre'],$row['apellido'],$row['correo']
                            ,$row['telefono'],$row['carga'],$row['cedula']); 
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

<!-- Modal -->
<div class="modal fade" id="modalAgregarFacu"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
     <form  role="form" method="POST" enctype="multipart/form-data" action="ingresarCDoc">
       <div class="modal-header" style="background: #39CCCC; color:white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" style="text-align: center;">AGREGAR DOCENTE</h5>
        </div>


      <div class="modal-body">
        <div class="box-body">
            <!------------------- CEDULA DE INDENTIDAD ----------------------------------------->
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                    <input type="text" class="form-control input-lg" name="cedula" placeholder="Cédula" required>
             </div>
             <br>
        <!-------------------------------- NOMBRE DE USUARIO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="nombre" placeholder="Nombre del integrante" required>
                </div>
              </div>

              <!-------------------------------- APELLIDO DEL USUARIO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="apellido" placeholder="Apellido del integrante" required>
                </div>
              </div>

              <!------------------------------------CORREO--------------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-at"></i></div>
                            <input type="email" class="form-control input-lg" name="correo" placeholder="Correo">
                      </div>
                    </div>

              <!------------------------------------- TELEFONO --------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                            <input type="text" class="form-control input-lg" name="telefono" placeholder="Telefono" >
                      </div>
                    </div>

                <!---------------------------------- CARGA HORARIO ------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="carga" placeholder="Carga Horaria" required>
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
          <h5 class="modal-title" style="text-align: center;">AGREGAR DOCENTE</h5>
        </div>

      <div class="modal-body">
        <div class="box-body">
            <!------------------- CEDULA DE INDENTIDAD ----------------------------------------->
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                    <input type="text" class="form-control input-lg" name="cedula" required>
             </div>
             <br>
        <!-------------------------------- NOMBRE DE USUARIO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="nombre" required>
                </div>
              </div>

              <!-------------------------------- APELLIDO DEL USUARIO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="apellido" required>
                </div>
              </div>

              <!------------------------------------CORREO--------------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-at"></i></div>
                            <input type="email" class="form-control input-lg" name="correo">
                      </div>
                    </div>

              <!------------------------------------- TELEFONO --------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                            <input type="text" class="form-control input-lg" name="telefono">
                      </div>
                    </div>

                <!---------------------------------- CARGA HORARIO ------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="carga" required>
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
