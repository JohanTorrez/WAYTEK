<?php

$nombre_servidor="localhost";
$nombre_usuario="root";
$password="";
$nombre_bd="proyecto_waytek";
$tabla_usuario="usuario";

//crear uan variable de conexion utilizando extension "mysqli"

$mysqli=new mysqli($nombre_servidor, $nombre_usuario, $password, $nombre_bd);
$mysqli->set_charset('utf8');
if ($mysqli->connect_error){
    echo "Error de conexión de bases de datos ".$mysqli->connect_error;
    exit();
}

?>