<?php

//uso el include para insertar codigo de otro archivo php es como si llamara o todo ese fragmento de codigo del otro archivo
// el requireonce funciona de la misma forma que el include sino q este impiden la carga de un mismo fichero varias veces, pero no da problema.
include 'conexion.php';
$conexion = conectar();
$codigoA = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$nombreA = $_POST['nombre'];
$fechaInicio = $_POST['fechai'];
$fechaFin = $_POST['fechaf'];
$estado = $_POST['estado'];
//..............................................

var_dump($codigoA);
var_dump($descripcion);
var_dump($nombreA);
var_dump($fechaInicio);
var_dump($fechaInicio);
var_dump($estado);
//en su conexion.php hice dos metodos el uno conectar para cuando haga una peticion primero haga la conexion valga la redundancia


//la varaible sqlInsertar guarda la consulta que se quiera realizar, pero aun no la ejecuta ojo
$sqlInsertar = "UPDATE Actividad
				SET descripcion='$descripcion',
				nombreA='$nombreA',
				fechaInicio='$fechaInicio',
				fechaFin='$fechaFin',
				estado='$estado' where codigoA=$codigoA";


$resultado = mysqli_query($conexion,$sqlInsertar) or die("Problemas al guardar los datos...  ");

echo '<script language="javascript">alert(ESTADO DE LA CONSULTA"' . $resultado . '");</script>';

cerrar($conexion);

header("Location: plantilla.php?op=8");
