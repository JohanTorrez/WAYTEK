<?php
header('Content-type:application/json; charset=UTF-8');
$response = array();

if($_POST['delete']){
    require "conexion_waytek.php";
    $id_producto= intval($_POST['delete']);
    $cons = $mysqli->query("DELETE FROM producto WHERE id_producto='$id_producto'");
    if($cons){
        $response['message'] = 'Producto Borrado satisfactoriamente';
        $response['status'] = 'success';
        echo "console.log('LISTO')";
    }
    else{
        $response['message'] = 'No se pudo borrar el producto';
        $response['status'] = 'Error';
        echo "console.log('nAHH')";
    }
    echo json_encode($response);
 }
?>