<?php

include 'conexion.php';

$conexion = conectar();

$codigo = $_POST['id'];

$sqlInsertar = "DELETE FROM Empresa where codigoE=$codigo";
 

$resultado = mysqli_query($conexion, $sqlInsertar);

header("Location: plantilla.php?op=9");

//modificado L
?>

