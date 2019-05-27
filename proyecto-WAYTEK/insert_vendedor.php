<?php
include("conexion.php");

if(isset($_POST['nombre'])){
        $nombre_tienda=$_POST['nombre'];
        $docu_tienda=$_POST['documento'];
        $telefono_tienda=$_POST['telefono'];
        $ciudad_tienda=$_POST['ciudad'];
        $departamento_tienda=$_POST['departamento'];
        $direccion_tienda=$_POST['dire_residen'];
        $correo_tienda=$_POST['correo'];
        $usuario_tienda=$_POST['usuario'];
        $contra_tienda=$_POST['contrasena'];

        $ins_tienda = $sql->query("INSERT INTO tienda(nombre_tienda, docu_tienda, telefono_tienda, direccion_tienda, correo_tienda	nombre_usuario_tienda, contra_tienda, foto_perfil_tienda)VALUES('$nombre_tienda','$docu_tienda', '$telefono_tienda', '$direccion_tienda','$correo_tienda', '$usuario_tienda', '$contra_tienda')");

        if(!$ins_tienda){
            echo "Registro Exitoso"
        }
        else{
            echo "Registro fallido" . $sql->errorno " " . $sql->error;
        }
      }

      
?>

