<?php
session_start();
require('conexion_waytek.php');
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$consulta_tienda = ("SELECT * from tienda WHERE correo_tienda ='$correo'");
$cons = $mysqli->query($consulta_tienda);
if($datos = $cons->fetch_array(MYSQLI_ASSOC))
{
if($contrasena == $datos['contra_tienda'])
{
    $_SESSION['id_tienda'] = $datos['id_tienda'];
    $_SESSION['nombre_tienda'] = $datos['nombre_tienda'];
    $_SESSION['telefono_tienda'] = $datos['telefono_tienda'];
    $_SESSION['direccion_tienda'] = $datos['direccion_tienda'];
    $_SESSION['correo_tienda'] = $datos['correo_tienda'];
    $_SESSION['nombre_usuario_tienda']=$datos['nombre_usuario_tienda'];
    $_SESSION['foto_perfil_tienda']=$datos['foto_perfil_tienda'];
    $_SESSION['fecha_ingreso_tienda']=$datos['fecha_ingreso_tienda'];

    echo "<script>window.location='administrador.php'</script>";
}
else{
    echo "<script>alert('CONTRASEÑA INCORRECTA');
    window.location='ingreso.php'</script>";
}
}
else{
    echo "<script>alert('EL USUARIO INGRESADO NO EXISTE, POR FAVOR REGISTRATE');
    window.location='registro.php'</script>";
}
?>