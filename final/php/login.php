<?php 
	require_once ('conexion.php'); 

	$cedula=$_POST['usuario'];
	$clave=$_POST['clave'];
	$perfil=$_POST['perfil'];

	$conexion = conectar(); 

	if (preg_match('/^[a-zA-Z0-9]+$/',$cedula) && preg_match('/^[a-zA-Z0-9]+$/',$clave)){
		$sql="select * from Usuario where cedulaU='$cedula' and clave='$clave ' and perfil='$perfil'";
		$resultado = mysqli_query($conexion,$sql) or die("no se realizo la consulta");
		$row=$resultado->fetch_assoc();

		if ($row['cedulaU']==$cedula && $row['clave']==$clave && $row['perfil']=$perfil){
			$_SESSION['inicio']='ok';
				header('Location: proyectos.php?p=$perfil');
			
		}else {
			header('Location:../iniciarsesion.php');

			echo '<script type="text/javascript>alert("Fotos guardadas");</script>';
		}
	}

?>
