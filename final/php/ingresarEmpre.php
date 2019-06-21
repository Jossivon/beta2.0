<?php

//uso el include para insertar codigo de otro archivo php es como si llamara o todo ese fragmento de codigo del otro archivo
// el requireonce funciona de la misma forma que el include sino q este impiden la carga de un mismo fichero varias veces, pero no da problema. 
include 'conexion.php';
$codigoE = $_POST['codigoE'];
$nombre = $_POST['nombre'];
$siglas = $_POST['siglas'];
$ciudad = $_POST['ciudad'];
$PaginaWeb = $_POST['PaginaWeb'];
$telefono = $_POST['telefono'];
$descripcion = $_POST['descripcion'];
//en su conexion.php hice dos metodos el uno conectar para cuando haga una peticion primero haga la conexion valga la redundancia
$conexion = conectar();


//la varaible sqlInsertar guarda la consulta que se quiera realizar, pero aun no la ejecuta ojo
$sqlInsertar = "INSERT INTO `Empresa` (`codigoE`, `nombre`, `siglas`, `ciudad`, `PaginaWeb`, `telefono`, `descripcion`) VALUES ('$codigoE', '$nombre', '$siglas', '$ciudad', '$PaginaWeb', '$telefono', '$descripcion')";

//la variable  resultado realiza la consulta con mysqli_query pasandole como entradas la variable conexion y la consulta, si marcha bien todo se ejecuta la consulta caso contrario pasa al error 
$resultado = mysqli_query($conexion, $sqlInsertar) or die("Problemas al guardar los datos...  ");

//forma para imprimir un alert en PHP / puede borrarlo si desea devuelve 1 si la consulta se hace satisfactoriamente para 
echo '<script language="javascript">alert(ESTADO DE LA CONSULTA"' . $resultado . '");</script>';

//siempre es aconsejable cerrar la conexion pues si no lo hace puede estar utilizando espacio en memoria y puede colapsar la base
cerrar($conexion);

header("refesh:1, url=inicio");


