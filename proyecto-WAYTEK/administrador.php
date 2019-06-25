<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap_admin.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <!-- Fin Bootstrap CSS -->
  <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
  <title>Panel de administración</title>
  <!--End Required meta tags -->
  <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
  <script src="sweetalert/sweetalert2.js"></script>
  <link rel="stylesheet" href="sweetalert/sweetalert2.css">
  <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
  <!--<script src="ingresar_producto.js"></script>-->
  <script src="js/alerts.js"></script>
</head>

<body>
  <?php
  require "conexion_waytek.php";
  require "comprobar.php";
  ?>

  <nav class="navbar navbar-expand pl-3 pr-4 py-0 pb-2 pt-3 justify-content-between">
    <div class="d-inline">
      <h3 class="mt-1 mr-2 text-white d-inline" href="$" target="_blank"><strong>WAYTEK</strong></h3>
      <a class="navbar-brand text-white btn-primarydeg rounded px-2 py-1 text-wrap" href="administrador.php" target="_blank">Administrador</a>
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
            <input class="dropdown-item bg-cerrar text-dark" type="submit" value="Cerrar sesión" name="cerrar">
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
          <a class="nav-link" id="v-pills-ventas-tab" data-toggle="pill" href="#v-pills-ventas" role="tab" aria-controls="v-pills-ventas" aria-selected="false">Ventas</a>
          <a class="nav-link" id="v-pills-reportes-tab" data-toggle="pill" href="#v-pills-reportes" role="tab" aria-controls="v-pills-reportes" aria-selected="false">Reportes</a>
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
                    <form class="form">
                      <input class="form-control" type="search" placeholder="Buscar" aria-label="Search">
                    </form>
                  </div>
                  <div class="col-6 my-auto">
                    <button type="button" class="btn btn-block rounded-lg btn-primarydeg text-white" data-toggle="modal" data-target="#productosModal">Agregar productos</button>
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
                            <select name="tipo_producto" id="tipo_producto" class="form-control" required id="tipo_producto">
                              <option disable selected>Selecciona producto</option>
                              <option value="portatil">Portátil</option>
                              <option value="escritorio">PC Escritorio</option>
                              <option value="presupuesto">Presupuesto</option>
                              <option value="accesorio">Accesorio</option>
                            </select>
                          </div>
                          <script>
                            $(document).ready(function() {
                              $('.form-partes').hide();
                              $('.form-accesorio').hide();
                              $('#tipo_producto').change(function() {
                                var tipo = $(this).val();
                                switch (tipo) {
                                  case 'accesorio':
                                    $('.form-accesorio').show(500);
                                    $('.form-partes').hide(500);
                                    $('#tipo').removeClass('col-6');
                                    $('#tipo').addClass('col-12');
                                    $('#marca').hide(500);
                                    break;
                                  default:
                                    $('.form-partes').show(500);
                                    $('.form-accesorio').hide(500);
                                    $('#tipo').removeClass('col-12');
                                    $('#tipo').addClass('col-6');
                                    $('#marca').show(500);
                                    break;
                                }
                              })
                            });
                          </script>

                          <div class="form-group col-6" id="marca">
                            <label for="marca_producto">Marca</label>
                            <select name="marca_producto" id="marca_producto" class="form-control">
                              <option value="">Selecciona una marca</option>
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
                              <input type="file" class="custom-file-input" id="customFile" name="foto_producto" required>
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
                                <option value="">Elegir componente</option>
                              </select></div>
                            <div class="form-group col-6"><label for="almacenamiento">Almacenamiento</label><select name="almacenamiento" class="form-control" id="">
                                <option value="">Elegir componente</option>
                              </select></div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-6"><label for="ram">Memoria RAM</label><select name="ram" class="form-control" id="">
                                <option value="">Elegir componente</option>
                              </select></div>
                            <div class="form-group col-6"><label for="tarjetavideo">Tarjeta de Video</label><select name="tarjetavideo" class="form-control" id="">
                                <option value="">Elegir componente</option>
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
              <table id="example" class="table table-sm shadow-none ml-1 mr-0 mt-4 d-table table-borderless">
                <thead class="p-3 mb-5 bg-white rounded border-bottom text-center">
                  <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Tienda</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Fecha</th>
                    <th scope="col" colspan="2">Acciones</th>
                  </tr>
                </thead>
                <tbody class="mb-5 bg-white rounded border-bottom text-center">
                  <?php
                  $cons = $mysqli->query("SELECT id_producto, tienda.nombre_tienda,tipo_producto, portatil.nombre_portatil, accesorio.nombre_accesorio, foto_producto, fecha_publicacion_producto  FROM producto INNER JOIN tienda on producto.id_tienda=tienda.id_tienda INNER JOIN portatil on producto.id_portatil=portatil.id_portatil INNER JOIN accesorio on producto.id_accesorio=accesorio.id_accesorio");
                  while ($datos = $cons->fetch_array(MYSQLI_ASSOC)) {
                    echo '<tr class="">';
                    echo '<td class="p-2">';

                    echo $datos['id_producto'] . '</td>';

                    echo '<td class="p-2">' . $datos['nombre_tienda'] . '</td>';

                    echo '<td class="p-2">' . strtoupper($datos['tipo_producto']) . '</td>';

                    switch ($datos['tipo_producto']) {
                      case 'portatil':
                        echo '<td class="p-2">'. $datos['nombre_portatil'] . '</td>';
                        break;
                      case 'accesorio':
                        echo '<td class="p-2">' . $datos['nombre_accesorio'] . '</td>';
                        break;
                    }

                    echo '<td class="p-2"><img src="' . $datos['foto_producto'] . '" class="rounded" height="70px" alt=""></td>';

                    echo '<td class="p-2">' . $datos['fecha_publicacion_producto'] . '</td>';

                    echo '<td class="text-center p-2">
                    <button class="btn btn-modifi text-white border-0 btn-sm my-2" id="modificar_btn">Modificar</button>
                    <button class="btn btn-elimi text-white border-0 btn-sm my-2" id="eliminar_btn">Eliminar</button>
                    </td>';
                    echo '</tr>';
                  }
                  if (!$cons) {
                    echo "Error en la consulta" . $cons->error;
                  }
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
                  <input class="form-control my-3 mr-3" type="search" placeholder="Buscar" aria-label="Search">
                </form>
                <button type="button" class="btn rounded-lg btn-primarydeg text-white" data-toggle="modal" data-target="#componentesModal">
                  Agregar componentes
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
                      <form action="ingresar_componente.php" class="form p-2" method="post" enctype="multipart/form-data">

                        <div class="form-row">
                          <div class="form-group">
                            <label for="tipo_producto">Tipo de Componente</label>
                            <select name="tipo_producto" id="tipo_producto" class="form-control">
                              <option value="procesador">Procesador</option>
                              <option value="almacenamiento">Almacenamiento</option>
                              <option value="ram">Memoria RAM</option>
                              <option value="tarjeta_video">Tarjeta de Video</option>
                            </select>
                          </div>
                        </div>
                      </form>
                      <input type="submit" class="btn btn-lg rounded-lg btn-primarydeg text-white btn-block" value="Agregar">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-ventas" role="tabpanel" aria-labelledby="v-pills-ventas-tab">...</div>
            <div class="tab-pane fade" id="v-pills-reportes" role="tabpanel" aria-labelledby="v-pills-reportes-tab">...</div>
          </div>
        </div>

      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>