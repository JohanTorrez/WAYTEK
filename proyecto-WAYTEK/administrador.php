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
  <title>Panel de administración | WAYTEK</title>
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
  <!--<script src="js/filtro-modif.js"></script>-->
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
      <div class="col-md-1 col-sm-1 col-lg-1 mr-5">
        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link active" id="v-pills-productos-tab" data-toggle="pill" href="#v-pills-productos" role="tab" aria-controls="v-pills-productos" aria-selected="true">Productos</a>
          <a class="nav-link" id="v-pills-componentes-tab" data-toggle="pill" href="#v-pills-componentes" role="tab" aria-controls="v-pills-componentes" aria-selected="false">Componentes</a>

        </div>
      </div>

      <div class="card w-85 pl-4 pr-2 py-2 ml-3">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-productos" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <div class="row col-12 d-flex justify-content-between px-0 mx-0 py-2">
              <h2 class="d-block my-3">Productos registrados</h2>
              <div class="row mr-1">
                <div class="btn-group">
                  <div class="col-6 my-auto pr-0">
                    <form class="form" method="post">
                      <input class="form-control" type="text" placeholder="Buscar" aria-label="Search" name="busqueda" id="busqueda">
                    </form>
                  </div>
                  <div class="col-6 my-auto">
                    <button type="button" class="btn btn-block rounded-lg btn-primarydeg text-white" data-toggle="modal" data-target="#productosModal"><i class="fas fa-plus mr-2"></i>Agregar productos</button>
                  </div>
                </div>

              </div>
              <!-- Modal -->
              <div class="modal fade" id="productosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-violetdegreen text-white">
                      <h5 class="modal-title text-dark" id="exampleModalLabel">AGREGAR PRODUCTOS</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form id="form_producto" action="ingresar_producto.php" class="form p-2" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                          <div class="form-group col-6" id="tipo">
                            <label for="tipo_producto">Tipo de producto</label>
                            <select name="tipo_producto" id="tipo_producto" class="form-control" id="tipo_producto" required>
                              <option disabled selected>Selecciona producto</option>
                              <option value="portátil">Portátil</option>
                              <option value="pc escritorio">PC Escritorio</option>
                              <option value="presupuesto">Presupuesto</option>
                              <option value="accesorio">Accesorio</option>
                            </select>
                          </div>
                          

                          <div class="form-group col-6" id="marca">
                            <label for="marca_producto">Marca</label>
                            <select name="marca_producto" id="marca_producto" class="form-control" required>
                              <option disabled selected>Selecciona una marca</option>
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
                          <div class="form-group col-12 overflow-hidden pr-2">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="foto_producto">
                              <label class="custom-file-label" for="customFile">Elige una foto</label>
                            </div>
                          </div>
                        </div>

                        <div class="form-row">

                          <div class="form-group col-12">
                            <label for="nombre_producto">Nombre del producto</label>
                            <input type="text" class="form-control" name="nombre_producto" required id="nombre_producto" autocomplete="off">
                          </div>
                        </div>

                        <div class="form-partes">
                          <div class="form-row">
                            <div class="form-group col-6"><label for="procesador">Procesador</label><select name="procesador" class="form-control" id="">
                                <option selected disabled>Elegir procesador</option>
                                <?php
                                $cons_procesador = $mysqli->query("SELECT * FROM procesador WHERE NOT nombre_procesador='No aplica'");
                                while ($procesadores = $cons_procesador->fetch_array(MYSQLI_ASSOC)) {
                                  echo '<option value="' . $procesadores['id_procesador'] . '">' . $procesadores['marca_procesador'], ' ', $procesadores['nombre_procesador'] .' '.$procesadores['frecuencia_procesador'] . ' Ghz' .'</option>';
                                }

                                ?>
                              </select></div>
                            <div class="form-group col-6">
                              <label for="almacenamiento">Almacenamiento</label>
                              <select name="almacenamiento" class="form-control" id="">
                                <option selected disabled>Elegir Almacenamiento</option>
                                <?php
                                $cons_almacenamiento = $mysqli->query("SELECT * FROM almacenamiento WHERE NOT nombre_almacenamiento='No aplica'");
                                while ($almacenamientos = $cons_almacenamiento->fetch_array(MYSQLI_ASSOC)) {
                                  echo '<option value="' . $almacenamientos['id_almacenamiento'] . '">' . $almacenamientos['marca_almacenamiento'], ' ', $almacenamientos['nombre_almacenamiento'] . ' ' . $almacenamientos['tipo_almacenamiento'].' '. $almacenamientos['capacidad_almacenamiento'] . ' ' . $almacenamientos['unidad_almacenamiento'] .' '. $almacenamientos['formato_almacenamiento']. '</option>';
                                }

                                ?>
                              </select></div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-6"><label for="ram">Memoria RAM</label><select name="ram" class="form-control" id="">
                                <option selected disabled>Elegir RAM</option>
                                <?php
                                $cons_ram = $mysqli->query("SELECT * FROM ram WHERE NOT nombre_ram='No aplica'");
                                while ($ram = $cons_ram->fetch_array(MYSQLI_ASSOC)) {
                                  echo '<option value="' . $ram['id_ram'] . '">' . $ram['marca_ram'], ' ', $ram['nombre_ram'] . ' ' . $ram['capacidad_ram'] . ' GB ' . $ram['tipo_ram']. ' '. $ram['distribucion_ram'] . ' ' . $ram['forma_ram'].'</option>';
                                }

                                ?>
                              </select></div>
                            <div class="form-group col-6"><label for="tarjetavideo">Tarjeta de Video</label><select name="tarjetavideo" class="form-control" id="">
                                <option selected disabled>Elegir Tarjeta de Video</option>
                                <?php
                                $cons_tarjetas = $mysqli->query("SELECT * FROM tarjeta_video WHERE NOT nombre_tarjeta_video='No aplica'");
                                while ($tarjetas = $cons_tarjetas->fetch_array(MYSQLI_ASSOC)) {
                                  echo '<option value="' . $tarjetas['id_tarjeta_video'] . '">' . $tarjetas['marca_tarjeta_video'], ' ', $tarjetas['nombre_tarjeta_video'] . ' ' . $tarjetas['vram_tarjeta_video'] . ' GB ' . $tarjetas['tipo_tarjeta_video'], '</option>';
                                }

                                ?>
                              </select></div>
                          </div>
                        </div>


                        <div class="form-accesorio">
                          <div class="form-row">
                            <div class="form-group col-12">
                              <label for="categoria_accesorio">Categoría</label>
                              <select class="form-control" name="categoria_accesorio" id="categoria_accesorio">
                                <option disabled selected>Selecciona una categoria</option>
                                <?php
                                $consul = $mysqli->query("SELECT id_categoria, nombre_categoria FROM categoria WHERE NOT nombre_categoria='No aplica'");

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
                            <label for="descripcion_producto">Descripción</label>
                            <textarea class="form-control" name="descripcion_producto" id="descripcion_producto" required></textarea>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-6">
                            <label for="precio">Precio</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend">$</span>
                              </div>
                              <input type="text" class="form-control" name="precio_producto" placeholder="Ingrese el precio del producto" required id="precio_producto" autocomplete="off">
                            </div>
                          </div>
                          <div class="form-group col-6">
                            <label for="descuento">Descuento</label>
                            <input type="descuento" class="form-control" name="descuento_producto" placeholder="Descuento en porcentaje" id="descuento_producto" autocomplete="off">
                            <small class="text-muted">Predeterminado 0%</small>
                          </div>
                        </div>
                        <input type="submit" class="btn btn-lg rounded-lg btn-primarydeg text-white btn-block" value="Agregar">
                      </form>
                    </div>
                  </div>
                </div>
              </div>



             





            </div>

            <div class="row table-responsive">
              <table id="tabla_productos" class="table table-sm shadow-none ml-1 mr-0 mt-4 d-table table-borderless">
                <thead class="p-3 mb-5 bg-white rounded border-bottom text-center">
                  <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Tienda</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Fecha publicación</th>
                    <th scope="col" colspan="2">Acciones</th>
                  </tr>
                </thead>
                <tbody class="mb-5 bg-white rounded border-bottom text-center" id="tbody">
                  <?php
                  $id_tienda = $_SESSION['id_tienda'];
                  $cons = $mysqli->query("SELECT id_producto, tienda.nombre_tienda,tipo_producto, portatil.marca_portatil, portatil.nombre_portatil, accesorio.nombre_accesorio,pc_escritorio.nombre_pc_escritorio, presupuesto.nombre_presupuesto, foto_producto, fecha_publicacion_producto  FROM producto INNER JOIN tienda on producto.id_tienda=tienda.id_tienda INNER JOIN portatil on producto.id_portatil=portatil.id_portatil INNER JOIN accesorio on producto.id_accesorio=accesorio.id_accesorio INNER JOIN pc_escritorio on producto.id_pc_escritorio=pc_escritorio.id_pc_escritorio INNER JOIN presupuesto ON producto.id_presupuesto=presupuesto.id_presupuesto WHERE producto.id_tienda='$id_tienda' ORDER BY id_producto DESC");

                  if (!$cons) {
                    echo "Error en la consulta " . $mysqli->error;
                  }
                  while ($datos = $cons->fetch_array(MYSQLI_ASSOC)) {
                    echo '<tr id="P-'.$datos['id_producto'].'">';

                    echo '<td class="p-3">' . $datos['id_producto'] . '</td>';

                    echo '<td class="p-3">' . $datos['nombre_tienda'] . '</td>';

                    switch ($datos['tipo_producto']) {
                      case 'portátil':
                        echo '<td class="p-3"><span class="d-block text-white rounded btn-primarydeg p-1"><i class="fas fa-laptop mr-2"></i>' . mb_strtoupper($datos['tipo_producto'], 'utf-8') . '</span></td>';
                        echo '<td class="p-3">' . $datos['marca_portatil'] . ' ' . $datos['nombre_portatil'] . '</td>';
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
                    <form action="modificarproducto.php">
                    <button type="submit" class="btn btn-modifi text-white border-0 btn-sm my-2 modifip"><i class="fas fa-pen mx-1">
                    </i>Modificar
                    </button>
                    <input type="hidden" name="id" value="'.$datos['id_producto'].'">
                    <input type="hidden" name="tipo" value="'.$datos['tipo_producto'].'">
                    </form>';

                    echo '<button class="btn btn-elimi text-white border-0 btn-sm my-2 borrar_producto" data-id="' . $datos['id_producto'] . '"><i class="fas fa-trash mx-1"></i>Eliminar</button>
                    </td>';
                    echo '</tr>';
                  };
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="v-pills-componentes" role="tabpanel" aria-labelledby="v-pills-componentes-tab">

            <div class="row col-12 d-flex justify-content-between px-0 mx-0 py-2">
              <h2 class="d-block my-3">Componentes registrados</h2>
              <div class="btn-group form-inline mr-3">
                <form class="form">
                  <input class="form-control my-3 mr-3" type="search" placeholder="Buscar" aria-label="Search" name="busqueda2" id="busqueda2" onKeyUp="buscar();">
                </form>
                <button type="button" class="btn rounded-lg btn-primarydeg text-white" data-toggle="modal" data-target="#componentesModal">
                  <i class="fas fa-plus mr-2"></i>
                  Agregar componentes</button>

              </div>

              <!-- Modal -->
              <div class="modal fade" id="componentesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-violetdegreen text-white">
                      <h5 class="modal-title text-dark" id="exampleModalLabel">AGREGAR COMPONENTES</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="ingresar_componente.php" class="form p-2" method="post">

                        <div class="form-row">
                          <div class="form-group col-12" id="tipo-componente">
                            <label for="tipo_componente">Tipo de Componente</label>
                            <select name="tipo_componente" id="tipo_componente" class="form-control" required>
                              <option disabled selected>Elegir componente</option>
                              <option value="procesador">Procesador</option>
                              <option value="almacenamiento">Almacenamiento</option>
                              <option value="ram">Memoria RAM</option>
                              <option value="tarjeta de video">Tarjeta de Video</option>
                            </select>
                          </div>
                        </div>


                        <div class="form-procesador">
                          <div class="form-row" id="marca_procesador">
                            <div class="form-group col-12" id="select_mp">
                              <label for="marca_procesador">Marca</label>
                              <select name="marca_procesador" id="marca_procesador" class="form-control">
                                <option disabled selected>Selecciona una marca</option>
                                <option value="Intel">Intel</option>
                                <option value="AMD">AMD</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col-7">
                              <label for="nombre_procesador">Referencia del Procesador</label>
                              <input type="text" class="form-control" name="nombre_procesador">
                            </div>

                            <div class="form-group col-5">
                              <label for="frecuencia_procesador">Frecuencia</label>
                              <div class="input-group">
                                <input type="number" class="form-control" name="frecuencia_procesador" step="0.01" min="1" max="6">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="validationTooltipPrepend">Ghz</span>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col-4">
                              <div class="form-group">
                                <label for="nucleos_procesador">Núcleos</label>
                                <input type="number" class="form-control" name="nucleos_procesador" step="2" min="2" max="32">
                              </div>
                            </div>

                            <div class="form-group col-4">
                              <div class="form-group">
                                <label for="hilos_procesador">Hilos</label>
                                <input type="number" class="form-control" name="hilos_procesador" step="2" min="4" max="64">
                              </div>
                            </div>

                            <div class="form-group col-4">
                              <label for="consumo_procesador">Consumo</label>
                              <div class="input-group">
                                <input type="number" class="form-control" name="consumo_procesador" min="1">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="validationTooltipPrepend">W</span>
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="form-row">
                            <div class="form-group col-12">
                              <label for="video_procesador">Gráficos integrados</label>*
                              <input type="text" class="form-control " name="video_procesador">
                            <small>*en caso de no tener, escribe "No incorporado"</small>
                            </div>
                          </div>
                        </div>


                        <div class="form-almacenamiento">
                          <div class="form-row">
                            <div class="form-group col-12" id="select_ma">
                              <label for="marca_almacenamiento">Marca</label>
                              <select name="marca_almacenamiento" id="marca_almacenamiento" class="form-control">
                                <option disabled selected>Selecciona una marca</option>
                                <option value="Sin Marca">Sin Marca</option>
                                <option value="Western Digital">Western Digital</option>
                                <option value="Seagate">Seagate</option>
                                <option value="Corsair">Corsair</option>
                                <option value="Kingston">Kingston</option>
                                <option value="Hitachi">Hitachi</option>
                                <option value="PNY">PNY</option>
                                <option value="Maxtor">Maxtor</option>
                                <option value="Samsung">Samsung</option>
                                <option value="Toshiba">Toshiba</option>
                                <option value="Verbatim">Verbatim</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col-12">
                              <label for="nombre_almacenamiento">Referencia del Almacenamiento</label>*
                              <input type="text" class="form-control" name="nombre_almacenamiento" autocomplete="off">
                              <small>*en caso de no tener, escribe "Referencia Desconocida"</small>
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col-4">
                              <label for="capacidad_almacenamiento">Capacidad</label>
                              <input type="number" class="form-control" name="capacidad_almacenamiento" min="1">
                            </div>

                            <div class="form-group col-4">
                              <label for="unidad_almacenamiento">Unidad</label>
                              <select class="form-control" name="unidad_almacenamiento">
                                <option disabled selected>Selecciona</option>
                                <option value="GB">GB</option>
                                <option value="TB">TB</option>
                              </select>
                            </div>

                            <div class="form-group col-4">
                              <label for="tipo_almacenamiento">Tipo</label>
                              <select class="form-control" name="tipo_almacenamiento">
                                <option disabled selected>Selecciona</option>
                                <option value="SSD">SSD</option>
                                <option value="HDD">HDD</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col-6">
                              <label for="velocidad_almacenamiento">Velocidad</label>
                              <div class="input-group">
                                <input type="text" class="form-control" name="velocidad_almacenamiento">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="validationTooltipPrepend">MB/s</span>
                                </div>
                              </div>
                            </div>

                            <div class="form-group col-6">
                              <label for="formato_almacenamiento">Formato</label>
                              <select class="form-control" name="formato_almacenamiento" id="formato_almacenamiento">
                                <option disabled selected>Selecciona</option>
                                <option value="2.5 SATA3">2.5 SATA3</option>
                                <option value="3.5 SATA3">3.5 SATA3</option>
                                <option value="M.2">M.2</option>
                                <option value="NVMe">NVMe</option>
                                <option value="NVMe M.2">NVMe M.2</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="form-ram">
                          <div class="form-row">
                            <div class="form-group col-12" id="select_mr">
                              <label for="marca_ram">Marca</label>
                              <select name="marca_ram" id="marca_ram" class="form-control">
                                <option disabled selected>Selecciona una marca</option>
                                <option value="Sin Marca">Sin Marca</option>
                                <option value="Kingston">Kingston</option>
                                <option value="HyperX">HyperX</option>
                                <option value="G.Skill">G.Skill</option>
                                <option value="Corsair">Corsair</option>
                                <option value="Patriot">Patriot</option>
                                <option value="Ballistix">Ballistix</option>
                                <option value="Adata">Adata</option>
                                <option value="Crucial">Crucial</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col-7">
                              <label for="referencia_ram">Referencia de Memoria RAM</label>*
                              <input type="text" class="form-control" name="nombre_ram" autocomplete="off">
                              <small>*en caso de no tenerla, escribe "RAM"</small>
                            </div>

                            <div class="form-group col-5">
                              <label for="tipo_ram">Tipo de Memoria RAM</label>
                              <select class="form-control" name="tipo_ram" id="tipo_ram">
                                <option disabled selected>Selecciona</option>
                                <option value="DDR2">DDR2</option>
                                <option value="DDR3">DDR3</option>
                                <option value="DDR4">DDR4</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col-4">
                              <label for="capacidad_almacenamiento">Capacidad</label>
                              <div class="input-group">
                                <select class="form-control" name="capacidad_ram">
                                  <option disabled selected>Selecciona</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="4">4</option>
                                  <option value="8">8</option>
                                  <option value="16">16</option>
                                  <option value="32">32</option>
                                  <option value="64">64</option>
                                </select>
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="validationTooltipPrepend">GB</span>
                                </div>
                              </div>
                            </div>

                            <div class="form-group col-4">
                              <label for="distribucion_almacenamiento">Distribución</label>
                              <select class="form-control" name="distribucion_ram">
                                <option disabled selected>Selecciona</option>
                                <option value="2x1">2x1</option>
                                <option value="2x2">2x2</option>
                                <option value="4x1">4x1</option>
                                <option value="4x2">4x2</option>
                                <option value="8x1">8x1</option>
                                <option value="8x2">8x2</option>
                                <option value="8x4">8x4</option>
                                <option value="16x1">16x1</option>
                                <option value="16x2">16x2</option>
                                <option value="16x4">16x4</option>
                                <option value="32x1">32x1</option>
                                <option value="32x2">32x2</option>
                              </select>
                            </div>

                            <div class="form-group col-4">
                              <label for="forma_ram">Factor de forma</label>
                              <select class="form-control" name="forma_ram">
                              <option disabled selected>Selecciona</option>
                                <option value="DIMM">DIMM</option>
                                <option value="SO-DIMM">SO-DIMM</option>
                              </select>
                            </div>
                          </div>
                        </div>


                        <div class="form-tarjeta_video">
                          <div class="form-row">
                            <div class="form-group col-12" id="select_mt">
                              <label for="marca_tarjeta_video">Marca</label>
                              <select name="marca_tarjeta_video" id="marca_tarjeta_video" class="form-control">
                                <option disabled selected>Selecciona una marca</option>
                                <option value="Nvidia">Nvidia</option>
                                <option value="AMD">AMD</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col-12">
                              <label for="referencia_tarjetavideo">Referencia de la Tarjeta de Video</label>
                              <input type="text" class="form-control" name="nombre_tarjeta_video" autocomplete="off">
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col-4">
                              <label for="vram_tarjeta_video">Memoria VRAM</label>
                              <div class="input-group">
                                <input type="number" class="form-control" name="vram_tarjeta_video" min="1" max="20">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">GB</span>
                                </div>
                              </div>
                            </div>

                            <div class="form-group col-4">
                              <label for="tipo_tarjeta_video">Tipo de VRAM</label>
                              <select class="form-control" name="tipo_tarjeta_video">
                                <option disabled selected>Selecciona</option>
                                <option value="GDDR5">GDDR5</option>
                                <option value="GDDR5X">GDDR5X</option>
                                <option value="HBM">HBM</option>
                                <option value="HBM2">HBM2</option>
                              </select>
                            </div>

                            <div class="form-group col-4">
                              <label for="frecuencia_tarjeta_video">Frecuencia</label>
                              <div class="input-group">
                                <input type="number" class="form-control" name="frecuencia_tarjeta_video" min="100">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Mhz</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <input type="submit" class="btn btn-lg rounded-lg btn-primarydeg text-white btn-block" value="Agregar">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row table-responsive">
              <table id="example" class="table table-sm shadow-none ml-1 mr-0 mt-4 d-table table-borderless">
                <thead class="p-3 mb-5 bg-white rounded border-bottom text-center">
                  <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Componente</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha</th>
                    <th scope="col" colspan="2">Acciones</th>
                  </tr>
                </thead>
                <tbody class="mb-5 bg-white rounded border-bottom text-center">
                  <?php
                  $cons = $mysqli->query("SELECT id_componente, tipo_componente,procesador.marca_procesador, procesador.nombre_procesador, procesador.frecuencia_procesador, procesador.fecha_procesador, almacenamiento.marca_almacenamiento, almacenamiento.nombre_almacenamiento, almacenamiento.capacidad_almacenamiento, almacenamiento.unidad_almacenamiento, almacenamiento.tipo_almacenamiento, almacenamiento.formato_almacenamiento,almacenamiento.fecha_almacenamiento, ram.marca_ram, ram.nombre_ram, ram.capacidad_ram, ram.tipo_ram, ram.distribucion_ram, ram.forma_ram, ram.fecha_ram,  tarjeta_video.marca_tarjeta_video, tarjeta_video.nombre_tarjeta_video, tarjeta_video.vram_tarjeta_video, tarjeta_video.tipo_tarjeta_video, tarjeta_video.fecha_tarjeta_video FROM componentes INNER JOIN procesador ON componentes.id_procesador=procesador.id_procesador INNER JOIN almacenamiento ON componentes.`id_almacenamiento`=almacenamiento.id_almacenamiento INNER JOIN ram ON componentes.`id_ram`=ram.`id_ram` INNER JOIN tarjeta_video ON componentes.`id_tarjeta_video`=tarjeta_video.`id_tarjeta_video` WHERE NOT tipo_componente='No aplica' ORDER BY id_componente DESC");
                  while ($datos = $cons->fetch_array(MYSQLI_ASSOC)) {
                    echo '<tr id="C-'.$datos['id_componente'].'">';
                    echo '<td class="p-2">';
                    echo $datos['id_componente'] . '</td>';
                    switch ($datos['tipo_componente']) {
                      case 'procesador':
                        echo '<td class="p-3"><span class="text-white rounded btn-primarydeg p-2"><i class="fas fa-microchip mx-2"></i>' . strtoupper($datos['tipo_componente']) . '</span></td>';
                        break;
                      case 'almacenamiento':
                        echo '<td class="p-3"><span class="text-white rounded btn-primarydeg p-2"><i class="fas fa-hdd mx-2"></i>' . strtoupper($datos['tipo_componente']) . '</span></td>';
                        break;
                      case 'ram':
                        echo '<td class="p-3"><span class="text-white rounded btn-primarydeg p-2"><i class="fas fa-memory mx-2"></i>' . strtoupper($datos['tipo_componente']) . '</span></td>';
                        break;
                      default:
                        echo '<td class="p-3"><span class="text-white rounded btn-primarydeg p-2"><i class="fas fa-film mx-2"></i>' . strtoupper($datos['tipo_componente']) . '</span></td>';
                        break;
                    }
                    switch ($datos['tipo_componente']) {
                      case 'procesador':
                        echo '<td class="p-2">' . $datos['marca_procesador'] . ' ' . $datos['nombre_procesador'] . ' ' . $datos['frecuencia_procesador'] . ' Ghz</td>';
                        break;
                      case 'almacenamiento':
                        if ($datos['marca_almacenamiento'] == "Sin Marca") {
                          echo '<td class="p-2">' . $datos['nombre_almacenamiento'] . ' ' . $datos['capacidad_almacenamiento'] . ' ' . $datos['unidad_almacenamiento'] . ' ' . $datos['tipo_almacenamiento'] . ' ' . $datos['formato_almacenamiento'] . '</td>';
                        } else {
                          echo '<td class="p-2">' . $datos['marca_almacenamiento'] . ' ' . $datos['nombre_almacenamiento'] . ' ' . $datos['capacidad_almacenamiento'] . ' ' . $datos['unidad_almacenamiento'] . ' ' . $datos['tipo_almacenamiento'] . ' ' . $datos['formato_almacenamiento'] . '</td>';
                        }
                        break;
                      case 'ram':
                        if ($datos['marca_ram'] == "Sin Marca") {
                          echo '<td class="p-2">' . $datos['nombre_ram'] . ' ' . $datos['capacidad_ram'] . ' GB ' . $datos['tipo_ram'] . ' ' . $datos['distribucion_ram'] . ' ' . $datos['forma_ram'] . '</td>';
                        } else {
                          echo '<td class="p-2">' . $datos['marca_ram'] . ' ' . $datos['nombre_ram'] . ' ' . $datos['capacidad_ram'] . ' GB ' . $datos['distribucion_ram'] . ' ' . $datos['forma_ram'] . '</td>';
                        }

                        break;
                      default:
                        echo '<td class="p-2">' . $datos['marca_tarjeta_video'] . ' ' . $datos['nombre_tarjeta_video'] . ' ' . $datos['vram_tarjeta_video'] . ' GB ' . $datos['tipo_tarjeta_video'] . '</td>';
                        break;
                    }

                    switch ($datos['tipo_componente']) {
                      case 'procesador':
                        echo '<script>
                  var fecha_componente= moment("' . $datos['fecha_procesador'] . '", "YYYY-MM-DD, h:mm:ss");
                  var fecha_calculada=(fecha_componente.fromNow());
                  </script>';
                        echo '<td class="p-3"><span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="bottom" title="' . $datos["fecha_procesador"] . '"><script>document.write(fecha_calculada);</script></span></td>';
                        break;
                      case 'almacenamiento':
                        echo '<script>
                    var fecha_componente= moment("' . $datos['fecha_almacenamiento'] . '", "YYYY-MM-DD, h:mm:ss");
                    var fecha_calculada=(fecha_componente.fromNow());
                    </script>';
                        echo '<td class="p-3"><span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="bottom" title="' . $datos["fecha_almacenamiento"] . '"><script>document.write(fecha_calculada);</script></span></td>';

                        break;
                      case 'ram':
                        echo '<script>
                    var fecha_componente= moment("' . $datos['fecha_ram'] . '", "YYYY-MM-DD, h:mm:ss");
                    var fecha_calculada=(fecha_componente.fromNow());
                    </script>';
                        echo '<td class="p-3"><span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="bottom" title="' . $datos["fecha_ram"] . '"><script>document.write(fecha_calculada);</script></span></td>';

                        break;
                      default:
                        echo '<script>
                    var fecha_componente= moment("' . $datos['fecha_tarjeta_video'] . '", "YYYY-MM-DD, h:mm:ss");
                    var fecha_calculada=(fecha_componente.fromNow());
                    </script>';
                        echo '<td class="p-3"><span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="bottom" title="' . $datos["fecha_tarjeta_video"] . '"><script>document.write(fecha_calculada);</script></span></td>';
                        break;
                    }

                    echo '<td class="text-center d-inline p-2">
                      
                      <button class="btn btn-modifi text-white border-0 btn-sm my-2">
                      <i class="fas fa-pen mx-1"></i>Modificar
                      </button>
                      
                      <button class="btn btn-elimi text-white border-0 btn-sm my-2 eliminar_componente_btn borrar_componente" data-id="' . $datos['id_componente'] . '"><i class="fas fa-trash mx-1"></i>Eliminar</button>
                      </td>
                      </tr>';
                  }
                  if (!$cons) {
                    echo "Error en la consulta " . $mysqli->error;
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

</html>