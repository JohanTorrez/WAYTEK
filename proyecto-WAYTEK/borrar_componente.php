<?php
header('Content-type:application/json; charset=UTF-8');
if($_POST['borradocom']){
    require "conexion_waytek.php";
    $id_componente= $_POST['borradocom'];
    $tipocom = $mysqli->query("SELECT * FROM componentes WHERE id_componente='$id_componente'");
    $cons = $mysqli->query("DELETE FROM componentes WHERE id_componente='$id_componente'");
    $finalcom = $tipocom->fetch_array(MYSQLI_ASSOC);
    //$componente = $finalcom['tipo_producto'];
    //var_dump($tipo);
    $componente = ucwords($finalcom['tipo_componente']) . ' borrado satisfactoriamente';
    if($cons && $tipocom){
        $response = array(
    'message' => $componente,
    'estado' => 'success'
);
    }
    else{
        $response = array(
            'message' => 'No se pudo borrar el '.$componente.'',
            'estado' => 'error'
        );
    }
    
}

echo json_encode($response,JSON_FORCE_OBJECT);
exit;
?>