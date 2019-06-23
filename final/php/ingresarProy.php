<?php

//uso el include para insertar codigo de otro archivo php es como si llamara o todo ese fragmento de codigo del otro archivo
// el requireonce funciona de la misma forma que el include sino q este impiden la carga de un mismo fichero varias veces, pero no da problema. 
include 'conexion.php';
$codigoPro = $_POST['codigoPro'];
$cedulaC = $_POST['cedulaC'];
$nombrePrograma = $_POST['nombrePrograma'];
$nombreProyecto= $_POST['nombreProyecto'];
$duracion = $_POST['duracion'];
$tipo = $_POST['tipo'];
$fechaInicio = $_POST['fechaInicio'];
$finalPlanificado = $_POST['finalPlanificada'];
$finalReal = $_POST['finalReal'];
$localizacion = $_POST['localizacion'];
$objetivoGeneral = $_POST['objetivoGeneral'];
$beneficiariosD = $_POST['beneficiariosD'];
$beneficiariosI = $_POST['beneficiariosI'];
$estado = $_POST['estado'];

session_start();

  if(isset($_SESSION["inicio"])){
    $id=$_SESSION['idp'];
$conexion = conectar();


//la varaible sqlInsertar guarda la consulta que se quiera realizar, pero aun no la ejecuta ojo
$sqlInsertar = "INSERT INTO Proyecto (codigoPro,cedulaC, nombrePrograma, nombreProyecto, duracion, tipo, fechaInicio, finalPlanificado, finalReal, localizacion, objetivoGeneral, beneficiariosD, beneficiariosI,$estado) VALUES ('$id','$cedulaC','$nombrePrograma','$nombreProyecto','$duracion','$tipo','$fechainicio','$finalPlanificado','$finalReal ','$localizacion', '$objetivoGeneral','$beneficiariosD','$beneficiariosI','$estado')" or die('No se realizo la consulta');

$resultado = mysqli_query($conexion, $sqlInsertar) or die("Problemas al guardar los datos...  ");

cerrar($conexion);

header("Location: plantilla.php?op=2");