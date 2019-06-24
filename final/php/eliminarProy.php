<?php

include 'conexion.php';

$conexion = conectar();

$codigoPro = $_POST['id'];

$sqlInsertar = "DELETE FROM Proyecto where codigoPro=$codigoPro";
 
$resultado = mysqli_query($conexion, $sqlInsertar);

header("Location: plantilla.php?op=6");
//modificado L


