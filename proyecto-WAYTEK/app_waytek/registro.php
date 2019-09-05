<?php
$nombre_servidor = "localhost";
$nombre_usuario = "root";
$password = "";
$nombre_bd = "proyecto_waytek";
$json = array();

//crear una variable de conexion utilizando extension "mysqli"

if (isset($_GET['input_nombre']) && isset($_GET['input_apellido']) && isset($_GET['input_direccion']) && isset($_GET['input_email']) && isset($_GET['input_crear_contra'])) {
    $mysqli = new mysqli($nombre_servidor, $nombre_usuario, $password, $nombre_bd);
    $mysqli->set_charset('utf8');
    $nombre = $_GET['input_nombre'];
    $apellido = $_GET['input_apellido'];
    $sexo = $_GET['input_sexo'];
    $documento = $_GET['input_documento'];
    $email = $_GET['input_email'];
    $contrasena_creada = $_GET['input_crear_contra'];
    $ciudad = $_GET['input_ciudad'];
    $departamento = $_GET['input_departamento'];
    $direccion = $_GET['input_direccion'];

    $registro = $mysqli->query("INSERT INTO cliente (nombre_cliente, apellido_cliente, gen_cliente, id_docu_cliente, email_cliente, contrase_cliente, ciudad_cliente, departamento_cliente, direccion_cliente)
    VALUES ('$nombre', '$apellido', '$sexo', '$documento', '$email', '$contrasena_creada', '$ciudad', '$departamento' '$direccion')");


    if (!$registro) {
        echo $mysqli->error;
    } else {
        echo "Cliente registrado";
        //var_dump($registro);
    }


    //$json['datos'][] = $results;
} else {
    echo "Campos Vacios";
    if ($mysqli->connect_error) {
        echo "Error de conexión de bases de datos " . $mysqli->connect_error;
    }
    var_dump($registro);
}
