<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap_admin.css">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <title>Panel de administración</title>
  </head>
  <body>
    <nav class="navbar navbar-expand pl-3 pr-0 py-0 pb-2 pt-2">
      <a class="h3 mt-1 mr-2 text-white" href="" target="_blank"><strong>WAYTEK</strong></a>
      <a class="navbar-brand text-white btn-primarydeg rounded px-2 py-1 text-wrap" href="administrador.php" target="_blank">Administrador</a>
        <div class="btn-group btn-lg ml-auto mr-0">
            <div class="dropdown">
              <button class="btn btn-primarydeg rounded text-white dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button">Configuración</button>
                <button class="dropdown-item" type="button">Ayuda</button>
                <div class="dropdown-divider"></div>
                <form method="post">
                  <input class="dropdown-item" type="submit" value="Cerrar sesión" name="cerrar">
                </form>
              </div>
            </div>
        </div>
      </nav>
    <br>
    <div class="container-fluid mt-0 pt-0">
    <div class="row">
      <div class="col-md-1 col-sm-1 col-lg-1 mr-5">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Productos</a>
          <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Componentes</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Precios</a>
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Reportes</a>
          </div>
        </div>

        <div class="card w-85 pl-4 pr-2 py-2 ml-3">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <div class="row col-12 d-flex justify-content-between px-0 mx-0 py-2">
                  <h2 class="d-block align-text-bottom">Productos registrados</h2>
                  <div class="btn-group form-inline">
                    <div class="form">
                      <form class="form">
                      <input class="form-control my-3 mr-3" type="search" placeholder="Buscar" aria-label="Search">
                      </form>
                    </div>
                    <button type="button" class="btn rounded-lg btn-primarydeg text-white" data-toggle="modal" data-target="#exampleModal">
                    Agregar productos
                  </div>
                  
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">AGREGAR PRODUCTOS</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="" class="form-inline">
                            <div class="form-group">
                              <label for="Nombre"></label>
                              <input type="text">
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer d-flex justify-content-start">
                        <button type="button" class="btn rounded-lg btn-primarydeg text-white">Enviar
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row d-flex justify-content-end">
                </div>
                <div class="row table-responsive">
                    <table class="table table-sm ml-1 mr-0 mt-4 d-table table-borderless">
                        <thead class="p-3 mb-5 bg-white rounded border-bottom">
                          <tr>
                            <th scope="col">Tipo</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Referencia</th>
                            <th scope="col">Código</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Modificar</th>
                            <th scope="col">Eliminar</th>
                          </tr>
                        </thead>
                        <tbody class="p-3 mb-5 bg-white rounded border-bottom">
                          <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><img src="img/" class="rounded" alt="" width="50" height="50"></td>
                            <td></td>
                            <td><button class="btn btn-modifi text-white border-0 btn-sm my-2">Modificar</button></td>
                            <td><button class="btn btn-elimi text-white border-0 btn-sm my-2">Eliminar</button></td>
                          </tr>
                        </tbody>
                      </table>
                      
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
          </div>
        </div>
        
      </div>
</div>

        <script src="js/jquery.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.js"></script>
  </body>
</html>