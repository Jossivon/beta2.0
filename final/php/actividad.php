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
                $sqlMostrar="select * from activi ";
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
                  <th scope="col">&nbsp;Código&nbsp;</th>
                  <th scope="col">&nbsp;Nombre Actividad&nbsp;</th>
                  <th scope="col">&nbsp;Fecha Inicio&nbsp;</th>
                  <th scope="col">&nbsp;Fecha Fin&nbsp;</th>

                </tr>
              </thead>

              <tbody>
                  <?php
                   include 'conexion.php';
                      $conexion=conectar();
                      $sqlMostrar="select * from Actividad where codigoPro = $id ";
                      $result=mysqli_query($conexion,$sqlMostrar) or die("No se realizo la consulta");

                  while ($row=$result->fetch_assoc()){
                    printf("<tr><td scope=\"row\">%s</td>"
                            ."<td>&nbsp;%d&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td></tr>"
                            ,$row['codigo'],$row['nombre'],$row['fechainicio'],$row['fechafin'],$row['codigo']);
                    }
                  ?>
              </tbody>
            </table>
          </div>
      </div>
   </section>
</div>



<!-- Modal -->
<div class="modal fade" id="modalAgregarFacu"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
     <form  role="form" method="POST" enctype="multipart/form-data" action="ingresarActivi.php">
       <div class="modal-header" style="background: #39CCCC; color:white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" style="text-align: center;">AGREGAR ACTIVIDAD</h5>
        </div>


      <div class="modal-body">
        <div class="box-body">
            <!----------------- CODIGO----------------------------------------->
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                    <input type="text" class="form-control input-lg" name="codigoA" id="codigo" placeholder="Código" required>
             </div>
             <br>
        <!-------------------------------- NOMBRE DE ACTIVIDAD--------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="nombreA" id="nombre" placeholder="Nombre Actividad" required>
                </div>
              </div>

              <!-------------------------------- FECHA INICIO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="fechaInicio" id="fechaInicio" placeholder="Fecha Inicio" required>
                </div>
              </div>

              <!---------------------------FECHA FIN-------------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-at"></i></div>
                            <input type="text" class="form-control input-lg" name="fechaFin" id="fechaFin" placeholder="Fecha Fin">
                      </div>
                    </div>

               <!----ESTADO------------------------------------------>
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



            <!----------------------------------------- SUBIR ARCHIVO ---------------------------------------->


             <div class="form-group">
                <div class="panle">Subir Archivo  </div>
                <input type="file" id="foto" name="nuevo archivo">
                <p class="help-block"> Peso máximo 200 MB</p>
                <img src="vistas/img/usuarios/perfil.png" alt="">
             </div>
         </div>
       </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Agregar Actividad</button>
      </div>
    </form>
  </div>
 </div>
</div>




<!-- EDITAR -->

<div class="modal fade" id="modalEditar"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
     <form  role="form" method="POST" enctype="multipart/form-data" action="actualizarActivi.php">
       <div class="modal-header" style="background: #39CCCC; color:white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" style="text-align: center;">AGREGAR ACTIVIDAD</h5>
        </div>

      <div class="modal-body">
        <div class="box-body">
            <!------------------- CODIGO ACTIVIDAD--------------------------------------
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                    <input type="text" class="form-control input-lg" name="codigoA" id="codigo" required>
             </div>
             <br>
        --->
              <!-------------------------------- NOMBRE ACTIVIDAD--------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="nombre" id="nombre" required>
                </div>
              </div>

              <!------------------------------------FECHA INICIO----------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-at"></i></div>
                            <input type="text" class="form-control input-lg" name="fechaInicio" id="fechaInicio">
                      </div>
                    </div>

              <!------------------------------------- FECHA FIN --------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                            <input type="text" class="form-control input-lg" name="fechaFin" id="fechaFin">
                      </div>
                    </div>
              <!-----------------------------------ESTADO------------------------------------------>
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

               <div class="form-group">
                <div class="panle">Subir Archivo   </div>
                <input type="file" id="foto" name="nuevo archivo">
                <p class="help-block"> Peso máximo 200 MB</p>
                <img src="vistas/img/usuarios/perfil.png" alt="">
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
