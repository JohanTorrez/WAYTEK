<?php
 $nombre_servidor = 'localhost';
 $nombre_usuario = 'root';
 $contraseña= '';
 $nombre_bd = 'proyecto_waytek';

 if(!$sql = new mysqli($nombre_servidor, $nombre_usuario, $contraseña, $nombre_bd))
 {
    echo "Error al conectar la base de datos, Error : " . $sqli->errno . " ". $sqli->error;
    $sql->set_charset('utf-8');
 }
?>