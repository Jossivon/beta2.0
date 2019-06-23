<?php

//uso el include para insertar codigo de otro archivo php es como si llamara o todo ese fragmento de codigo del otro archivo
// el requireonce funciona de la misma forma que el include sino q este impiden la carga de un mismo fichero varias veces, pero no da problema.
include 'conexion.php';
$conexion = conectar();

$cedulaI = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$cargaHoraria = $_POST['carga'];

$sqlInsertar = "UPDATE Integrantes SET nombre='$nombre', apellido='$apellido', correo='$correo', telefono='$telefono', cargaHoraria=$cargaHoraria where cedulaI='$cedulaI'";

$resultado = mysqli_query($conexion, $sqlInsertar) or die("Problemas al guardar los datos...  ");

echo '<script language="javascript">alert(ESTADO DE LA CONSULTA"' . $resultado . '");</script>';

cerrar($conexion);

header("Location: plantilla.php?op=2");
