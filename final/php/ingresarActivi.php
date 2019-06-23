<?php

//uso el include para insertar codigo de otro archivo php es como si llamara o todo ese fragmento de codigo del otro archivo
// el requireonce funciona de la misma forma que el include sino q este impiden la carga de un mismo fichero varias veces, pero no da problema. 
include 'conexion.php';
$codigo = $_POST['codigoA'];
$descripcion = $_POST['descripcion'];
$nombre = $_POST['nombreA'];
$fechaInicio = $_POST['fechainicio'];
$fechaFin = $_POST['fechafin'];
$estado = $_POST['estado'];
$id = $_POST['id'];

session_start();

  if(isset($_SESSION["inicio"])){
    $id=$_SESSION['idp'];
  }
$conexion = conectar();


//la varaible sqlInsertar guarda la consulta que se quiera realizar, pero aun no la ejecuta ojo
$sqlInsertar = "INSERT INTO Actividad (codigoA,codigoC,descripcion, nombreA, fechainicio, fechafin, estado) VALUES ('$codigoA','$id', '$descripcion', '$nombre', '$fechaInicio', '$fechaFin', '$estado')";
$resultado = mysqli_query($conexion, $sqlInsertar) or die("Problemas al guardar los datos...  ");

cerrar($conexion);

header("Location: plantilla.php?op=2");