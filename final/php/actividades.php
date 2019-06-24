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
                              <button class=\"btn-warning\" onclick=\"\" data-toggle=\"modal\" data-target=\"#modalEditar\"> <i class=\"fa fa-pencil\"></i></button>
                             <button class=\"btn-danger\" onclick=\"preguntar('$row[0]')\"><i class=\"fa fa-times\"></i></button>
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

<!-- Modal -->
<div class="modal fade" id="modalAgregarFacu"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
     <form  role="form" method="POST" enctype="multipart/form-data" action="ingresarActivi">
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
                    <input type="int" class="form-control input-lg" name="codigoA" placeholder="Código Actividad" required>
             </div>
             <br>

      <!----------------- CODIGO----------------------------------------->
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                    <input type="int" class="form-control input-lg" name="codigoC" placeholder="Código Coordinador" required>
             </div>
             <br>    
                 <!-------------------------------- NOMBRE DE ACTIVIDAD--------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="descripcion" placeholder="Descripcion Actividad" required>
                </div>
              </div>
    <!-------------------------------- NOMBRE DE activiTIVIDAD--------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="nombreA" placeholder="Nombre Actividad" required>
                </div>
              </div>

              <!-------------------------------- FECHA INICIO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="fechaInicio" placeholder="Fecha Inicio" required>
                </div>
              </div>

              <!---------------------------FECHA FIN-------------------------------------------->
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-at"></i></div>
                            <input type="text" class="form-control input-lg" name="fechaFin" placeholder="Fecha Fin">
                      </div>
                    </div>

              

                 <!----------------------------------------- CARGO ------------------------------------------>
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-users"></i></div>
                      <select name="estado" class="form-control input-lg">
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
     <form  role="form" method="POST" enctype="multipart/form-data" action="actualizar.php"  onsubmit="return validar()"">
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
                      <input type="hidden" class="form-control input-lg" name="cedula" id="cedula" required>
                </div>
              </div>

        <!-------------------------------- NOMBRE DE USUARIO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                   <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="nombre" id="nombre" required>
                </div>
              </div>

              <!-------------------------------- APELLIDO DEL USUARIO --------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control input-lg" name="apellido" id="apellido"  required>
                </div>
              </div>

              <!------------------------------------CORREO--------------------------------------------->
              <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-at"></i></div>
                            <input type="email" class="form-control input-lg" name="correo" id="correo" >
                      </div>
              </div>

              <!------------------------------------- TELEFONO --------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                      <input type="text" class="form-control input-lg" name="telefono" id="telefono" >
                </div>
              </div>

                <!---------------------------------- CARGA HORARIO ------------------------------------->
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user-clock"></i></div>
                      <input type="text" class="form-control input-lg" name="carga" id="carga" >
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
