<?php

function conectar()     //metodo para llamar a la conexion de la base de datos
{
    //llamo al otro fichero php
    include 'datos.php';

    //creo la conexion con mysqli_connect enviando los parametros que estan en mi fichero datos.php
    $conexion = mysqli_connect($hostname, $username, $password, $database) or die("No se ha podido establecer la conexión");
    
    //echo '<script language="javascript">alert(Éxito..."' . mysqli_get_host_info($conexion) . '");</script>';

    //selecciono la base de datos pasando la conexion y el nombre de la base de datos
    mysqli_select_db($conexion, $database) or die("Problemas en la selección de la base de datos");
    //retorno la conexion que la usare en el fichero ingresarCFac.php
    return $conexion;
}

function cerrar($conexion)  //metodo para cerrar la conexion cada vez que se haga una peticion
{
    mysqli_close($conexion);
}

