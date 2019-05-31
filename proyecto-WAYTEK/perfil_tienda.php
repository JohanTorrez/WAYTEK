<?php

  require "conexion_waytek.php";
  session_start();

  if (isset ($_SESSION['nom_usua'])){
  } else {
    echo '<script>alert("NO HAS INICIADO SESIÓN");
    window.location="ingreso.php"</script>';
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap_admin.css">
    <link rel="stylesheet" href="css/sweetalert.css">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <title>Perfil</title>
</head>
<body>

    <nav class="navbar navbar-expand pl-3 pr-0 py-0 pb-2 pt-2">
        <a class="h3 mt-1 mr-2 text-white" href="" target="_blank"><strong>WAYTEK</strong></a>
        <a class="navbar-brand text-white btn-primarydeg rounded px-2 py-1 text-wrap" href="perfil_tienda.php" target="_blank">Perfil</a>
            <div class="btn-group ml-auto mr-2">
            <button type="button" class="btn mr-2 rounded-lg btn-primarydeg text-white p-0" data-toggle="modal" data-target="#mymodal"><a class="text-decoration-none text-white px-3 py-2" href="administrador.php">Inicio</a></button>

                <!--<script>
                $('#mymodal').modal(options);
                </script>
                -->

                    <div class="dropdown">
                        <img class="imgtienda rounded-circle mr-3" width="40rem" src="<?php echo $_SESSION['foto_perfil_tienda'] ?>" id="dropdownMenuButton" alt=""  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button">Configuración</button>
                            <button class="dropdown-item" type="button">Ayuda</button>
                            <div class="dropdown-divider"></div>
                            <form class="" action="" method="post">
                            <input class="dropdown-item bg-cerrar text-white" type="submit" value="Cerrar sesión" name="cerrar">
                            </form>
                            <?php

                            if (isset($_POST['cerrar'])) {

                            echo '<script>window.location="ingreso.php"</script>';
                            session_destroy();

                            }
                            ?>
                        </div>
                    </div>
        </div>
    </nav>

   <div class="card w-85 mx-auto mt-4">
        <div class="card-header">
            <h2>Opciones de perfil</h2>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6 my-3">
                    <label class="mr-4">Nombre de usuario:</label>
                    <input class="border-top-0 border-left-0" type="text" value="<?php
                        echo $_SESSION['nom_usua'];?>" readonly>
                    <input class="" type="image" width="17rem" src="img/iconos/pencil.png" data-toggle="modal" data-target="#modalusuario">

                    <div class="modal fade" id="modalusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cambiar nombre de usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                    </div>
                
                </div>
                <div class="form-group col-md-6 my-3">
                    <label class="mr-4" for="">Nombre de la tienda:</label>
                    <input class="border-top-0 border-left-0" type="text" value="<?php
                        echo $_SESSION['nombre_tienda'];?>" readonly>
                    <input class="" type="image" width="17rem" src="img/iconos/pencil.png" data-toggle="modal" data-target="#modalnombre">

                    <div class="modal fade" id="modalnombre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cambiar nombre de la tienda</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-3">
                    <label class="mr-4">Correo electrónico:</label>
                    <input class="border-top-0 border-left-0" type="text" value="<?php
                        echo $_SESSION['correo_tienda'];?>" readonly>
                    <input class="" type="image" width="17rem" src="img/iconos/pencil.png" data-toggle="modal" data-target="#modalcorreo">

                    <div class="modal fade" id="modalcorreo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cambiar correo electrónico</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>               
                <div class="form-group col-md-6 my-3">
                    <label class="mr-4" for="">Teléfono:</label>
                    <input class="border-top-0 border-left-0" type="text" value="<?php
                        echo $_SESSION['telefono_tienda'];?>" readonly>
                    <input class="" type="image" width="17rem" src="img/iconos/pencil.png" data-toggle="modal" data-target="#modaltelefono">

                    <div class="modal fade" id="modaltelefono" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cambiar número de teléfono</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 my-3">
                    <label class="mr-4">Dirección:</label>
                    <input class="border-top-0 border-left-0" type="text" value="<?php
                        echo $_SESSION['direc_tienda'];?>" readonly>
                    <input class="" type="image" width="17rem" src="img/iconos/pencil.png" data-toggle="modal" data-target="#modaldireccion">

                    <div class="modal fade" id="modaldireccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cambiar dirección local</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>               
                <div class="form-group col-md-6 my-3">
                    <label class="mr-4" for="">Imágen / Ávatar:</label>
                    <input class="border-top-0 border-left-0" type="img" value="<?php
                        $solo_nombre= $_SESSION['foto_perfil_tienda'];
                        $solo_nombre= substr($solo_nombre,11);
                        echo $solo_nombre;
                        ?>" readonly>
                        <img src="<?php
                        echo $_SESSION['foto_perfil_tienda'];?>" alt="" width="40rem">
                    <input class="" type="image" width="17rem" src="img/iconos/pencil.png" data-toggle="modal" data-target="#modalimg">

                    <div class="modal fade" id="modalimg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cambiar imagen/ávatar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="form-row border-top mt-4">
                <div class="form-group mx-auto mt-4 mb-2 col-md-6">
                    <label class="mr-4">Contraseña:</label>
                    <input class="border-top-0 border-left-0" type="password" value="<?php
                        echo $_SESSION['contraseña_tienda'];?>" readonly>
                    <input class="" type="image" width="17rem" src="img/iconos/pencil.png" data-toggle="modal" data-target="#modalcontra">

                    <div class="modal fade" id="modalcontra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal-footer d-flex justify-content-start">
            <?php
                $desac="";
                if (!isset($_POST['btpen'])) {
                    $desac="disabled";
                }
            ?>
            <input type="button" class="btn rounded-lg btn-primarydeg text-white" name="guardar_cambios" value="Guardar" <?php $desac ?>>
        </div>

   </div>
                            


        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.datatable.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>