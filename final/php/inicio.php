<?php
  session_start();
  if(isset($_SESSION["inicio"])){
    $_SESSION['idp']=$_REQUEST['id'];
?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         REPORTES
        <small>Panel de reportes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
           <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">ESTADOS DE LOS PROYECTOS</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <div class="box-body border-radius-none">

                <table class="table table-bordered dt-responsive tablas">
                  <caption style="color:white">COORDINADORES DE FACULTAD</caption>
                  <thead class="thead-dark">
                    <tr>
                      <th>&nbsp;Nombre&nbsp;</th>
                      <th>&nbsp;Estado&nbsp;</th>
                    </tr>
                  </thead>

                  <tbody>
                      <?php
                          include 'conexion.php';
                          $conexion=conectar();
                          $sqlMostrar="select * from ESTADOS";
                          $result=mysqli_query($conexion,$sqlMostrar) or die("No se realizo la consulta");

                      while ($row=$result->fetch_array()){
                        printf("<tr><td>&nbsp;%s</td>"
                                ."<td>&nbsp;%s&nbsp;</td>",$row['nombreProyecto'],$row['estado']);
                        }
                      ?>
                  </tbody>
                </table>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->




          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">ACTIVIDADES</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <?php
                      $conexion=conectar();
                      $id=$_SESSION['idp'];
                      $sqlMostrar=$sqlMostrar="select A.codigoA, A.codigoC, A.nombreA, A.fechaInicio, A.fechaFin, A.estado, A.descripcion
                              from Proyecto P
                              INNER JOIN Componente C
                              On P.codigoPro = C.codigoPro
                              INNER JOIN Actividad A
                              On A.CodigoC = C.CodigoC
                              where P.codigoPro = $id";
                      $result=mysqli_query($conexion,$sqlMostrar) or die("No se realizo la consulta");

                      while ($row=$result->fetch_array())
              {?>
                        <ul class="todo-list">
                            <li>
                              <span class="handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                              </span>
                              <!-- checkbox -->
                              <input type="checkbox" value="">
                              <!-- todo text -->
                              <span class="text"><?php echo $row['nombreA'];?></span>
                              <!-- Emphasis label -->
                              <small class="label label-danger"><i class="fa fa-clock-o"></i><?php echo $row['estado'];?></small>
                            </li>
                        </ul>
                <?php
              }?>
                </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
            </div>
          </div>
          <!-- /.box -->


          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
              <div class="row">
                <div class="col-sm-12">
                  <!-- Progress bars -->
                    <?php
                      $conexion=conectar();
                      $id=$_SESSION['idp'];
                      $sqlMostrar=$sqlMostrar="select A.codigoA, A.codigoC, A.nombreA, A.fechaInicio, A.fechaFin, A.estado, A.descripcion
                              from Proyecto P
                              INNER JOIN Componente C
                              On P.codigoPro = C.codigoPro
                              INNER JOIN Actividad A
                              On A.CodigoC = C.CodigoC
                              where P.codigoPro = $id";
                      $result=mysqli_query($conexion,$sqlMostrar) or die("No se realizo la consulta");

                      while ($row=$result->fetch_array())
                 {?>

                  <div class="clearfix">
                    <span class="pull-left"><?php echo $row['nombreA']?></span>
                    <?php if($row['estado']=="Iniciado"){ echo '<small class="pull-right">10%</small>';}?>


                    <?php if($row['estado']=="En ejecucion"){' <small class="pull-right">50%</small>';}?>



                    <?php if($row['estado']=="Finalizado"){'<small class="pull-right">100%</small>';}?>

                  </div>
                  <div class="progress xs">
                    <?php
                    if($row['estado']=='Iniciado'){
                          echo '<div class="progress-bar progress-bar-green" style="width: 10%;"></div>';
                      }

                      if($row['estado']=='En ejecucion'){
                          echo '<div class="progress-bar progress-bar-green" style="width: 50%;"></div>';
                      }

                       if($row['estado']=='Finalizado'){
                          echo '<div class="progress-bar progress-bar-green" style="width: 100%;"></div>';
                      }
                  ?>
                  </div>
                  <?php
                }?>

                </div>
              </div>
              <!-- /.row -->
            </div>
          </div>

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-6 connectedSortable">

          <!-- Map box -->
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">

              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
                Componentes y Actividades
              </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <div class="box-body border-radius-none">
                <table class="table table-bordered dt-responsive tablas">
                  <caption style="color:white">COORDINADORES DE FACULTAD</caption>
                  <thead class="thead-dark">
                    <tr>
                      <th>&nbsp;Actividad Codigo&nbsp;</th>
                      <th>&nbsp;Nombre Actividad&nbsp;</th>
                      <th>&nbsp;Fecha Inicio&nbsp;</th>
                      <th>&nbsp;Fecha de Finalizacion&nbsp;</th>
                      <th>&nbsp;Nombre del Componente&nbsp;</th>
                    </tr>
                  </thead>

                  <tbody>
                       <?php
                          $conexion=conectar();
                          $sqlMostrar="select * from ActividadComponente";
                          $result=mysqli_query($conexion,$sqlMostrar) or die("No se realizo la consulta");

                      while ($row=$result->fetch_array()){
                        printf("<tr><td>&nbsp;%d</td>"
                                ."<td>&nbsp;%s&nbsp;</td>"
                                ."<td>&nbsp;%s&nbsp;</td>"
                                ."<td>&nbsp;%s&nbsp;</td>"
                                ."<td>&nbsp;%s&nbsp;</td>",$row['CodigoActividad'],$row['NombreActividad'],$row['FechaI'],$row['FechaF'],$row['NombreC']);
                        }
                      ?>
                  </tbody>
                </table>
            </div>
          </div>
            <!-- /.box-body-->
          <!-- /.box -->

          <!-- solid sales graph -->
          <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">PROYECTOS COMPONENTES</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <div class="box-body border-radius-none">

                <table class="table table-bordered dt-responsive tablas">
                  <caption style="color:white">COORDINADORES DE FACULTAD</caption>
                  <thead class="thead-dark">
                    <tr>
                      <th>&nbsp;Codigo&nbsp;</th>
                      <th>&nbsp;Nombre del proyecto&nbsp;</th>
                      <th>&nbsp;Nombre del componente&nbsp;</th>
                    </tr>
                  </thead>

                  <tbody>
                      <?php
                          $conexion=conectar();
                          $sqlMostrar="select * from ProyectoComponente";
                          $result=mysqli_query($conexion,$sqlMostrar) or die("No se realizo la consulta");

                      while ($row=$result->fetch_array()){
                        printf("<tr><td>&nbsp;%s</td>"
                                ."<td>&nbsp;%s&nbsp;</td>"
                                ."<td>&nbsp;%s&nbsp;</td>",$row['Codigoproyecto'],$row['Nombreproyecto'],$row['Nombrecomponente']);
                        }
                      ?>
                  </tbody>
                </table>
            </div>
          </div>
          <!-- /.box -->

          <!-- Calendar -->

          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

  <?php
  }else{
    include('../iniciarsesion.php');
  }
  ?>
