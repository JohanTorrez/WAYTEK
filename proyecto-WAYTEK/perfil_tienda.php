<?php
require "conexion_waytek.php";
require "comprobar.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap_admin.css">
    <link rel="stylesheet" href="css/bootstrap_modify.css">
    <link rel="stylesheet" href="css/sweetalert.css">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="js/jquery.slim.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand pl-3 pr-4 py-0 pb-2 pt-3 justify-content-between">
        <div class="d-inline">
            <h3 class="mt-1 mr-2 text-white d-inline" href="$" target="_blank"><strong>WAYTEK</strong></h3>
            <a class="navbar-brand text-white btn-primarydeg rounded px-2 py-1 text-wrap" href="administrador.php" target="_blank">Administrador</a>
        </div>
        <div class="d-flex">
            <?php
            $id_tienda = $_SESSION['id_tienda'];
            $cons = $mysqli->query("SELECT nombre_tienda from tienda where id_tienda=$id_tienda");
            $datos = $cons->fetch_array(MYSQLI_ASSOC);
            ?>
            <h5 class="mx-3 text-white my-2"><?= $datos['nombre_tienda'] ?></h5>
            <?php
            $id_tienda = $_SESSION['id_tienda'];
            $cons = $mysqli->query("SELECT foto_perfil_tienda from tienda where id_tienda=$id_tienda");
            $datos = $cons->fetch_array(MYSQLI_ASSOC);
            ?>
            <img class="imgtienda rounded-circle mr-3" width="40rem" height="40rem" src="<?= $datos['foto_perfil_tienda'] ?>">
            <div class="btn-group">
                <button type="button" class="btn rounded-lg-left btn-primarydeg text-white">
                    <a class="text-decoration-none text-white" href="administrador.php">
                        Inicio
                    </a>
                </button>
                <button type="button" class="btn text-white btn-primarydeg dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                    <span class="sr-only">Palanca de dropwdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right shadow-lg pb-0">
                    <button class="dropdown-item" type="button">Configuración</button>
                    <button class="dropdown-item" type="button">Ayuda</button>
                    <form class="form m-0" action="cerrar_sesion.php" method="post">
                        <input class="dropdown-item btn-elimi text-white rounded-bottom" type="submit" value="Cerrar sesión" name="cerrar">
                    </form>
                </div>
            </div>
    </nav>

    <div class="card w-85 mx-auto mt-4">
        <div class="card-header">
            <h2>Opciones de perfil</h2>
        </div>
        <div class="card-body px-0 pb-0">
            <div class="form-row">

                <div class="form-group col-md-6 my-3 d-flex">
                    <label class="mx-3 my-2">Nombre de la tienda</label>
                    <?php
                    $id_tienda = $_SESSION['id_tienda'];
                    $cons = $mysqli->query("SELECT nombre_tienda from tienda where id_tienda=$id_tienda");
                    $datos = $cons->fetch_array(MYSQLI_ASSOC);
                    ?>
                    <input class="form-control border-top-0 border-left-0 w-50 mr-0" type="text" value="<?= $datos['nombre_tienda'] ?>" readonly>
                    <input class="m-2" type="image" width="25rem" height="25rem" src="img/iconos/pencil.png" data-toggle="modal" data-target="#modalnombre">

                    <div class="modal fade" id="modalnombre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cambiar nombre de la tienda</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="needs-validation" autocomplete="off" action="cambios.php" method="POST" novalidate>
                                    <div class="modal-body">
                                        <input class="form-control" type="text" name="cambio_nombre" required autocomplete="off">
                                        <div class="invalid-feedback">
                                            Por favor escriba el nuevo nombre.
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="Guardar" name="guardarnom">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6 my-3 d-flex">
                    <label class="mx-3 my-2">Imágen /Avatar</label>
                    <?php
                    $id_tienda = $_SESSION['id_tienda'];
                    $cons = $mysqli->query("SELECT foto_perfil_tienda from tienda where id_tienda=$id_tienda");
                    $datos = $cons->fetch_array(MYSQLI_ASSOC);
                    ?>
                    <input class="form-control border-top-0 border-left-0 w-50 mr-0" type="img" value="<?php
                                                                                                        $solo_nombre = $datos['foto_perfil_tienda'];
                                                                                                        $solo_nombre = substr($solo_nombre, 11);
                                                                                                        echo $solo_nombre;
                                                                                                        ?>" readonly>
                    <img src="<?= $datos['foto_perfil_tienda'] ?>" alt="" width="40rem" height="40rem" class="rounded mx-2">
                    <input class="m-2" type="image" width="25rem" height="25rem" src="img/iconos/pencil.png" data-toggle="modal" data-target="#modalimg">

                    <div class="modal fade" id="modalimg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cambiar imagen/ávatar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="cambios.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="file" class="custom-file-input" id="validatedCustomFile" name="cambio_imagen" required>
                                        <label class="custom-file-label mt-3 mx-3" name="cambio_imagen" for="validatedCustomFile">Elige la imagen a cambiar...</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="Guardar" name="guardarimg">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 my-3 d-flex">
                    <label class="mx-3 my-2">Correo electrónico</label>
                    <?php
                    $id_tienda = $_SESSION['id_tienda'];
                    $cons = $mysqli->query("SELECT correo_tienda from tienda where id_tienda=$id_tienda");
                    $datos = $cons->fetch_array(MYSQLI_ASSOC);
                    ?>
                    <input class="form-control border-top-0 border-left-0 w-50 mr-0" type="email" value="<?= $datos['correo_tienda'] ?>" readonly>
                    <input class="m-2" type="image" width="25rem" height="25rem" src="img/iconos/pencil.png" data-toggle="modal" data-target="#modalcorreo">

                    <div class="modal fade" id="modalcorreo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cambiar correo electrónico</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="needs-validation" autocomplete="off" action="cambios.php" method="POST" novalidate>
                                    <div class="modal-body">
                                        <input class="form-control" type="email" name="cambio_correo" placeholder="Escriba nueva dirección" required autocomplete="off">
                                        <div class="invalid-feedback">
                                            Por favor escriba su nuevo E-mail.
                                        </div>
                                        <small id="emailHelp" class="form-text text-muted">Asegurese del correcto ingreso de la nueva dirección de correo electrónico.</small>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="Guardar" name="guardarcorreo">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group col-md-6 my-3 d-flex">
                    <label class="mx-3 my-2">Teléfono</label>
                    <?php
                    $id_tienda = $_SESSION['id_tienda'];
                    $cons = $mysqli->query("SELECT telefono_tienda from tienda where id_tienda=$id_tienda");
                    $datos = $cons->fetch_array(MYSQLI_ASSOC);
                    ?>
                    <input class="form-control border-top-0 border-left-0 w-50 mr-0" type="text" value="<?= $datos['telefono_tienda'] ?>" readonly>
                    <input class="m-2" type="image" width="25rem" height="25rem" src="img/iconos/pencil.png" data-toggle="modal" data-target="#modaltelefono">

                    <div class="modal fade" id="modaltelefono" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cambiar número de teléfono</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="needs-validation" autocomplete="off" action="cambios.php" method="POST" novalidate>
                                    <div class="modal-body">
                                        <input class="form-control" type="number" name="cambio_tele" placeholder="Escriba nuevo teléfono" required autocomplete="off">
                                        <div class="invalid-feedback">
                                            Por favor escriba su nuevo número de teléfono.
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="Guardar" name="guardartele">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 my-3 d-flex">
                    <label class="mx-3 my-2">Dirección</label>
                    <?php
                    $id_tienda = $_SESSION['id_tienda'];
                    $cons = $mysqli->query("SELECT direccion_tienda from tienda where id_tienda=$id_tienda");
                    $datos = $cons->fetch_array(MYSQLI_ASSOC);
                    ?>
                    <input class="form-control border-top-0 border-left-0 w-50 mr-0" type="text" value="<?= $datos['direccion_tienda'] ?>" readonly>
                    <input class="m-2" type="image" width="25rem" height="25rem" src="img/iconos/pencil.png" data-toggle="modal" data-target="#modaldireccion">

                    <div class="modal fade" id="modaldireccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cambiar dirección local</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="needs-validation" action="cambios.php" method="POST" novalidate>
                                    <div class="modal-body">
                                        <input class="form-control" type="text" name="cambio_direc" placeholder="Escriba nueva dirección" placeholder="Escriba nueva dirección" required autocomplete="street-address">
                                        <div class="invalid-feedback">
                                            Por favor escriba su nueva dirección local.
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="Guardar" name="guardardirec">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer d-flex justify-content-center p-0 mt-3" style="background-color: #d0d0d0">
            <div class="form-row mt-4">
                <div class="form-group col-md-6 my-3 d-flex">
                    <label class="mx-3 my-2">Contraseña</label>
                    <?php
                    $id_tienda = $_SESSION['id_tienda'];
                    $cons = $mysqli->query("SELECT contra_tienda from tienda where id_tienda=$id_tienda");
                    $datos = $cons->fetch_array(MYSQLI_ASSOC);
                    ?>
                    <input class="form-control border-top-0 border-left-0 w-50 mr-0" type="password" value="<?= $datos['contra_tienda'] ?>" readonly>
                    <input class="m-2" type="image" width="25rem" height="25rem" src="img/iconos/pencil.png" data-toggle="modal" data-target="#modalcontra">

                    <div class="modal fade" id="modalcontra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="needs-validation" action="cambios.php" method="POST" novalidate>
                                    <div class="modal-body">
                                        <input class="form-control" type="password" name="contra_actual" placeholder="Escriba contraseña actual" required autocomplete="new-password">
                                        <div class="invalid-feedback">
                                            Es necesario verificar su contraseña actual.
                                        </div>
                                        <small id="emailHelp" class="form-text text-muted">Para asegurarnos de que es usted, es necesario verificar su contraseña actual.</small>
                                        <input class="form-control mt-3" type="password" name="contra_nueva" placeholder="Escriba contraseña nueva" required autocomplete="new-password">
                                        <div class="invalid-feedback">
                                            Por favor ingrese la contraseña nueva.
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="Cambiar" name="cambiarcontra">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>


    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.datatable.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>
