<?php
//Conexion a la base de datos
require "conexion_waytek.php";

//Variable de busqueda
$consultaBusqueda = $_POST['busqueda'];

//Filtro Anti-xss
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";

//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	$consulta = $mysqli->query(
        "SELECT id_producto, tienda.nombre_tienda,tipo_producto, portatil.marca_portatil, portatil.nombre_portatil, accesorio.nombre_accesorio,pc_escritorio.nombre_pc_escritorio, presupuesto.nombre_presupuesto, foto_producto, fecha_publicacion_producto  FROM producto INNER JOIN tienda on producto.id_tienda=tienda.id_tienda INNER JOIN portatil on producto.id_portatil=portatil.id_portatil INNER JOIN accesorio on producto.id_accesorio=accesorio.id_accesorio INNER JOIN pc_escritorio on producto.id_pc_escritorio=pc_escritorio.id_pc_escritorio INNER JOIN presupuesto ON producto.id_presupuesto=presupuesto.id_presupuesto WHERE portatil.nombre_portatil LIKE '%$consultaBusqueda%' OR accesorio.nombre_accesorio  LIKE '%$consultaBusqueda%' OR pc_escritorio.nombre_pc_escritorio  LIKE '%$consultaBusqueda%' OR presupuesto.nombre_presupuesto  LIKE '%$consultaBusqueda%'");

        //Obtiene la cantidad de filas que hay en la consulta
	$filas = $consulta->num_rows();

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensaje = '<p class="display-2 text-center">No existen nombre con ese producto</p>';
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

        //La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
        $resultado=  '<div>'; 
        while ($datos = $consulta->fetch_array(MYSQLI_ASSOC)) {
            echo '<tr class="">';

            echo '<td class="p-3">' . $datos['id_producto'] . '</td>';

            echo '<td class="p-3">' . $datos['nombre_tienda'] . '</td>';

            switch ($datos['tipo_producto']) {
              case 'portátil':
                echo '<td class="p-3"><span class="d-block text-white rounded btn-primarydeg p-1"><i class="fas fa-laptop mr-2"></i>' . mb_strtoupper($datos['tipo_producto'], 'utf-8') . '</span></td>';
                echo '<td class="p-3">'. $datos['marca_portatil']. ' ' . $datos['nombre_portatil'] . '</td>';
                break;
              case 'accesorio':
                echo '<td class="p-3"><span class="d-block text-white rounded btn-primarydeg p-1"><i class="fas fa-keyboard mx-1"></i>' . mb_strtoupper($datos['tipo_producto'], 'utf-8') . '</span></td>';
                echo '<td class="p-3">' . $datos['nombre_accesorio'] . '</td>';
                break;
              case 'pc escritorio':
                echo '<td class="p-3"><span class="d-block text-white rounded btn-primarydeg p-1"><i class="fas fa-desktop mr-2"></i>' . mb_strtoupper($datos['tipo_producto'], 'utf-8') . '</span></td>';
                echo '<td class="p-3">' . $datos['nombre_pc_escritorio'] . '</td>';
                break;
              default:
              echo '<td class="p-3"><span class="d-block text-white rounded btn-primarydeg p-1"><i class="fas fa-list-alt mr-2"></i>' . mb_strtoupper($datos['tipo_producto'], 'utf-8') . '</span></td>';
                echo '<td class="p-3">' . $datos['nombre_presupuesto'] . '</td>';
                break;
            }

            echo '<td class="p-3"><img src="' . $datos['foto_producto'] . '" class="rounded" height="70px" alt=""></td>';
            echo "<script>moment.locale('es');
            moment.updateLocale('es', {
              relativeTime : {
                  past:   'Hace %s',
              }
          });
            </script>";
            echo '<script>
            var fecha_producto= moment("' . $datos['fecha_publicacion_producto'] . '", "YYYY-MM-DD, h:mm:ss");
            var fecha_calculada=(fecha_producto.fromNow());
            </script>';
            echo '<td class="p-3"><span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="bottom" title="' . $datos["fecha_publicacion_producto"] . '"><script>document.write(fecha_calculada);</script></span></td>';

            echo '<td class="text-center p-3 w-25">
            <button class="btn btn-modifi text-white border-0 btn-sm my-2"><i class="fas fa-pen mx-1"></i>Modificar</button>
            <button class="btn btn-elimi text-white border-0 btn-sm my-2 borrar_producto" data-id="'.$datos['id_producto'].'"><i class="fas fa-trash mx-1"></i>Eliminar</button>
            </td>';
            echo '</tr>';
          };//Fin while $resultados

	}; //Fin else $filas

}//Fin isset $consultaBusqueda
else{
  $consulta = $mysqli->query(
    "SELECT id_producto, tienda.nombre_tienda,tipo_producto, portatil.marca_portatil, portatil.nombre_portatil, accesorio.nombre_accesorio,pc_escritorio.nombre_pc_escritorio, presupuesto.nombre_presupuesto, foto_producto, fecha_publicacion_producto  FROM producto INNER JOIN tienda on producto.id_tienda=tienda.id_tienda INNER JOIN portatil on producto.id_portatil=portatil.id_portatil INNER JOIN accesorio on producto.id_accesorio=accesorio.id_accesorio INNER JOIN pc_escritorio on producto.id_pc_escritorio=pc_escritorio.id_pc_escritorio INNER JOIN presupuesto ON producto.id_presupuesto=presupuesto.id_presupuesto");

    while ($datos = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $mensaje .= '<tr class="">';

            echo '<td class="p-3">' . $datos['id_producto'] . '</td>';

            echo '<td class="p-3">' . $datos['nombre_tienda'] . '</td>';

            switch ($datos['tipo_producto']) {
              case 'portátil':
                echo '<td class="p-3"><span class="d-block text-white rounded btn-primarydeg p-1"><i class="fas fa-laptop mr-2"></i>' . mb_strtoupper($datos['tipo_producto'], 'utf-8') . '</span></td>';
                echo '<td class="p-3">'. $datos['marca_portatil']. ' ' . $datos['nombre_portatil'] . '</td>';
                break;
              case 'accesorio':
                echo '<td class="p-3"><span class="d-block text-white rounded btn-primarydeg p-1"><i class="fas fa-keyboard mx-1"></i>' . mb_strtoupper($datos['tipo_producto'], 'utf-8') . '</span></td>';
                echo '<td class="p-3">' . $datos['nombre_accesorio'] . '</td>';
                break;
              case 'pc escritorio':
                echo '<td class="p-3"><span class="d-block text-white rounded btn-primarydeg p-1"><i class="fas fa-desktop mr-2"></i>' . mb_strtoupper($datos['tipo_producto'], 'utf-8') . '</span></td>';
                echo '<td class="p-3">' . $datos['nombre_pc_escritorio'] . '</td>';
                break;
              default:
              echo '<td class="p-3"><span class="d-block text-white rounded btn-primarydeg p-1"><i class="fas fa-list-alt mr-2"></i>' . mb_strtoupper($datos['tipo_producto'], 'utf-8') . '</span></td>';
                echo '<td class="p-3">' . $datos['nombre_presupuesto'] . '</td>';
                break;
            }

            echo '<td class="p-3"><img src="' . $datos['foto_producto'] . '" class="rounded" height="70px" alt=""></td>';
            echo "<script>moment.locale('es');
            moment.updateLocale('es', {
              relativeTime : {
                  past:   'Hace %s',
              }
          });
            </script>";
            echo '<script>
            var fecha_producto= moment("' . $datos['fecha_publicacion_producto'] . '", "YYYY-MM-DD, h:mm:ss");
            var fecha_calculada=(fecha_producto.fromNow());
            </script>';
            echo '<td class="p-3"><span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="bottom" title="' . $datos["fecha_publicacion_producto"] . '"><script>document.write(fecha_calculada);</script></span></td>';

            echo '<td class="text-center p-3 w-25">
            <button class="btn btn-modifi text-white border-0 btn-sm my-2"><i class="fas fa-pen mx-1"></i>Modificar</button>
            <button class="btn btn-elimi text-white border-0 btn-sm my-2 borrar_producto" data-id="'.$datos['id_producto'].'"><i class="fas fa-trash mx-1"></i>Eliminar</button>
            </td>';
            echo '</tr>';
          };
}

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>