<?php
  session_start();

  if(isset($_SESSION["inicio"])){
    $id=$_SESSION['idp'];
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        REPRESENTANTE DE LA EMPRESA
        <small>TABLERO DE REPRESENTANTE DE LA EMPRESA</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> INICIO</a></li>
        <li><a href="#">REPRESENTANTE DE LA EMPRESA</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-info" data-toggle="modal" data-target="#modalAgregarRepEmp">
            Agregar Representante de la Empresa
          </button>
      </div>

      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas ">
          <caption>REPRESENTANTES DE LA EMPRESA</caption>
          <thead class="thead-dark">
            <tr>
              <th scope="col">Cedula</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Correo</th>
              <th scope="col">Telefono</th>
            </tr>
          </thead>

 <tbody>
                  <?php
                      include 'conexion.php';
                      $conexion=conectar();
                      $sqlMostrar="select * from RepresentanteEmpresa where codigoPro = $id and cargo='Representante Empresa'";
                      $result=mysqli_query($conexion,$sqlMostrar) or die("No se realizo la consulta");


                  while ($row=$result->fetch_array()){
                    $variables=$row['cedulaRep']."||".$row['nombreR']."||".$row['apellidoR']."||".$row['correo']."||".$row['telefono']."||".$row['cargo'];
                    printf("<tr><td>&nbsp;%s</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td><div class=\"btn-group\">
                              <button class=\"btn-warning\" onclick=\"agregaform('$variables')\" data-toggle=\"modal\" data-target=\"#modalEditar\"> <i class=\"fa fa-pencil\"></i></button>
                             <button class=\"btn-danger\" onclick=\"preguntar('$row[0]')\"><i class=\"fa fa-times\"></i></button>
                              </div></td></tr>", $row['cedulaRep'],$row['nombreR'],$row['apellidoR'],$row['correo'],$row['telefono'],$row['cargo']);
                    }
                  ?>
              </tbody>

        </table>
      </div>

  </div>
</section>
</div>

<!-- Modal Igresar -->
<div class="modal fade" id="modalAgregarRepEmp"  role="dialog" >
<div class="modal-dialog">
<div class="modal-content">
 <form  role="form method="post" enctype="multipart/form-data" action="ingresarRepreEmpre.php">
   <div class="modal-header" style="background: #39CCCC; color:white">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h5 class="modal-title" style="text-align: center;">AGREGAR REPRESENTANTE DE LA EMPRESA</h5>
    </div>

  <div class="modal-body">
    <div class="box-body">
        <!------------------- CEDULA DE IDENTIDAD ----------------------------------------->
      <div class="form-group">
          <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                <input type="text" class="form-control input-lg" name="cedulaRep" id="cedula" placeholder="Cédula" required>
         </div>
         <br>
    <!-------------------------------- NOMBRE  --------------------------------->
          <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                  <input type="text" class="form-control input-lg" name="nombreR" id="nombre" placeholder="Nombre" required>
            </div>
          </div>

          <!-------------------------------- APELLIDO --------------------------------->
          <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                  <input type="text" class="form-control input-lg" name="apellidoR" id="apellido" placeholder="Apellido" required>
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
                        <input type="text" class="form-control input-lg" name="telefono" id="telefono" placeholder="Teléfono" >
                  </div>
                </div>

          <!----------------------------------------- CARGO ----------------------------------------->
         <div class="form-group">
                <div class="input-group">
                      <input type="hidden" class="form-control input-lg" name="cargo" placeholder="Representante" id="cargo" value="Representante Empresa">
                </div>
              </div>


   </div>
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
    <button type="submit" class="btn btn-primary">Ingresar Representante</button>
  </div>

  </form>
  </div>
 </div>
</div>


<!-- EDITAR -->

<div class="modal fade" id="modalEditar"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
     <form  role="form" method="POST" enctype="multipart/form-data" action="actualizarRepreEmpre.php">
       <div class="modal-header" style="background: #39CCCC; color:white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" style="text-align: center;">ACTUALIZAR DATOS REPRESENTANTE DE LA EMPRESA</h5>
        </div>

      <div class="modal-body">
        <div class="box-body">

             <div class="form-group">
                <div class="input-group">
                      <input type="hidden" class="form-control input-lg" name="cedula" id="cedulau" required>
                </div>
              </div>
                
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
  }
?>
