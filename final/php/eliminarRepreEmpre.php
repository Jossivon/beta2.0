<?php

include 'conexion.php';

$conexion = conectar();

$cedula = $_POST['id'];

$sqlInsertar = "DELETE FROM RepresentanteEmpresa where cedulaRep='$cedula'";
 
$resultado = mysqli_query($conexion, $sqlInsertar);

header("Location: plantilla.php?op=2");
?>

