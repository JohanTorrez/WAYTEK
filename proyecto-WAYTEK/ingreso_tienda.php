<?php

    session_start();
    require "conexion_waytek.php";
    $ingreso=("select * from tienda where nombre_usuario_tienda='".$_POST['usuario']."'");
    $consul_ingre=mysqli_query($conexion_waytek,$ingreso);

    if ($datos=mysqli_fetch_array($consul_ingre)) {
        if ($_POST['contrase']==$datos['contra_tienda']) {
            $_SESSION[]==$datos[];
            $_SESSION[]==$datos[];
            $_SESSION[]==$datos[];
            $_SESSION[]==$datos[];
            $_SESSION[]==$datos[];
            $_SESSION[]==$datos[];

            echo '<script>window.location="proyecto-WAYTEK/administrador.php"</script>';
        } else {
            echo '<script>alert("CONTRASEÑA INCORRECTA");
            window.location="proyecto-WAYTEK/ingreso.php"</script>'
        }
    } else {
        echo '<script>alert("USUARIO NO VÁLIDO");
        window.location="proyecto-WAYTEK/ingreso.php"</script>'
    }


?>