<?php

//uso el include para insertar codigo de otro archivo php es como si llamara o todo ese fragmento de codigo del otro archivo
// el requireonce funciona de la misma forma que el include sino q este impiden la carga de un mismo fichero varias veces, pero no da problema. 
include 'conexion.php';
$conexion = conectar();

$codigoPro = $_POST['codigo'];
//$cedulaC = $_POST['cedulaC'];
$nombrePrograma = $_POST['nombrePrograma'];
$nombreProyecto= $_POST['nombreProyecto'];
$duracion = $_POST['duracion'];
$tipo = $_POST['tipo'];
$fechaInicio = $_POST['fechaInicio'];
$finalPlanificado = $_POST['finalPlanificada'];
$finalReal = $_POST['finalReal'];
$localizacion = $_POST['localizacion'];
$objetivoGeneral = $_POST['objetivoGeneral'];
$beneficiariosD = $_POST['beneficiariosD'];
$beneficiariosI = $_POST['beneficiariosI'];
$estado = $_POST['estado'];

//..............................................


//en su conexion.php hice dos metodos el uno conectar para cuando haga una peticion primero haga la conexion valga la redundancia


//la varaible sqlInsertar guarda la consulta que se quiera realizar, pero aun no la ejecuta ojo
$sqlInsertar = "UPDATE Proyecto  SET codigoPro='$codigoPro', cedulaC='$cedulaCu', nombrePrograma='$nombreProgramau', nombreProyecto='$nombreProyectou', duracion='$duracionu', tipo='$tipou' , fechaInicio ='$fechaIniciou', finalPlanificado='$finalPlanificadou', finalReal='$finalRealu', localizacion='$localizacionu', objetivoGeneral='$objetivoGeneralu',beneficiariosD='$beneficiariosDu', beneficiariosI ='$beneficiariosIu', estado='$estadou' where codigoPro='$codigoPro'";

$resultado = mysqli_query($conexion, $sqlInsertar) or die("Problemas al guardar los datos...  ");

echo '<script language="javascript">alert(ESTADO DE LA CONSULTA"' . $resultado . '");</script>';

cerrar($conexion);

header("Location: plantilla.php?op=2");
//MODIFICADO L