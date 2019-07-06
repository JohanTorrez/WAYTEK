<?php
session_start();
require "conexion_waytek.php";
//datos del producto sin importar tipo
$tipo=$_POST['tipo_producto'];
$tienda = $_SESSION['id_tienda'];
$nombre = $_POST['nombre_producto'];

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
    case 'portátil':
    $marca=$_POST['marca_producto'];
    $procesador = $_POST['procesador'];
    $almacenamiento = $_POST['almacenamiento'];
    $ram = $_POST['ram'];
    $tarjetavideo = $_POST['tarjetavideo'];

    $cons = $mysqli->query("INSERT INTO portatil (marca_portatil , nombre_portatil, id_procesador, id_almacenamiento, id_ram, id_tarjeta_video, descripcion_portatil) VALUES ('$marca','$nombre','$procesador','$almacenamiento','$ram','$tarjetavideo','$descripcion')");
    if(!$cons){
        echo "Error: " . $mysqli->error, $mysqli->errno;
    }
    else{
        echo "Portatil registrado";
    }
    $cons2 = $mysqli->query("SELECT * FROM portatil WHERE nombre_portatil = '$nombre' AND marca_portatil='$marca'");
    if(!$cons2){
        echo "Error: " . $mysqli->error, $mysqli->errno;
    }
    else{
        echo "Portatil seleccionado";
    }
    $portatil = $cons2->fetch_array(MYSQLI_ASSOC);
    $id_portatil = $portatil['id_portatil'];
    $cons3 = $mysqli->query("INSERT INTO producto (tipo_producto, id_tienda, id_portatil, id_pc_escritorio, id_accesorio, id_presupuesto, foto_producto, precio_producto, descuento_producto) VALUES ('$tipo','$tienda','$id_portatil','4','1', '1','$ruta','$precio','$descuento')");
    if(!$cons3){
        echo "Error: " . $mysqli->error, $mysqli->errno;
    }
    else{
        echo "Producto registrado";
    }
    break;



    case 'accesorio':
    $categoria = $_POST['categoria_accesorio'];
    $cons = $mysqli->query("INSERT INTO accesorio (id_categoria, nombre_accesorio, descripcion_accesorio) VALUES ('$categoria','$nombre','$descripcion')");
        if(!$cons){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "Accesorio Registrado";
        }
        $cons2 = $mysqli->query("SELECT * FROM accesorio WHERE nombre_accesorio = '$nombre' AND id_categoria='$categoria'");
        if(!$cons2){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "Accesorio seleccionado";
        }
        $accesorio = $cons2->fetch_array(MYSQLI_ASSOC);
        $id_accesorio = $accesorio['id_accesorio'];
        $cons3 = $mysqli->query("INSERT INTO producto (tipo_producto, id_tienda, id_portatil, id_pc_escritorio, id_accesorio, id_presupuesto, foto_producto, precio_producto, descuento_producto) VALUES ('$tipo','$tienda','4','4','$id_accesorio', '1','$ruta','$precio','$descuento')");
        if(!$cons3){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "Producto Registrado";
        }
        break;
        
        
        case 'pc escritorio':
        $procesador = $_POST['procesador'];
        $almacenamiento = $_POST['almacenamiento'];
        $ram = $_POST['ram'];
        $tarjetavideo = $_POST['tarjetavideo'];
    
        $cons = $mysqli->query("INSERT INTO pc_escritorio (nombre_pc_escritorio, id_procesador, id_almacenamiento, id_ram, id_tarjeta_video, descripcion_pc_escritorio) VALUES ('$nombre','$procesador','$almacenamiento','$ram','$tarjetavideo','$descripcion')");
        if(!$cons){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "PC de Escritorio Registrado";
            echo '<script>console.log("PC_ESCRITORIO '.$nombre.' REGISTRADO )</script>';
        }
        $cons2 = $mysqli->query("SELECT * FROM pc_escritorio WHERE nombre_pc_escritorio = '$nombre' AND descripcion_pc_escritorio='$descripcion'");
        if(!$cons2){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "PC Escritorio seleccionado";
        }
        $escritorio = $cons2->fetch_array(MYSQLI_ASSOC);
        $id_pc_escritorio = $escritorio['id_pc_escritorio'];
        $cons3 = $mysqli->query("INSERT INTO producto (tipo_producto, id_tienda, id_portatil, id_pc_escritorio, id_accesorio, id_presupuesto, foto_producto, precio_producto, descuento_producto) VALUES ('$tipo','$tienda','4','$id_pc_escritorio','1', '1','$ruta','$precio','$descuento')");
        if(!$cons3){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "Producto Registrado";
        }
        break;



        default:
        $procesador = $_POST['procesador'];
        $almacenamiento = $_POST['almacenamiento'];
        $ram = $_POST['ram'];
        $tarjetavideo = $_POST['tarjetavideo'];
    
        $cons = $mysqli->query("INSERT INTO presupuesto (nombre_presupuesto, id_procesador, id_almacenamiento, id_ram, id_tarjeta_video, descripcion_presupuesto) VALUES ('$nombre','$procesador','$almacenamiento','$ram','$tarjetavideo','$descripcion')");
        if(!$cons){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "Presupuesto Registrado";
            echo '<script>console.log("PC_ESCRITORIO '.$nombre.' REGISTRADO )</script>';
        }
        $cons2 = $mysqli->query("SELECT * FROM presupuesto WHERE nombre_presupuesto = '$nombre' AND descripcion_presupuesto='$descripcion'");
        if(!$cons2){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "Presupuesto seleccionado";
        }
        $presupuesto = $cons2->fetch_array(MYSQLI_ASSOC);
        $id_presupuesto = $presupuesto['id_presupuesto'];
        $cons3 = $mysqli->query("INSERT INTO producto (tipo_producto, id_tienda, id_portatil, id_pc_escritorio, id_accesorio, id_presupuesto, foto_producto, precio_producto, descuento_producto) VALUES ('$tipo','$tienda','4','4','1', '$id_presupuesto','$ruta','$precio','$descuento')");
        if(!$cons3){
            echo "Error: " . $mysqli->error, $mysqli->errno;
        }
        else{
            echo "Producto Registrado";
        }
        break;
    }
        ?>