
<?php
  session_start();

  if(isset($_SESSION["inicio"])){
    $id=$_SESSION['idp'];
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        EMPRESA
        <small>TABLERO DE EMPRESA</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> INICIO</a></li>
        <li><a href="#">EMPRESA</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

          <div class="box-header with-border">
              <button class="btn btn-info" data-toggle="modal" data-target="#modalAgregarFacu">
                Agregar Empresa
              </button>
          </div>

          <div class="box-body">
           <table class="table table-bordered table-striped dt-responsive tablas">
              <caption>EMPRESA</caption>
              <thead class="thead-dark">
                <tr>
                  <th scope="col">&nbsp;Código Empresa&nbsp;</th>
                  <th scope="col">&nbsp;Nombre Empresa&nbsp;</th>
                  <th scope="col">&nbsp;Siglas&nbsp;</th>
                  <th scope="col">&nbsp;Ciudad&nbsp;</th>
                  <th scope="col">&nbsp;Pagina Wen&nbsp;</th>
                  <th scope="col">&nbsp;Teléfono&nbsp;</th>
                  <th scope="col">&nbsp;Descripcion&nbsp;</th>
                  <th scope="col">&nbsp;Acciones&nbsp;</th>
                </tr>
              </thead>

              <tbody>
                  <?php
                      include 'conexion.php';
                      $conexion=conectar();
                      $sqlMostrar="select * from Empresa";
                      $result=mysqli_query($conexion,$sqlMostrar) or die("No se realizo la consulta");


                  while ($row=$result->fetch_array()){
                    $variables=$row['codigoE']."||".$row['nombre']."||".$row['siglas']."||".$row['ciudad']."||".$row['PaginaWeb']."||".$row['telefono']."||".$row['descripcion'];
                  printf("<tr><td>&nbsp;%d</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%d&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td><div class=\"btn-group\">
                              <button class=\"btn-warning\" onclick=\"editarE('$variables')\" data-toggle=\"modal\" data-target=\"#modalEditar\"> <i class=\"fa fa-pencil\"></i></button>
                             <button class=\"btn-danger\" onclick=\"preguntarE('$row[0]')\"><i class=\"fa fa-times\"></i></button>
                              </div></td></tr>", $row['codigoE'],$row['nombre'],$row['siglas'],$row['ciudad'],$row['PaginaWeb'],$row['telefono'],$row['descripcion']);
                    }
                  ?>
              </tbody>
            </table>
          </div>
      </div>
   </section>
</div>



<!-- AGREGAR -->
<div class="modal fade" id="modalAgregarFacu"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
     <form  role="form" method="POST" enctype="multipart/form-data" action="ingresarEmpre.php">
       <div class="modal-header" style="background: #39CCCC; color:white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" style="text-align: center;">AGREGAR EMPRESA</h5>
        </div>


      <div class="modal-body">
        <div class="box-body">
            <!------------------- CODIGO----------------------------------------->
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                    <input type="int" class="form-control input-lg" name="codigoE" id="codigo"placeholder="Código Empresa" required>
             </div>
             <br>
        <!-------------------------------- NOMBRE DE USUARIO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="nombre" id="nombre"placeholder="Nombre de la Empresa" required>
                </div>
              </div>

              <!-------------------------------- APELLIDO DEL USUARIO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="siglas" id="siglas" placeholder="Siglas" required>
                </div>
              </div>

              <!------------------------------------CORREO--------------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-at"></i></div>
                            <input type="text" class="form-control input-lg" name="ciudad" id="ciudad" placeholder="Ciudad">
                      </div>
                    </div>

              <!------------------------------------- TELEFONO --------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                            <input type="text" class="form-control input-lg" name="PaginaWeb" id="PaginaWeb"placeholder="Página Web" >
                      </div>
                    </div>

                <!---------------------------------- CARGA HORARIO ------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="int" class="form-control input-lg" name="telefono" id="telefono" placeholder="Teléfono" required>
                      </div>
                    </div>

                    <!---------------------------------- CARGA HORARIO ------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="descripcion" id="descripcion" placeholder="Descripción" required>
                      </div>
                    </div>
         </div>
       </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Agregar Empresa</button>
      </div>
    </form>
  </div>
 </div>
</div>




<!-- EDITAR -->

<div class="modal fade" id="modalEditar"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
     <form  role="form" method="POST" enctype="multipart/form-data" action="actualizarEmpre.php"  onsubmit="return validar()">
       <div class="modal-header" style="background: #39CCCC; color:white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" style="text-align: center;">AGREGAR COORDINADOR DE FACULTAD</h5>
        </div>

      <div class="modal-body">
        <div class="box-body">

          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                    <input type="hidden" class="form-control input-lg" name="codigoE" id="codigou" >
             </div>
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
                      <input type="text" class="form-control input-lg" name="siglas" id="siglasu"  required>
                </div>
              </div>

              <!------------------------------------CORREO--------------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-at"></i></div>
                            <input type="text" class="form-control input-lg" name="ciudad" id="ciudadu" >
                      </div>
                    </div>

              <!------------------------------------- TELEFONO --------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                            <input type="text" class="form-control input-lg" name="PaginaWeb" id="paginawebu" >
                      </div>
                    </div>

              <!------------------------------------- TELEFONO --------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="int" class="form-control input-lg" name="telefono" id="telefonou"  required>
                      </div>
                    </div>
                <!---------------------------------- CARGA HORARIO ------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                            <input type="text" class="form-control input-lg" name="descripcion" id="descripcionu"  required>
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
