<?php

include 'conexion.php';
$conexion = conectar();
$cedula = $_POST['cedulaI'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$cargo = $_POST['cargo'];


$sqlInsertar = "UPDATE RepresentanteEmpresa SET nombreR='$nombre', apellidoR='$apellido', correo='$correo', telefono='$telefono' where cedulaRep='$cedula'";

$resultado = mysqli_query($conexion, $sqlInsertar) or die("Problemas al guardar los datos...  ");

echo '<script language="javascript">alert(ESTADO DE LA CONSULTA"' . $resultado . '");</script>';

cerrar($conexion);

header("Location: plantilla.php?op=2");
