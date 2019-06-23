<?php 
  session_start(); 

  if(isset($_SESSION["inicio"])){

    $id=$_SESSION['idp'];
?>

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ESTUDIANTE
        <small>TABLERO DE ESTUDIANTE</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> INICIO</a></li>
        <li><a href="#">ESTUDIANTE</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
            
          <div class="box-header with-border">
              <button class="btn btn-info" data-toggle="modal" data-target="#modalAgregarFacu"> 
                Agregar Integrantes
              </button>
          </div>

          <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tablas ">
              <caption>ESTUDIANTE</caption>
              <thead class="thead-dark">
                <tr>
                  <th scope="col">&nbsp;Cédula&nbsp;</th>
                  <th scope="col">&nbsp;Nombre&nbsp;</th>
                  <th scope="col">&nbsp;Apellido&nbsp;</th>
                  <th scope="col">&nbsp;Correo&nbsp;</th>
                  <th scope="col">&nbsp;Telefono&nbsp;</th>
                  <th scope="col" style="width:8px">&nbsp;Carga Horario&nbsp;</th>
                  <th scope="col">&nbsp;Acciones&nbsp;</th>
                </tr>
              </thead>

              <tbody>
                   <?php
                      include 'conexion.php';
                      $conexion=conectar();
                      $sqlMostrar="select * from Integrantes where codigoPro = $id and cargo='Estudiante'";
                      $result=mysqli_query($conexion,$sqlMostrar) or die("No se realizo la consulta");


                  while ($row=$result->fetch_array()){
                    $variables=$row['cedulaI']."||".$row['nombre']."||".$row['apellido']."||".$row['correo']."||".$row['telefono']."||".$row['cargaHoraria'];
                    printf("<tr><td>&nbsp;%s</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%d&nbsp;</td>"
                            ."<td><div class=\"btn-group\">
                              <button class=\"btn-warning\" onclick=\"agregaform('$variables')\" data-toggle=\"modal\" data-target=\"#modalEditar\"> <i class=\"fa fa-pencil\"></i></button>
                             <button class=\"btn-danger\" onclick=\"preguntar('$row[0]')\"><i class=\"fa fa-times\"></i></button>
                              </div></td></tr>", $row['cedulaI'],$row['nombre'],$row['apellido'],$row['correo'],$row['telefono'],$row['cargaHoraria']);
                    }
                  ?>
              </tbody>
            </table>
          </div> 
      </div>
   </section>
</div>



<!-- Modal AGREGAR-->

<div class="modal fade" id="modalAgregarFacu"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
     <form  role="form" method="POST" enctype="multipart/form-data" action="ingresarCFac.php">
       <div class="modal-header" style="background: #39CCCC; color:white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" style="text-align: center;">AGREGAR COORDINADOR DE FACULTAD</h5>
        </div>

      <div class="modal-body">
        <div class="box-body">
            <!------------------- CEDULA DE INDENTIDAD ----------------------------------------->
             <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                        <input type="text" class="form-control input-lg" name="cedulaI" id="cedula" placeholder="Cédula" required>
                 </div>
              </div>

        <!-------------------------------- NOMBRE DE USUARIO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="nombre" id="nombre" placeholder="Nombre del integrante" required>
                </div>
              </div>

              <!-------------------------------- APELLIDO DEL USUARIO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="apellido" id="apellido"  placeholder="Apellido del integrante" required>
                </div>
              </div>

              <!------------------------------------CORREO--------------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-at"></i></div>
                      <input type="email" class="form-control input-lg" name="correo" id="correo" placeholder="Correo">
                </div>
              </div>

              <!------------------------------------- TELEFONO --------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                      <input type="text" class="form-control input-lg" name="telefono" id="telefono" placeholder="Telefono" >
                </div>
              </div>

                <!---------------------------------- CARGA HORARIO ------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-bussines-time"></i></div>
                      <input type="text" class="form-control input-lg" name="cargaHoraria" id="cargaHoraria" placeholder="Carga Horaria" required>
                </div>
              </div>


                      <!------------------------------- CARGO-------------------------------------->
              <div class="form-group">
                <div class="input-group">
                      <input type="hidden" class="form-control input-lg" name="cargo" placeholder="Coordinador" id="cargo" value="Estudiante">
                </div>
              </div>



              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-users"></i></div>
                      <select name="facultad" id="facultad" class="form-control input-lg">
                        <option value="1">Administracion de empresas</option>
                        <option value="2">Ciencias</option>
                        <option value="3">Ciencias Pecuarias</option>
                        <option value="4">Informatica y eletronica</option>
                        <option value="5">Mecanica</option>
                        <option value="6">Recursos Naturales</option>
                        <option value="7">Salud publica</option>
                      </select>
                </div>
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
     <form  role="form" method="POST" enctype="multipart/form-data" action="actualizar.php">
       <div class="modal-header" style="background: #39CCCC; color:white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" style="text-align: center;">AGREGAR ESTUDIANTE</h5>
        </div>

       <div class="modal-body">

        <input type="text" hidden="" id="cedulaI">
        <div class="box-body">
            <!------------------- CEDULA DE INDENTIDAD ----------------------------------------->
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                    <input type="text" class="form-control input-lg" name="cedulaI" id="cedulaIu"  required>
             </div>
             <br>
        <!-------------------------------- NOMBRE DE USUARIO --------------------------------->
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
                            <input type="int" class="form-control input-lg" name="cargaHoraria" id="cargaHorariau"  required>
                      </div>
                    </div>
         </div>
       </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </form>
  </div>
 </div>
</div>



<?php
  }

?>
