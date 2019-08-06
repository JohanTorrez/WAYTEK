<?php
header('Content-type:application/json; charset=UTF-8');

if($_POST['delete']){
    require "conexion_waytek.php";
    $id_producto= intval($_POST['delete']);
    $cons = $mysqli->query("DELETE FROM producto WHERE id_producto='$id_producto'");
    if($cons){
        $response = array(
            'message' => 'Borrado satisfactorio',
            'estado' => 'success'
        );
    }
    else{
        $response = array(
            'message' => 'No se pudo borrar el registro',
            'estado' => 'Error'
        );
    }
}
echo json_encode($response);
exit;
?>