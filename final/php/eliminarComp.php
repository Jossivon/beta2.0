<?php

include 'conexion.php';

$conexion = conectar();

$codigo = $_POST['id'];

$sqlInsertar = "DELETE FROM Componente where codigoC=$codigo";
 
$resultado = mysqli_query($conexion, $sqlInsertar);

header("Location: plantilla.php?op=7");
?>

