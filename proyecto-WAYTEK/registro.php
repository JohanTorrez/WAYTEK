<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingresa o registrate</title>
    <link rel="stylesheet" href="css/bootstrap_login.css">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
</head>

<body>
    <div class="card ml-auto mt-3 mb-0 text-center col-lg-6 col-md-6 col-sm-6" style="widht=18rem">
        <div class="card-header py-2">
          <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
              <a class="nav-link active" href="">Registrarse</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ingreso.php">Ingresar</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <h2 class="h4 mb-5">Oh! crea tu cuenta ahora...</h2>

          <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
            
          <form action="registro.php" method="POST">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="h6" for="inputName"><strong>Nombre de la tienda</strong></label>
                <input type="text" class="form-control" name="nombre" id="inputEmail4" placeholder="">
              </div>
              <div class="form-group col-md-4">
                <label class="h6" for=""><strong>Número de documento</strong></label>
                <input type="number" class="form-control" name="documento" id="" placeholder="# identificación">
              </div>
              <div class="form-group col-md-4">
                <label class="h6" for="inputAddress2"><strong>Teléfono de contacto</strong></label>
                <input type="number" class="form-control" name="telefono" id="inputPhone" placeholder="">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="h6" for="inputCity"><strong>Ciudad</strong></label>
                <input type="text" class="form-control" name="ciudad" id="inputCity">
              </div>
              <div class="form-group col-md-4">
                <label class="h6" for="inputState"><strong>Departamento</strong></label>
                <select id="inputState" class="form-control" name="departamento">
                  <option selected>Huila</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label class="h6" for="inputZip"><strong>Dirección local</strong></label>
                <input type="text" class="form-control" name="dire_residen" id="inputZip">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-6">
                <label class="h6" for="inputEmail"><strong>Correo electrónico</strong></label>
                <input type="email" class="form-control" name="correo" id="inputEmail" placeholder="example@email.com">
              </div>
              <div class="form-group col-6">
                <label class="h6" for=""><strong>Elija un nombre de usuario</strong></label>
                <input type="text" class="form-control" name="usuario" id="" placeholder="nickname000">
              </div>
            </div>

            <div class="form-group">
              <label class="h6" for="inputEmail"><strong>Contraseña</strong></label>
              <input type="password" class="form-control" name="contrasena" id="inputPassword" placeholder="Elige una contraseña">
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Recordar
                </label>
              </div>
            </div>
            <div class="d-flex justify-content-center">
              <input class="btn btn-primarydeg text-white border-0 rounded-lg p-2" name="btnenviar" type="submit" value="Guardar">
            </div>
          </form>
        </div>
      </div>

  <?php
      if (isset($_POST['btnenviar']))
      {
        include("conexion_waytek.php");

        $nombre_clien=$_POST['nombre'];
        $apelli_clien=$_POST['apellido'];
        $fecha_nacimi=$_POST['fecha_na'];
        $doc_usua=$_POST['documento'];
        $telefono_clien=$_POST['telefono'];
        $ciudad_clien=$_POST['ciudad'];
        $departamento_clien=$_POST['departamento'];
        $direccion_clien=$_POST['dire_residen'];
        $correo_clien=$_POST['correo'];
        $usuario_clien=$_POST['usuario'];
        $contrase_clien=$_POST['contrasena'];

        $conexion->query("INSERT INTO $tabla_usuario(id_cliente,nombre_cliente,apellido_cliente,fech_naci_cliente,
        e_mail_cliente,nom_usu_cliente,contrase_cliente)VALUES('$doc_usua','$nombre_clien','$apelli_clien','$fecha_nacimi','$telefono_clien','$ciudad_clien',
        '$departamento_clien','$direccion_clien','$correo_clien','$usuario_clien','$contrase_clien')");

        echo "Se insertaron los datos correctamente.";
      }
  ?>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>