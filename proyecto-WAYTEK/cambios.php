<?php
require('conexion_waytek.php');
require('comprobar.php');

$id = $_SESSION['id_tienda'];
//Cambiar nombre
if (isset($_POST['guardarnom']) && isset($_POST['cambio_nombre'])) {
    $nombre_nuevo = $_POST['cambio_nombre'];
    $cambionom = $mysqli->query("UPDATE tienda SET nombre_tienda='$nombre_nuevo' WHERE id_tienda='$id'");
    echo "<script>window.location='perfil_tienda.php'</script>";
}
//Cambiar imagen
if (isset($_POST['guardarimg']) && isset($_FILES['cambio_imagen'])) {
    //datos correspondientes a la imagen
    $nombre_img = $_FILES['cambio_imagen']['name'];
    $archivo = $_FILES['cambio_imagen']['tmp_name'];
    //ruta a guardar la imagen
    $ruta = "img/tienda";
    $ruta = $ruta . "/" . $nombre_img;
    //mover la imagen a la carpeta
    move_uploaded_file($archivo, $ruta);

    $cambioimg = $mysqli->query("UPDATE tienda SET foto_perfil_tienda='$ruta' WHERE id_tienda='$id'");
    echo "<script>window.location='perfil_tienda.php'</script>";
}
//Cambiar contraseña
if (isset($_POST['cambiarcontra']) && isset($_POST['contra_actual']) && isset($_POST['contra_nueva'])) {
    $consul_contra = $mysqli->query("SELECT contra_tienda FROM tienda WHERE id_tienda='$id'");
    $contraseña = $consul_contra->fetch_array(MYSQLI_ASSOC);
    $contraseña = $contraseña['contra_tienda'];
    $comprobacion = $_POST['contra_actual'];
    var_dump($contraseña);
    if ($comprobacion === $contraseña) {
        $nueva = $_POST['contra_nueva'];
        $cambio = $mysqli->query("UPDATE tienda SET contra_tienda='$nueva' WHERE id_tienda='$id'");
        echo "<script>window.location='perfil_tienda.php'</script>";
    } else {
        echo "<script>alert('El contraseña escrita no coincide con la actual')</scritp>";
    }
}
//Cambiar correo
if (isset($_POST['guardarcorreo']) && isset($_POST['cambio_correo'])) {
    $nuevocorreo = $_POST['cambio_correo'];
    $cambiocorreo = $mysqli->query("UPDATE tienda SET correo_tienda='$nuevocorreo' WHERE id_tienda='$id'");
    echo "<script>window.location='perfil_tienda.php'</script>";
}
//Cambiar teléfono
if (isset($_POST['guardartele']) && isset($_POST['cambio_tele'])) {
    $nuevotele = $_POST['cambio_tele'];
    $cambiotele = $mysqli->query("UPDATE tienda SET telefono_tienda='$nuevotele' WHERE id_tienda='$id'");
    echo "<script>window.location='perfil_tienda.php'</script>";
}
//Cambiar dirección
if (isset($_POST['guardardirec']) && isset($_POST['cambio_direc'])) {
    $nuevadirec = $_POST['cambio_direc'];
    $cambiodirec = $mysqli->query("UPDATE tienda SET direccion_tienda='$nuevadirec' WHERE id_tienda='$id'");
    echo "<script>window.location='perfil_tienda.php'</script>";
}
