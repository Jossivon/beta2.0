<?php

//uso el include para insertar codigo de otro archivo php es como si llamara o todo ese fragmento de codigo del otro archivo
// el requireonce funciona de la misma forma que el include sino q este impiden la carga de un mismo fichero varias veces, pero no da problema.
include 'conexion.php';
$cedulaI = $_POST['cedulaI'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$cargaHoraria = $_POST['carga'];

var_dump($cedulaI);
var_dump($nombre);
var_dump($apellido);
var_dump($correo);
var_dump($telefono);
var_dump($cargaHoraria);


//la varaible sqlInsertar guarda la consulta que se quiera realizar, pero aun no la ejecuta ojo
$sqlInsertar = "UPDATE Integrantes SET cedulaI='$cedulaIu', nombre='$nombre', apellido='$apellido', correo='$correo', telefono='$telefono', cargaHoraria='$cargaHoraria' where cedulaI='$cedulaI'";

$sqlInsertar = "UPDATE Integrantes SET nombre='$nombre', apellido='$apellido', correo='$correo', telefono='$telefono', cargaHoraria=$cargaHoraria where cedulaI='$cedulaI'";

$resultado = mysqli_query($conexion, $sqlInsertar) or die("Problemas al guardar los datos...  ");

echo '<script language="javascript">alert(ESTADO DE LA CONSULTA"' . $resultado . '");</script>';

cerrar($conexion);
