<div class="content-wrapper">
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
            Agregar Integrantes
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
        </table>
      </div>

  </div>
</section>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAgregarRepEmp"  role="dialog" >
<div class="modal-dialog">
<div class="modal-content">
 <form  role="form method="post" enctype="multipart/form-data">
   <div class="modal-header" style="background: #39CCCC; color:white">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h5 class="modal-title" style="text-align: center;">AGREGAR REPRESENTANTE DE la EMPRESA</h5>
    </div>

  <div class="modal-body">
    <div class="box-body">
        <!------------------- CEDULA DE IDENTIDAD ----------------------------------------->
      <div class="form-group">
          <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                <input type="text" class="form-control input-lg" name="cedularepempresa" placeholder="Cédula" required>
         </div>
         <br>
    <!-------------------------------- NOMBRE  --------------------------------->
          <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                  <input type="text" class="form-control input-lg" name="nombrerepempresa" placeholder="Nombre" required>
            </div>
          </div>

          <!-------------------------------- APELLIDO --------------------------------->
          <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                  <input type="text" class="form-control input-lg" name="apellidorepempresa" placeholder="Apellido" required>
            </div>
          </div>

          <!------------------------------------CORREO--------------------------------------------->
                <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-at"></i></div>
                        <input type="email" class="form-control input-lg" name="correrepempresa" placeholder="Correo">
                  </div>
                </div>

          <!------------------------------------- TELEFONO --------------------------------------->
                <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                        <input type="text" class="form-control input-lg" name="telefonorepempresa" placeholder="Teléfono" >
                  </div>
                </div>

          <!----------------------------------------- CARGO ----------------------------------------->
          <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-users"></i></div>
                  <select name="cargo" class="form-control input-lg">
                    <option value default="">Representante de la empresa</option>
                  </select>
            </div>
          </div>


         <div class="form-group">
            <div class="panle">Subir foto   </div>
            <input type="file" id="foto" name="nuevafoto">
            <p class="help-block"> Peso máximo 200 MB</p>
            <img src="vistas/img/usuarios/perfil.png" alt="">
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