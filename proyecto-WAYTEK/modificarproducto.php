<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap_admin.css">
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">-->
    <!-- Fin Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <title>Modificar productos | WAYTEK</title>
    <!--End Required meta tags -->
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script src="sweetalert/sweetalert2.js"></script>
    <link rel="stylesheet" href="sweetalert/sweetalert2.css">
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <!--<script src="ingresar_producto.js"></script>-->
    <script src="https://kit.fontawesome.com/d7d86530ac.js"></script>
    <script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/moment-with-locales.js"></script>
    <script src="js/filtros-form.js"></script>
    <script src="js/filtro-modif.js"></script>
    <script src="js/modificar_producto.js"></script>
    <script src="js/functions.js"></script>
</head>

<body>
    <?php
    require "conexion_waytek.php";
    require "comprobar.php";
    ?>

    <nav class="navbar navbar-expand pl-3 pr-4 py-0 pb-2 pt-3 justify-content-between">
        <div class="d-inline">
            <h3 class="mt-1 mr-2 text-white d-inline" href="$" target="_blank"><strong>WAYTEK</strong></h3>
            <a class="navbar-brand text-white btn-primarydeg rounded px-2 py-1 text-wrap" href="administrador.php">Tienda</a>
        </div>
        <div class="d-flex">

            <h5 class="mx-3 text-white my-2"><?= $_SESSION['nombre_tienda'] ?></h5>
            <img class="rounded-circle mr-3 my-auto" width="40rem" height="40rem" src="<?= $_SESSION['foto_perfil_tienda'] ?>" id="dropdownMenuButton1f" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="btn-group">
                <button type="button" class="btn rounded-left btn-primarydeg text-white">
                    <a class="text-decoration-none text-white" href="perfil_tienda.php">Perfil
                    </a>
                </button>
                <button type="button" class="btn text-white btn-primarydeg dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                    <span class="sr-only">Palanca de dropwdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right mt-2">
                    <form class="form m-0" action="cerrar_sesion.php" method="post">
                        <input class="dropdown-item btn-elimi text-white rounded-bottom" type="submit" value="Cerrar sesión" name="cerrar">
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <br>

    <div class="container-fluid mt-0 pt-0">
        <div class="row">
            <div class="col-12">
                <div class="card d-flex justify-content-center">
                    <div class="card-body">
                        <h5 class="display-4 text-center text-dark">Editar producto</h5>
                        <div class="form">


                            <form id="form-modificar" action="modificar_producto.php" class="p-2" method="post" enctype="multipart/form-data">

                                <div class="form-row">
                                    <div class="form-group col-12 overflow-hidden pr-2">
                                        <?php
                                        $id = $_GET['id'];
                                        $tipo = $_GET['tipo'];
                                        echo '<input type="hidden" name="id" value="'.$id.'">';
                                        echo '<input type="hidden" name="tipo" value="'.$tipo.'">';

                                        switch ($tipo) {
                                            case 'portátil':
                                                $rnombre = 'nombre_portatil';
                                                $rdescripcion = 'descripcion_portatil';
                                                break;
                                            case 'accesorio':
                                                $rnombre = 'nombre_accesorio';
                                                $rdescripcion = 'descripcion_accesorio';
                                                break;

                                            case 'pc escritorio':
                                                $rnombre = 'nombre_pc_escritorio';
                                                $rdescripcion = 'descripcion_pc_escritorio';
                                                break;

                                            default:
                                                $rnombre = 'nombre_presupuesto';
                                                $rdescripcion = 'descripcion_presupuesto';
                                                break;
                                        }

                                        $valoresp = $mysqli->query("SELECT id_producto, tienda.nombre_tienda,tipo_producto, portatil.marca_portatil, portatil.nombre_portatil, portatil.id_procesador, portatil.id_almacenamiento, portatil.id_ram, portatil.id_tarjeta_video, portatil.descripcion_portatil, accesorio.id_accesorio, accesorio.nombre_accesorio, accesorio.descripcion_accesorio, pc_escritorio.nombre_pc_escritorio, pc_escritorio.descripcion_pc_escritorio,presupuesto.nombre_presupuesto, presupuesto.descripcion_presupuesto, fecha_publicacion_producto, foto_producto, precio_producto, descuento_producto, precio_total_producto FROM producto INNER JOIN categoria INNER JOIN tienda on producto.id_tienda=tienda.id_tienda INNER JOIN portatil on producto.id_portatil=portatil.id_portatil INNER JOIN accesorio on producto.id_accesorio=accesorio.id_accesorio INNER JOIN pc_escritorio on producto.id_pc_escritorio=pc_escritorio.id_pc_escritorio INNER JOIN presupuesto ON producto.id_presupuesto=presupuesto.id_presupuesto WHERE id_producto='$id'");
                                        $row = $valoresp->fetch_array(MYSQLI_ASSOC);

                                        echo '<div class="text-center">
                                        <img src="' . $row['foto_producto'] . '" width="300">
                                        </div>
                                        <label for="foto">Foto</label>
                                        <div class="custom-file">';
                                        ?>

                                        <input type="file" class="custom-file-input" id="customFile" name="foto_producto">
                                        <label class="custom-file-label" for="customFile">Elige una foto</label>
                                    </div>
                                </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12" id="marcae">
                                <label for="marca_producto">Marca</label>
                                <select name="marca_producto" id="marca_producto" class="form-control" required>
                                    <?php
                                    echo '<option selected value="'.$row['marca_portatil'].'">Actual: ' . $row['marca_portatil'] . '</option>';
                                    ?>
                                    <option value="Sin Marca">Sin Marca</option>
                                    <option value="Acer">Acer</option>
                                    <option value="ASUS">ASUS</option>
                                    <option value="HP">HP</option>
                                    <option value="Lenovo">Lenovo</option>
                                    <option value="DELL">Dell</option>
                                    <option value="MSI">MSI</option>
                                    <option value="Toshiba">Toshiba</option>
                                    <option value="Samsung">Samsung</option>
                                    <option value="Apple">Apple</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-row">

                            <div class="form-group col-12">
                                <label for="nombre_producto">Nombre del producto</label>
                                <?php

                                echo '<input type="text" class="form-control" name="nombre_producto" required id="nombre_producto" autocomplete="off" value="' . $row['' . $rnombre . ''] . '">';
                                ?>

                            </div>
                        </div>

                        <div class="form-partese">
                            <div class="form-row">
                                <div class="form-group col-6"><label for="procesador">Procesador</label><select name="procesador" class="form-control">
                                        <?php
                                        $cons_procesador = $mysqli->query("SELECT * FROM procesador WHERE NOT nombre_procesador='No aplica'");
                                        $idp = $row['id_procesador'];
                                        $cons_procesador_actual = $mysqli->query("SELECT * FROM procesador WHERE NOT nombre_procesador='No aplica' AND id_procesador='$idp'");
                                        $procesador = $cons_procesador_actual->fetch_array(MYSQLI_ASSOC);

                                        echo '<option selected value="' . $procesador['id_procesador'] . '">Actual: ' . $procesador['marca_procesador'], ' ', $procesador['nombre_procesador'] . ' ' . $procesador['frecuencia_procesador'] . ' Ghz' . '</option>';

                                        while ($procesadores = $cons_procesador->fetch_array(MYSQLI_ASSOC)) {
                                            echo '<option value="' . $procesadores['id_procesador'] . '">' . $procesadores['marca_procesador'], ' ', $procesadores['nombre_procesador'] . ' ' . $procesadores['frecuencia_procesador'] . ' Ghz' . '</option>';
                                        }

                                        ?>
                                    </select></div>
                                <div class="form-group col-6">
                                    <label for="almacenamiento">Almacenamiento</label>
                                    <select name="almacenamiento" class="form-control" id="">
                                        <?php
                                        $cons_almacenamiento = $mysqli->query("SELECT * FROM almacenamiento WHERE NOT nombre_almacenamiento='No aplica'");

                                        $ida = $row['id_almacenamiento'];
                                        $cons_almacenamiento_actual = $mysqli->query("SELECT * FROM almacenamiento WHERE NOT nombre_almacenamiento='No aplica' AND id_almacenamiento='$ida'");
                                        $almacenamiento = $cons_almacenamiento_actual->fetch_array(MYSQLI_ASSOC);

                                        echo '<option value="' . $almacenamiento['id_almacenamiento'] . '">Actual: ' . $almacenamiento['marca_almacenamiento'], ' ', $almacenamiento['nombre_almacenamiento'] . ' ' . $almacenamiento['tipo_almacenamiento'] . ' ' . $almacenamiento['capacidad_almacenamiento'] . ' ' . $almacenamiento['unidad_almacenamiento'] . ' ' . $almacenamiento['formato_almacenamiento'] . '</option>';

                                        while ($almacenamientos = $cons_almacenamiento->fetch_array(MYSQLI_ASSOC)) {
                                            echo '<option value="' . $almacenamientos['id_almacenamiento'] . '">' . $almacenamientos['marca_almacenamiento'], ' ', $almacenamientos['nombre_almacenamiento'] . ' ' . $almacenamientos['tipo_almacenamiento'] . ' ' . $almacenamientos['capacidad_almacenamiento'] . ' ' . $almacenamientos['unidad_almacenamiento'] . ' ' . $almacenamientos['formato_almacenamiento'] . '</option>';
                                        }

                                        ?>
                                    </select></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6"><label for="ram">Memoria RAM</label>
                                    <select name="ram" class="form-control">
                                        <?php
                                        $cons_ram = $mysqli->query("SELECT * FROM ram WHERE NOT nombre_ram='No aplica'");
                                        $idr = $row['id_ram'];
                                        $cons_ram_actual = $mysqli->query("SELECT * FROM ram WHERE id_ram='$idr'");
                                        $ram_a = $cons_ram_actual->fetch_array(MYSQLI_ASSOC);

                                        echo '<option value="' . $ram_a['id_ram'] . '">Actual: ' . $ram_a['marca_ram'] . ' ' . $ram_a['nombre_ram'] . ' ' . $ram_a['capacidad_ram'] . ' GB ' . $ram_a['tipo_ram'] . ' ' . $ram_a['distribucion_ram'] . ' ' . $ram_a['forma_ram'] . '</option>';

                                        while ($ram = $cons_ram->fetch_array(MYSQLI_ASSOC)) {
                                            echo '<option value="' . $ram['id_ram'] . '">' . $ram['marca_ram'] . ' ' . $ram['nombre_ram'] . ' ' . $ram['capacidad_ram'] . ' GB ' . $ram['tipo_ram'] . ' ' . $ram['distribucion_ram'] . ' ' . $ram['forma_ram'] . '</option>';
                                        }

                                        ?>
                                    </select></div>
                                <div class="form-group col-6"><label for="tarjetavideo">Tarjeta de Video</label><select name="tarjetavideo" class="form-control" id="">
                                        <?php
                                        $cons_tarjetas = $mysqli->query("SELECT * FROM tarjeta_video WHERE NOT nombre_tarjeta_video='No aplica'");

                                        $idt = $row['id_tarjeta_video'];
                                        $cons_tarjeta_actual = $mysqli->query("SELECT * FROM tarjeta_video WHERE id_tarjeta_video='$idt'");
                                        $tarjeta = $cons_tarjeta_actual->fetch_array(MYSQLI_ASSOC);

                                        echo '<option value="' . $tarjeta['id_tarjeta_video'] . '">Actual: ' . $tarjeta['marca_tarjeta_video'], ' ', $tarjeta['nombre_tarjeta_video'] . ' ' . $tarjeta['vram_tarjeta_video'] . ' GB ' . $tarjeta['tipo_tarjeta_video'], '</option>';


                                        while ($tarjetas = $cons_tarjetas->fetch_array(MYSQLI_ASSOC)) {
                                            echo '<option value="' . $tarjetas['id_tarjeta_video'] . '">' . $tarjetas['marca_tarjeta_video'], ' ', $tarjetas['nombre_tarjeta_video'] . ' ' . $tarjetas['vram_tarjeta_video'] . ' GB ' . $tarjetas['tipo_tarjeta_video'], '</option>';
                                        }

                                        ?>
                                    </select></div>
                            </div>
                        </div>


                        <div class="form-accesorio" id="categoriaa">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="categoria_accesorio">Categoría</label>
                                    <select class="form-control" name="categoria_accesorio" id="categoria_accesorio">
                                        <?php
                                        $consul = $mysqli->query("SELECT id_categoria, nombre_categoria FROM categoria WHERE NOT nombre_categoria='No aplica'");


                                        $id_accesorio = $row['id_accesorio'];
                                        $categoria = $mysqli->query("SELECT * FROM accesorio INNER JOIN categoria ON accesorio.id_categoria=categoria.id_categoria WHERE id_accesorio='$id_accesorio'");
                                        $rowc = $categoria->fetch_array(MYSQLI_ASSOC);

                                        echo '<option selected value="' . $rowc['id_categoria'] . '">Actual: ' . $rowc['nombre_categoria'] . '</option>';
                                        while ($datos = $consul->fetch_array(MYSQLI_ASSOC)) {

                                            echo '<option value="' . $datos['id_categoria'] . '">' . $datos['nombre_categoria'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <?php
                                echo '<label for="descripcion_producto">Descripción</label>
                                        <textarea class="form-control" name="descripcion_producto" id="descripcion_producto" required>' . $row['' . $rdescripcion . ''] . '</textarea>';
                                ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="precio">Precio</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="validationTooltipUsernamePrepend">$</span>
                                    </div>
                                    <?php

                                    echo '<input type="text" class="form-control" name="precio_producto" placeholder="Ingrese el precio del producto" required id="precio_producto" autocomplete="off" value="' . $row['precio_producto'] . '">';
                                    ?>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="descuento">Descuento</label>
                                <?php
                                echo '
                                <input type="descuento" class="form-control" name="descuento_producto" placeholder="Descuento en porcentaje" id="descuento_producto" autocomplete="off" value="' . $row['descuento_producto'] . '">';
                                ?>
                                <small class="text-muted">Predeterminado 0%</small>
                            </div>
                        </div>
                        <input type="submit" id="modificar" class="btn btn-lg rounded-lg btn-primarydeg text-white btn-block" value="Modificar">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>