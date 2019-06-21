<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>proyectos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="interfaz/estilos/index.css">
  </head>
  <body>	
    <?php
		session_start();

		if (!isset($_SESSION['inicio'])){
			echo '<h1>BIENVENIDO</h1>';
			include('conexion.php');

      $perfil=$_GET['p'];
			$conexion = conectar();



			$sql = "select * from Proyecto";
			$resultado=mysqli_query($conexion,$sql) or die('No se realizo la consulta');
	?>
		<section id="proyectos">
          <div class="container">
              <div class="row">
                  <div class="col text-center text-uppercase">
                      <h1 class="h3">PROYECTOS DE VINCULACIÓN</h1>
                  </div>
              </div>
              
              <div class="row">
              <?php while($row=$resultado->fetch_assoc()){ ?>

              
                <div class="col-md-4">
                  <div class="card" style="width: 18rem;">
                      <img src="../interfaz/imagenes/proyecto.jpg" class="card-img-top" alt="proyecto">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nombrePrograma']?></h5>
                        <p class="card-text"><?= $row['nombreProyecto']?></p>
                        <a href="plantilla.php?op=1&id=<?= $row['codigoPro']?>" class="btn btn-secundary">Perfil</a>
                      </div>
                  </div>
                </div>
            <?php } ?>
              </div>
          </div>
        </section>
    <?php 
    	}else{
    		header('Location:../iniciarsesion.php');
    	}
    ?>
</body>
</html>

    