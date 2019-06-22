<?php

include 'conexion.php';

$conexion = conectar();

$cedula = $_POST['cedulaI'];
$codigoFacultad = $_POST['facultad'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$carga = $_POST['cargaHoraria'];
$cargo=$_POST['cargo'];

session_start(); 

  if(!isset($_SESSION["inicio"])){
    $id=$_SESSION['idp'];
  }

$sqlInsertar = "INSERT INTO Integrantes (cedulaI, codigoPro, codigoFacultad, nombre, apellido, correo, telefono, cargaHoraria, cargo) VALUES ('$cedula', $id,$codigoFacultad ,'$nombre', '$apellido', '$correo', '$telefono', $carga,'$cargo')" or die('No se realizo la consulta');


$resultado = mysqli_query($conexion, $sqlInsertar) or die("Problemas al guardar los datos...  ");

cerrar($conexion);



