<?php

$nombre_servidor="localhost";
$nombre_usuario="root";
$password="";
$nombre_bd="proyecto_waytek";
$tabla_usuario="usuario";

//crear uan variable de conexion utilizando extension "mysqli"

$conexion=new mysqli($nombre_servidor, $nombre_usuario, $password, $nombre_bd);

if ($conexion->connect_error){
    echo "Error de conexión de bases de datos ".$conexion->connect_error;
    exit();
}

?>