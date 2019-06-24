<script type="text/javascript" src="../js/validar.js"></script>
<?php
  session_start();

  if(isset($_SESSION["inicio"])){

    $id=$_SESSION['idp'];
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        COMPONENTES
        <small>COMPONENTES DEL PROYECTO</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> INICIO</a></li>
        <li><a href="#">COMPONENTES DEL PROYECTO</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">

          <div class="box-header with-border">
              <button class="btn btn-info" data-toggle="modal" data-target="#modalAgregarCompo">
                Agregar COMPONENTES
              </button>
          </div>

          <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tablas ">
              <caption>COMPONENTES DEL PROYECTO</caption>
              <thead class="thead-dark">
                <tr>
                  <th scope="col">&nbsp;Descripción&nbsp;</th>
                  <th scope="col">&nbsp;Nombre &nbsp;</th>
                  <th scope="col">&nbsp;Estado&nbsp;</th>
                  <th scope="col">&nbsp;Acciones&nbsp;</th>


                </tr>
              </thead>
<tbody>
                  <?php
                      include 'conexion.php';
                      $conexion=conectar();
                      $sqlMostrar="select * from Componente where codigoPro = $id ";
                      $result=mysqli_query($conexion,$sqlMostrar) or die("No se realizo la consulta");


                  while ($row=$result->fetch_array()){
                    $variables=$row['codigoC']."||".$row['descripcion']."||".$row['nombre']."||".$row['estado'];
                  printf("<tr>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                            ."<td>&nbsp;%s&nbsp;</td>"
                          ."<td><div class=\"btn-group\">
                              <button class=\"btn-warning\" onclick=\"editarC('$variables')\" data-toggle=\"modal\" data-target=\"#modalEditar\"> <i class=\"fa fa-pencil\"></i></button>
                             <button class=\"btn-danger\" onclick=\"preguntarC('$row[0]')\"><i class=\"fa fa-times\"></i></button>
                              </div></td></tr>",$row['descripcion'],$row['nombre'],$row['estado']);
                    }
                  ?>
              </tbody>

            </table>
          </div>
      </div>
   </section>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAgregarCompo"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
     <form  role="form" method="POST" enctype="multipart/form-data" action="ingresarComp.php" onsubmit="return validarComponente()">
       <div class="modal-header" style="background: #39CCCC; color:white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" style="text-align: center;">AGREGAR COMPONENTE</h5>
        </div>

      <div class="modal-body">
        <div class="box-body">
            <!------------------- CODIGO COMPONENTE ------------------------------------------->
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-barcode"></i></div>
                    <input type="text" class="form-control input-lg" name="codigoC" id="codigoC" placeholder="Código Componente" required>
             </div>

          <br>
        <!-------------------------------- DESCRIPCION --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-archive"></i></div>
                      <input type="text" class="form-control input-lg" name="descripcion" id="descripcion" placeholder="Descripción" required>
                </div>
              </div>

              <!--------------------------------NOMBRE --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-book-reader"></i></div>
                      <input type="text" class="form-control input-lg" name="nombre" id ="nombre" placeholder="Nombre" required>
                </div>
              </div>

              <!-------------------------------ESTADO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-angle-double-down"></i></div>
                    <select name="estado" id="estado" class="form-control input-lg">
                      <option value="">Inicializado</option>
                      <option value="">En Ejecucion</option>
                      <option value="">Finalizado</option>
                    </select>

                </div>
              </div>

         </div>
       </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Agregar Componente</button>
      </div>

    </form>
  </div>
 </div>
</div>



<!-- EDITAR -->

<div class="modal fade" id="modalEditar"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
     <form  role="form" method="POST" enctype="multipart/form-data" action="ingresarComp.php" onsubmit="return validarEditarComponente()">
       <div class="modal-header" style="background: #39CCCC; color:white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" style="text-align: center;">EDITAR COMPONENTE</h5>
        </div>

      <div class="modal-body">
        <div class="box-body">
            <!------------------- CODIGO COMPONENTE ------------------------------------------->
          <div class="form-group">
              <div class="input-group">
                    <input type="hidden" class="form-control input-lg" name="codigoC" id="codigou" placeholder="Código Componente">
             </div>

          <br>
        <!-------------------------------- DESCRIPCION --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-archive"></i></div>
                      <input type="text" class="form-control input-lg" name="descripcion" id="descripcionu" placeholder="Descripción" required>
                </div>
              </div>

              <!--------------------------------NOMBRE --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-band-aid"></i></div>
                    <input type="text" class="form-control input-lg" name="nombre" id ="nombreu" placeholder="Nombre" required>
                </div>
              </div>

              <!-------------------------------ESTADO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-angle-double-down"></i></div>
                    <select name="estado" id="estadou" class="form-control input-lg">
                      <option value="">Inicializado</option>
                      <option value="">En Ejecucion</option>
                      <option value="">Finalizado</option>
                    </select>

                  <!--    <input type="text" class="form-control input-lg" name="estado" id="estadou" placeholder="Estado" required>-->
                </div>
              </div>

         </div>
       </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Agregar Componente</button>
      </div>

    </form>
  </div>
 </div>
</div>




<?php
  }else {include("../iniciarsesion.php");}

?>
