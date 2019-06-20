<?php 
	require_once ('conexion.php'); 

	$nombre=$_POST['usuario'];
	$clave=$_POST['clave']; 

	$conexion = conectar(); 

	if (preg_match('/^[a-zA-Z0-9]+$/',$nombre) && preg_match('/^[a-zA-Z0-9]+$/',$clave)){
		$sql="select * from usuarios where Nombre='$nombre' and Clave='$clave'"; 
		$resultado = mysqli_query($conexion,$sql) or die("no se realizo la consulta");
		$row=$resultado->fetch_assoc();

		if ($row['Nombre']==$nombre && $row['Clave']==$clave){
			echo 'inicio de sesion correcto';
			$_SESSION['inicio']='ok';
			header('Location: proyectos.php'); 
		}else {
			echo 'Error';
		}
	} 

?>

