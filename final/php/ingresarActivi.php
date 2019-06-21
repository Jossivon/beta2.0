<?php

//uso el include para insertar codigo de otro archivo php es como si llamara o todo ese fragmento de codigo del otro archivo
// el requireonce funciona de la misma forma que el include sino q este impiden la carga de un mismo fichero varias veces, pero no da problema. 
include 'conexion.php';
$codigoactivi = $_POST['codigoactivi'];
$nombreactivi = $_POST['nombreactivi'];
$fechainicio = $_POST['fechainicio'];
$fechafin = $_POST['fechafin'];

//el metodo vardump solo era para ver el tipo y valor de una variable, si quiere puede borrarla la puede aplicar en cualquier parte
var_dump($codigoactivi);
var_dump($nombreactivi);
var_dump($fechainicio);
var_dump($fechafin);

//en su conexion.php hice dos metodos el uno conectar para cuando haga una peticion primero haga la conexion valga la redundancia
$conexion = conectar();


//la varaible sqlInsertar guarda la consulta que se quiera realizar, pero aun no la ejecuta ojo
$sqlInsertar = "INSERT INTO `activi` (`codigoactivi`, `nombreactivi`, `fechainicio`, `fechafin`) VALUES (`$codigoactivi`, `$nombreactivi`, `$fechainicio`, `$fechafin`)";

//la variable  resultado realiza la consulta con mysqli_query pasandole como entradas la variable conexion y la consulta, si marcha bien todo se ejecuta la consulta caso contrario pasa al error 
$resultado = mysqli_query($conexion, $sqlInsertar) or die("Problemas al guardar los datos...  ");

//forma para imprimir un alert en PHP / puede borrarlo si desea devuelve 1 si la consulta se hace satisfactoriamente para 
echo '<script language="javascript">alert(ESTADO DE LA CONSULTA"' . $resultado . '");</script>';

//siempre es aconsejable cerrar la conexion pues si no lo hace puede estar utilizando espacio en memoria y puede colapsar la base
cerrar($conexion);