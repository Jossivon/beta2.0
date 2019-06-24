<?php

//uso el include para insertar codigo de otro archivo php es como si llamara o todo ese fragmento de codigo del otro archivo
// el requireonce funciona de la misma forma que el include sino q este impiden la carga de un mismo fichero varias veces, pero no da problema. 
include 'conexion.php';
$conexion = conectar();
$codigoC = $_POST['codigoC'];
$descripcion = $_POST['descripcion'];
$nombre = $_POST['nombre'];
$estado = $_POST['estado'];
//.............................................


//en su conexion.php hice dos metodos el uno conectar para cuando haga una peticion primero haga la conexion valga la redundancia



//la varaible sqlInsertar guarda la consulta que se quiera realizar, pero aun no la ejecuta ojo
$sqlInsertar = "UPDATE Componente SET descripcion='$descripcion', nombre='$nombre', estado='$estado' where codigoC='$codigoC'";

$resultado = mysqli_query($conexion, $sqlInsertar) or die("Problemas al guardar los datos...  ");

echo '<script language="javascript">alert(ESTADO DE LA CONSULTA"' . $resultado . '");</script>';

cerrar($conexion);

header("Location: plantilla.php?op=2");
