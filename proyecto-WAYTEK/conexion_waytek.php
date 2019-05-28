<?php

$nombre_servidor="localhost";
$nombre_usuario="root";
$contrasena="";
$nombre_bd="proyecto_waytek";

//crear uan variable de conexion utilizando extension "mysqli"

if (!$mysqli=new mysqli($nombre_servidor, $nombre_usuario, $contrasena, $nombre_bd))
    {
        echo "Error al conectar la base de datos, Error: " . $sqli->errno . " " . $sqli->error;
        $sql->set_charset('utf-8');
    }


?>
