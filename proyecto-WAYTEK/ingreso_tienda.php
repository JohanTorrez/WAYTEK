<?php

    require "conexion_waytek.php";
    session_start();
    $ingreso=("select * from tienda where nombre_usuario_tienda='".$_POST['usuario']."'");
    $consul_ingre=mysqli_query($mysqli,$ingreso);

    if ($datos=mysqli_fetch_array($consul_ingre)) {
        if ($_POST['contrase']==$datos['contra_tienda']) {
            if ($_POST['usuario']==$datos['nombre_usuario_tienda']) {

                $_SESSION['nom_usua']=$datos['nombre_usuario_tienda'];
                $_SESSION['nombre_tienda']=$datos['nombre_tienda'];
                $_SESSION['id_tienda']=$datos['id_tienda'];
                $_SESSION['correo_tienda']=$datos['correo_tienda'];
                $_SESSION['telefono_tienda']=$datos['telefono_tienda'];
                $_SESSION['foto_perfil_tienda']=$datos['foto_perfil_tienda'];
                $_SESSION['direc_tienda']=$datos['direccion_tienda'];
                $_SESSION['contraseña_tienda']=$datos['contra_tienda'];

                echo '<script>window.location="administrador.php"</script>';

            } else {
                echo '<script>alert("NOMBRE DE USUARIO INCORRECTO");
                window.location="ingreso.php"</script>';
            }

        } else {
            echo '<script>alert("CONTRASEÑA INCORRECTA");
            window.location="ingreso.php"</script>';
        }
    } else {
        echo '<script>alert("USUARIO NO VÁLIDO");
        window.location="ingreso.php"</script>';
    }


?>
