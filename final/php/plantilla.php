<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AIKING </title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="vbower_components/Ionicons/css/ionicons.min.css">
  <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">

  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.css">

  <!-- AdminLTE Skins.  -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- ALERTIFY -->
  <!-- CSS -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/alertify.min.css"/>
  <!-- Default theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/themes/default.min.css"/>
  <!-- Semantic UI theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/themes/semantic.min.css"/>
  <!-- Bootstrap theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/themes/bootstrap.min.css"/>

  <!-- 
      RTL version
  -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/alertify.rtl.min.css"/>
  <!-- Default theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/themes/default.rtl.min.css"/>
  <!-- Semantic UI theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/themes/semantic.rtl.min.css"/>
  <!-- Bootstrap theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/themes/bootstrap.rtl.min.css"/>
  
  <!-- iNICIAR SESION -->

  <!--PLUGINS DE JAVASCRIPTS-->

    <!-- jQuery 3 -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- DataTables -->
    <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="../bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
    <!-- Sweet alert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--<script src="js/plantilla.js"></script>-->
    <!-- Funciones -->
    <script src="../js/funciones.js"></script>
    <!--alertify -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/alertify.min.js"></script>

    <!--INICIAR SESION -->
</head>

<body class="hold-transition sidebar-collapse skin-blue sidebar-mini"> 
<?php 
  session_start();
  include('../cabezera.html');
  include('../menu.php');
   
  if(isset($_SESSION["inicio"])){
  	echo '<div class="wrapper">';
    
  	$op='1';

  	if(isset($op)){
  		$op=$_REQUEST['op'];
  	}

  	switch ($op) {
  		case '1':
  			include('inicio.php');
  			break;
  		
  		case '2':
  			include('coorfacu.php');
  			break;

  		case '3':
  			include('coocarrera.php');
  			break;

  		case '4':
  			include('docente.php');
  			break;

  		case '5':
  			include('estudiante.php');
  			break;


  		case '6':
  			include('proyecto.php');
  			break;


  		case '7':
  			include('componente.php');
  			break;

  		case '8':
  			include('actividad.php');
  			break;

  		case '9':
  			include('empresa.php');
  			break;

  		case '10':
  			include('repempresa.php');
  			break;

  		case '11':
  			include('reportes.php');
  			break;

  		case '12':
  			include('planificacion.php');
  			break;
  	}

  	include "login.php";
  }
  	include('../footer.html');
?>

 <script src="../js/plantilla.js"></script>
</body>
</html>