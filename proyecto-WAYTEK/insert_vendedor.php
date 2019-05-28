<?php
include("conexion_waytek.php");
if(isset($_POST['nombre']) && isset ($_POST['documento']) && isset ($_POST['telefono']) && isset ($_POST['ciudad'])){
        $nombre_tienda=$_POST['nombre'];
        $docu_tienda=$_POST['documento'];
        $telefono_tienda=$_POST['telefono'];
        $ciudad_tienda=$_POST['ciudad'];
        $departamento_tienda=$_POST['departamento'];
        $direccion_tienda=$_POST['dire_residen'];
        $correo_tienda=$_POST['correo'];
        $usuario_tienda=$_POST['usuario'];
        $contra_tienda=$_POST['contrasena'];

        //datos correspondientes a la imagen
        $nombre_img=$_FILES['imagen']['name'];
        $archivo=$_FILES['imagen']['tmp_name'];

        //ruta a guardar la imagen
        $ruta="img";
        $ruta=$ruta."/".$nombre_img;

        //mover la imagen a la carpeta
        move_uploaded_file($archivo, $ruta);

        $inser_tienda = $mysqli->query("INSERT INTO tienda(nombre_tienda, docu_tienda, telefono_tienda, direccion_tienda, correo_tienda, nombre_usuario_tienda, contra_tienda, foto_perfil_tienda)VALUES('$nombre_tienda','$docu_tienda', '$telefono_tienda', '$direccion_tienda', '$correo_tienda', '$usuario_tienda',  '$contra_tienda', '$ruta')");
        if(!$inser_tienda){
            echo "Registro fallido - " . ($mysqli->errno). " " . ($mysqli->error);
        }
        else{
            echo "Registro Exitoso";
        }
      }
      
?>
