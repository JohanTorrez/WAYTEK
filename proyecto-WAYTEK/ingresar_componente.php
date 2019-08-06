<?php
session_start();
//conexion a la base de datos
require "conexion_waytek.php";

//datos del producto sin importar tipo
$tipo=$_POST['tipo_componente'];

//activacion de campos segun tipo de producto
switch ($tipo){
    case 'procesador':
    //campos necesarios para registro de procesador
    $marca = $_POST['marca_procesador'];
    $nombre = $_POST['nombre_procesador'];
    $frecuencia = $_POST['frecuencia_procesador'];
    $nucleos = $_POST['nucleos_procesador'];
    $hilos = $_POST['hilos_procesador'];
    $consumo= $_POST['consumo_procesador'];
    $video = $_POST['video_procesador'];
    //registro en base de datos
    $cons = $mysqli->query("INSERT INTO procesador (marca_procesador , nombre_procesador, frecuencia_procesador, nucleos_procesador, hilos_procesador, consumo_procesador, video_procesador) VALUES ('$marca','$nombre','$frecuencia','$nucleos','$hilos','$consumo','$video')");
    //en caso de fallo
    if(!$cons){
        echo "Error: " . $mysqli->error, $mysqli->errno;
    }
    else{
        echo "Procesador registrado<br>";
    }
    //seleccion de registro ingresado anteriormente
    $cons2 = $mysqli->query("SELECT * FROM procesador WHERE nombre_procesador = '$nombre' AND marca_procesador='$marca'");
    //en caso de fallo
    if(!$cons2){
        echo "Error: " . $mysqli->error, $mysqli->errno;
    }
    else{
        echo "Procesador seleccionado<br>";
    }
    $procesador = $cons2->fetch_array(MYSQLI_ASSOC);
    $id_procesador = $procesador['id_procesador'];
    //ingreso de componente
    $cons3 = $mysqli->query("INSERT INTO componentes (tipo_componente, id_procesador, id_almacenamiento, id_ram, id_tarjeta_video) VALUES ('$tipo','$id_procesador','2','2','2')");
    //en caso de fallo
    if(!$cons3){
        echo "Error: " . $mysqli->error, $mysqli->errno;
    }
    else{
        echo "Componente registrado";
    }
    break;

    case 'almacenamiento':
    $marca = $_POST['marca_almacenamiento'];
    $nombre = $_POST['nombre_almacenamiento'];
    $capacidad = $_POST['capacidad_almacenamiento'];
    $unidad = $_POST['unidad_almacenamiento'];
    $tipo_almace = $_POST['tipo_almacenamiento'];
    $velocidad = $_POST['velocidad_almacenamiento'];
    $formato  = $_POST['formato_almacenamiento'];
    $cons = $mysqli->query("INSERT INTO almacenamiento (marca_almacenamiento, nombre_almacenamiento, capacidad_almacenamiento, unidad_almacenamiento, tipo_almacenamiento, velocidad_almacenamiento, formato_almacenamiento) VALUES ('$marca','$nombre','$capacidad','$unidad','$tipo_almace','$velocidad','$formato')");
    //en caso de fallo
        if(!$cons){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "Almacenamiento registrado<br>";
        }
        $cons2 = $mysqli->query("SELECT * FROM almacenamiento WHERE nombre_almacenamiento = '$nombre' AND marca_almacenamiento='$marca'");
        //en caso de fallo
        if(!$cons2){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "Almacenamiento seleccionado<br>";
        }
        $almacenamiento = $cons2->fetch_array(MYSQLI_ASSOC);
        $id_almacenamiento = $almacenamiento['id_almacenamiento'];
        $cons3 = $mysqli->query("INSERT INTO componentes (tipo_componente, id_procesador, id_almacenamiento, id_ram, id_tarjeta_video) VALUES ('$tipo','2','$id_almacenamiento','2','2')");
        //en caso de fallo
        if(!$cons3){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "Componente registrado<br>";
        }
    break;

    case 'ram':
    $marca = $_POST['marca_ram'];
    $nombre = $_POST['nombre_ram'];
    $tipo_ram = $_POST['tipo_ram'];
    $capacidad = $_POST['capacidad_ram'];
    $distribucion = $_POST['distribucion_ram'];
    $forma = $_POST['forma_ram'];
    $cons = $mysqli->query("INSERT INTO ram (marca_ram, nombre_ram, tipo_ram, capacidad_ram, distribucion_ram, forma_ram) VALUES ('$marca','$nombre','$tipo_ram','$capacidad','$distribucion', '$forma')");
    //en caso de fallo
        if(!$cons){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "RAM registrada";
        }
        $cons2 = $mysqli->query("SELECT * FROM ram WHERE nombre_ram = '$nombre' AND marca_ram='$marca'");
        //en caso de fallo
        if(!$cons2){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "RAM seleccionada";
        }
        $ram = $cons2->fetch_array(MYSQLI_ASSOC);
        $id_ram = $ram['id_ram'];
        $cons3 = $mysqli->query("INSERT INTO componentes (tipo_componente, id_procesador, id_almacenamiento, id_ram, id_tarjeta_video) VALUES ('$tipo','2','2','$id_ram','2')");
        //en caso de fallo
        if(!$cons3){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "Componente registrado";
        }
    break;
    default:
    $marca = $_POST['marca_tarjeta_video'];
    $nombre = $_POST['nombre_tarjeta_video'];
    $vram = $_POST['vram_tarjeta_video'];
    $tipo_tarjeta_video = $_POST['tipo_tarjeta_video'];
    $frecuencia = $_POST['frecuencia_tarjeta_video'];
    $cons = $mysqli->query("INSERT INTO tarjeta_video (marca_tarjeta_video, nombre_tarjeta_video, vram_tarjeta_video, tipo_tarjeta_video, frecuencia_tarjeta_video) VALUES ('$marca','$nombre','$vram','$tipo_tarjeta_video','$frecuencia')");
    //en caso de fallo
        if(!$cons){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "Tarjeta de video registrada";
        }
        $cons2 = $mysqli->query("SELECT * FROM tarjeta_video WHERE nombre_tarjeta_video = '$nombre' AND marca_tarjeta_video='$marca'");
        //en caso de fallo
        if(!$cons2){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "Tarjeta de video seleccionada";
        }
        $tarjeta_video = $cons2->fetch_array(MYSQLI_ASSOC);
        $id_tarjeta_video = $tarjeta_video['id_tarjeta_video'];
        $cons3 = $mysqli->query("INSERT INTO componentes (tipo_componente, id_procesador, id_almacenamiento, id_ram, id_tarjeta_video) VALUES ('$tipo','2','2','2','$id_tarjeta_video')");
        //en caso de fallo
        if(!$cons3){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "Componente registrado";
        }
    break;
}
        ?>