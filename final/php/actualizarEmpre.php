<?php

include 'conexion.php';
$conexion = conectar();

$codigoE = $_POST['codigo'];
$nombre = $_POST['nombre'];
$siglas = $_POST['siglas'];
$ciudad = $_POST['ciudad'];
$PaginaWeb = $_POST['PaginaWeb'];
$telefono = $_POST['telefono'];
$descripcion = $_POST['descripcion'];

$sqlInsertar = "UPDATE Empresa SET nombre='$nombre', siglas='$siglas', ciudad='$ciudad', PaginaWeb='$PaginaWeb' ,telefono='$telefono', descripcion=$descripcion where codigoE='$codigoE'";

$resultado = mysqli_query($conexion, $sqlInsertar) or die("Problemas al guardar los datos...  ");

echo '<script language="javascript">alert(ESTADO DE LA CONSULTA"' . $resultado . '");</script>';

cerrar($conexion);

header("Location: plantilla.php?op=2");
//modifiado L