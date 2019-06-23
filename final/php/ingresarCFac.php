<?php

include 'conexion.php';

$cedula= $_POST['cedulaI'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$carga = $_POST['cargaHoraria'];
$cargo=$_POST['cargo'];
$codigoFacultad=$_POST['facultad'];

session_start();

  if(isset($_SESSION["inicio"])){
    $id=$_SESSION['idp'];
  }
$conexion = conectar();

$sqlInsertar = "INSERT INTO Integrantes (cedulaI, codigoPro, codigoFacultad, nombre, apellido, correo, telefono, cargaHoraria, cargo) VALUES ('$cedula', $id,$codigoFacultad ,'$nombre', '$apellido', '$correo', '$telefono', $carga,'$cargo')" or die('No se realizo la consulta');


$resultado = mysqli_query($conexion, $sqlInsertar) or die("Problemas al guardar los datos...  ");

cerrar($conexion);

header("Location: plantilla.php?op=2");