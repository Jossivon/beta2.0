<?php

//uso el include para insertar codigo de otro archivo php es como si llamara o todo ese fragmento de codigo del otro archivo
// el requireonce funciona de la misma forma que el include sino q este impiden la carga de un mismo fichero varias veces, pero no da problema.
include 'conexion.php';
$codigo = $_POST['codigo'];
$codigoc = $_POST['codigoC'];
$descripcion = $_POST['descripcion'];
$nombre = $_POST['nombre'];
$fechaInicio = $_POST['fecha'];
$fechaFin = $_POST['fechaf'];
$estado = $_POST['estado'];


session_start();

$conexion = conectar();

if (is_uploaded_file($_FILES['archivo']['tmp_name']))
{
$nombreDirectorio = "archivo/";
$idUnico = time();
$nombreFichero = $idUnico . "-" . $_FILES['archivo']['name'];
move_uploaded_file($_FILES['archivo']['tmp_name'],
$nombreDirectorio . $nombreFichero);
print("nombre directorio $nombreDirectorio<br>");
print("nombre fichero $nombreFichero<br>");
print ("Si se ha podido subir el fichero<br>\n");
}
else{
print ("No se ha podido subir el fichero\n");

//la varaible sqlInsertar guarda la consulta que se quiera realizar, pero aun no la ejecuta ojo
$sqlInsertar = "INSERT INTO Actividad (codigoA, codigoC ,descripcion, nombreA, fechaInicio, fechaFin, estado)
 VALUES ($codigo,$codigoc, '$descripcion', '$nombre', '$fechaInicio', '$fechaFin', '$estado')";
$resultado = mysqli_query($conexion, $sqlInsertar) or die("Problemas al guardar los datos...  ");

cerrar($conexion);

header("Location: plantilla.php?op=8");
