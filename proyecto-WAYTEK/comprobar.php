<?php
session_start();
if(isset($_SESSION['nombre_usuario_tienda'])){ 
} else {
    echo "<script>
    alert
    ('NO HAS INICIADO SESIÓN');
    window.location='ingreso.php'</script>";
}
?>