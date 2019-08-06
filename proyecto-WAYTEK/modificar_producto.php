<?php
require "conexion_waytek.php";

//variables de php anterior con datos del producto a modificar
$id = $_POST['id'];
$tipo = $_POST['tipo'];

switch ($tipo) {
    case 'portátil':
        $id_portatil = $mysqli->query("SELECT id_portatil FROM producto WHERE id_producto='$id'");
        $id_portatil = $id_portatil->fetch_array(MYSQLI_ASSOC);
        $id_portatil = $id_portatil['id_portatil'];
        //Cambiar imagen
        if ($_FILES['foto_producto']['name'] != null) {
            //datos correspondientes a la imagen
            $nombre_img = $_FILES['foto_producto']['name'];
            $archivo = $_FILES['foto_producto']['tmp_name'];
            //ruta a guardar la imagen
            $ruta = "img/productos";
            $ruta = $ruta . "/" . $nombre_img;
            //mover la imagen a la carpeta
            move_uploaded_file($archivo, $ruta);
            $cambiofoto = $mysqli->query("UPDATE producto SET foto_producto='$ruta' WHERE id_producto='$id'");
            echo "Foto modificada";
        } else {
            echo "Foto vacia";
        }
        //Cambiar marca
        $marca_producto = $_POST['marca_producto'];
        if (isset($marca_producto)) {
            $cambiomarca = $mysqli->query("UPDATE portatil SET marca_portatil='$marca_producto' WHERE id_portatil='$id_portatil'");
            echo "Marca modificada";
        }
        //Cambiar nombre
        $nombre = $_POST['nombre_producto'];
        if (isset($nombre)) {
            $cambionom = $mysqli->query("UPDATE portatil SET nombre_portatil='$nombre' WHERE id_portatil='$id_portatil'");
            echo "Nombre modificado";
        }
        $procesador = $_POST['procesador'];
        if (isset($procesador)) {
            $cambioproc = $mysqli->query("UPDATE portatil SET id_procesador='$procesador' WHERE id_portatil='$id_portatil'");
            echo "Procesador modificado";
        }
        $almacenamiento = $_POST['almacenamiento'];
        if (isset($almacenamiento)) {
            $cambioalm = $mysqli->query("UPDATE portatil SET id_almacenamiento='$almacenamiento' WHERE id_portatil='$id_portatil'");
            echo "Almacenamiento modificado";
        }
        $ram = $_POST['ram'];
        if (isset($ram)) {
            $cambioram = $mysqli->query("UPDATE portatil SET id_ram='$ram' WHERE id_portatil='$id_portatil'");
            echo "Ram modificada";
        }
        $tarjetavideo = $_POST['tarjetavideo'];
        if (isset($tarjetavideo)) {
            $cambiovideo = $mysqli->query("UPDATE portatil SET id_ram='$tarjetavideo' WHERE id_portatil='$id_portatil'");
            echo "Tarjeta modificada";
        }
        $descripcion = $_POST['descripcion_producto'];
        if (isset($descripcion)) {
            $cambiodescrip = $mysqli->query("UPDATE portatil SET descripcion_portatil='$descripcion' WHERE id_portatil='$id_portatil'");
            echo "Descripción modificada";
        }
        $precio = $_POST['precio_producto'];
        if (isset($precio)) {
            $cambioprecio = $mysqli->query("UPDATE producto SET precio_producto='$precio' WHERE id_producto='$id'");
            echo "Precio modificado";
        }
        $descuento = $_POST['descuento_producto'];
        if (isset($descuento)) {
            $cambiodescuento = $mysqli->query("UPDATE producto SET descuento_producto ='$descuento' WHERE id_producto='$id'");
            echo "Descuento modificado";
        }
        break;
    case 'accesorio':
        $nombre = $_POST['nombre_accesorio'];
        $id_accesorio = $mysqli->query("SELECT id_accesorio FROM producto WHERE id_producto='$id'");
        //$cambionom = $mysqli->query("UPDATE accesorio SET nombre_accesorio='$nombre' WHERE id_accesorio='$id_accesorio'");    
        break;

    case 'pc escritorio':
        break;

    default:
        //presupuesto

        break;
}
