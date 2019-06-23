<?php

include 'conexion.php';

$conexion = conectar();

$cedula = $_POST['id'];

$sqlInsertar = "DELETE FROM Proyecto where codigoPro='$codigoPro'";
 
$resultado = mysqli_query($conexion, $sqlInsertar);

header("Location: plantilla.php?op=2");
//modificado L


