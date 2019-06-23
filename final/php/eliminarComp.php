<?php

include 'conexion.php';

$conexion = conectar();

$cedula = $_POST['id'];

$sqlInsertar = "DELETE FROM Componente where codigoC='$codigoC'";
 
$resultado = mysqli_query($conexion, $sqlInsertar);

header("Location: plantilla.php?op=2");
?>

