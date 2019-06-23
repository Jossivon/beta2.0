<?php

include 'conexion.php';

$conexion = conectar();

$cedula = $_POST['id'];

$sqlInsertar = "DELETE FROM Actividad where codigoA='$codigo'";
 
$resultado = mysqli_query($conexion, $sqlInsertar);

header("Location: plantilla.php?op=2");
?>

