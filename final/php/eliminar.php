<?php

include 'conexion.php';

$conexion = conectar();

$cedula = $_POST['id'];

$sqlInsertar = "DELETE FROM Integrantes where cedulaI='$cedula'";
 
echo $resultado = mysqli_query($conexion, $sqlInsertar);

?>

