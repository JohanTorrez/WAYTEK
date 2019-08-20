<?php
require "../conexion_waytek.php";
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_NAME','proyecto_waytek');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysqli->set_charset('utf8');

if(mysqli_connect_errno()){
    die('No es posible conectar con la base de datos' . mysqli_connect_error());
}
$stmt = $mysqli->prepare("SELECT id_producto, tienda.nombre_tienda ,tipo_producto, portatil.marca_portatil, portatil.nombre_portatil, accesorio.nombre_accesorio,pc_escritorio.nombre_pc_escritorio, presupuesto.nombre_presupuesto, foto_producto, precio_producto, descuento_producto, precio_total_producto, fecha_publicacion_producto FROM producto INNER JOIN tienda on producto.id_tienda=tienda.id_tienda INNER JOIN portatil on producto.id_portatil=portatil.id_portatil INNER JOIN accesorio on producto.id_accesorio=accesorio.id_accesorio INNER JOIN pc_escritorio on producto.id_pc_escritorio=pc_escritorio.id_pc_escritorio INNER JOIN presupuesto ON producto.id_presupuesto=presupuesto.id_presupuesto ORDER BY id_producto DESC");

$stmt->execute();

$stmt->bind_result($id, $tienda, $tipo, $marcap, $nombrep, $nombreacc, $nombrepc, $nombrepre, $foto, $precio, $descuento, $preciototal, $fecha);

$producto = array();

while($fetch = $stmt->fetch()){
        $temp = array();
        $temp['id_producto'] = $id;
        $temp['id_tienda'] = $tienda;
        $temp['tipo_producto'] =$tipo;
    switch ($temp['tipo_producto']) {
        case 'portátil':
            $temp['nombre_portatil'] = $marcap.' '.$nombrep;
            break;
        case 'accesorio':
            $temp['nombre_accesorio'] = $nombreacc;
        break;

        case 'pc escritorio':
        $temp['nombre_pc_escritorio'] = $nombrepc;
        break;

        default:
        $temp['nombre_presupuesto'] = $nombrepre;
            break;
    }
        $temp['foto_producto'] = $foto;
        $temp['precio_producto'] = $precio; 
        $temp['descuento_producto'] = $descuento; 
        $temp['precio_total_producto'] = $preciototal; 
        $temp ['fecha_publicacion_producto'] = $fecha;

        array_push($producto, $temp);
}
$stmt->close();
$mysqli->close();
echo json_encode($producto, JSON_UNESCAPED_UNICODE);
?>