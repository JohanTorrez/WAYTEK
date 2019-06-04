<?php
session_start();
if(isset($_POST['cerrar'])) {
    echo '<script>window.location="ingreso.php"</script>';
    session_destroy();
}
else{
    echo '<script>alert("NO HAY SESIÓN ACTIVA)</script>';
}
?>