<?php

include 'conexion.php';
$conexion = conectar();
$cedula = $_POST['cedulaRep'];
$nombre = $_POST['nombreR'];
$apellido = $_POST['apellidoR'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$cargo = $_POST['cargo'];


$sqlInsertar = "UPDATE RepresentanteEmpresa SET nombre='$nombre', apellido='$apellido', correo='$correo', telefono='$telefono' where cedulaPRep='$cedulaRep'";

$resultado = mysqli_query($conexion, $sqlInsertar) or die("Problemas al guardar los datos...  ");

echo '<script language="javascript">alert(ESTADO DE LA CONSULTA"' . $resultado . '");</script>';

cerrar($conexion);

header("Location: plantilla.php?op=2");
