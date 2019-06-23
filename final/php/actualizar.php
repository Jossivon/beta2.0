<?php

include 'conexion.php';
$conexion = conectar();

$cedulaI = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$cargaHoraria = $_POST['carga'];

$sqlInsertar = "UPDATE Integrantes SET nombre='$nombre', apellido='$apellido', correo='$correo', telefono='$telefono', cargaHoraria=$cargaHoraria where cedulaI='$cedulaI'";

$resultado = mysqli_query($conexion, $sqlInsertar) or die("Problemas al guardar los datos...  ");

echo '<script language="javascript">alert(ESTADO DE LA CONSULTA"' . $resultado . '");</script>';

cerrar($conexion);

header("Location: plantilla.php?op=2");
