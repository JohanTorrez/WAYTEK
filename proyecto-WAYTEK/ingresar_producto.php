<?php
session_start();
require "conexion_waytek.php";
//datos del producto sin importar tipo
$tipo=$_POST['tipo_producto'];
$tienda = $_SESSION['id_tienda'];
$nombre = $_POST['nombre_producto'];
$marca=$_POST['marca_producto'];

//datos correspondientes a la imagen
$nombre_img=$_FILES['foto_producto']['name'];
$archivo=$_FILES['foto_producto']['tmp_name'];

//ruta a guardar la imagen
$ruta="img/productos";
$ruta=$ruta."/".$nombre_img;

//mover la imagen a la carpeta
move_uploaded_file($archivo, $ruta);

//descripcion del producto
$descripcion = $_POST['descripcion_producto'];

//precio y descuento del producto
$precio = $_POST['precio_producto'];
$descuento = $_POST['descuento_producto'];

//activacion de campos segun tipo de producto
switch ($tipo) {
    case 'portatil':
    $procesador = $_POST['procesador'];
    $almacenamiento = $_POST['almacenamiento'];
    $ram = $_POST['ram'];
    $tarjetavideo = $_POST['tarjetavideo'];

    $cons = $mysqli->query("INSERT INTO portatil (id_categoria, nombre_accesorio, descripcion_accesorio) VALUES ('$categoria','$nombre','$descripcion')");
    if(!$cons){
        echo "Error: " . $mysqli->error, $mysqli->errno;
    }
    else{
        echo "hecho";
    }
    $cons2 = $mysqli->query("SELECT * FROM accesorio WHERE nombre_accesorio = '$nombre'");
    if(!$cons2){
        echo "Error: " . $mysqli->error, $mysqli->errno;
    }
    else{
        echo "hecho";
    }
    $accesorio = $cons2->fetch_array(MYSQLI_ASSOC);
    $id_accesorio = $accesorio['id_accesorio'];
    $cons3 = $mysqli->query("INSERT INTO producto (tipo_producto, id_tienda, id_accesorio, foto_producto, precio_producto, descuento_producto) VALUES ('$tipo','$tienda','$id_accesorio','$ruta','$precio','$descuento')");
    if(!$cons3){
        echo "Error: " . $mysqli->error, $mysqli->errno;
    }
    else{
        echo "hecho";
    }

    break;
    case 'accesorio':
    $categoria = $_POST['categoria_accesorio'];
    $cons = $mysqli->query("INSERT INTO accesorio (id_categoria, nombre_accesorio, descripcion_accesorio) VALUES ('$categoria','$nombre','$descripcion')");
        if(!$cons){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "hecho";
        }
        $cons2 = $mysqli->query("SELECT * FROM accesorio WHERE nombre_accesorio = '$nombre' AND id_categoria='$categoria'");
        if(!$cons2){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "hecho";
        }
        $accesorio = $cons2->fetch_array(MYSQLI_ASSOC);
        $id_accesorio = $accesorio['id_accesorio'];
        $cons3 = $mysqli->query("INSERT INTO producto (tipo_producto, id_tienda, id_portatil, id_pc_escritorio, id_accesorio, id_presupuesto, foto_producto, precio_producto, descuento_producto) VALUES ('$tipo','$tienda','4','4','$id_accesorio', '1','$ruta','$precio','$descuento')");
        if(!$cons3){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "hecho";
        }
        default:

        break;
    }
        ?>