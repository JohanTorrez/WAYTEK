<?php

$nombre_servidor = "localhost";
$nombre_usuario = "root";
$password = "";
$nombre_bd = "proyecto_waytek";
$tabla_usuario = "usuario";
$json = array();

//crear uan variable de conexion utilizando extension "mysqli"

if (isset($_GET["input_correo"]) && isset($_GET["input_contrasena"])) {
    $mysqli = new mysqli($nombre_servidor, $nombre_usuario, $password, $nombre_bd);
    $mysqli->set_charset('utf8');
    $usuario = $_GET['input_usuario'];
    $password = $_GET['input_contrasena'];

    $consulta = ("SELECT e_mail_cliente FROM cliente WHERE");
    $resultado = mysqli_query($mysqli, $consulta);

    if ($consulta) {

        if ($reg = mysqli_fetch_array($resultado)) {
            $json['datos'][] = $reg;
        }
        mysqli_close($conexion);
        echo json_encode($json);
    } else {
        $results["user"] = '';
        $results["pwd"] = '';
        $results["names"] = '';
        $json['datos'][] = $results;
        echo json_encode($json);
    }
} else {
    if ($mysqli->connect_error) {
        echo "Error de conexión de bases de datos " . $mysqli->connect_error;
    }
    $results["user"] = '';
    $results["pwd"] = '';
    $results["names"] = '';
    $json['datos'][] = $results;
    echo json_encode($json);
}
