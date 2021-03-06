<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ingresa o registrate</title>
  <link rel="stylesheet" href="css/bootstrap_login.css">
  <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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
      <h2 class="h4 mb-5">Oh! crea tu cuenta ahora</h2>

      <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->

      <form action="insert_vendedor.php" method="POST" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label class="h6" for="inputName"><strong>Nombre de la tienda</strong></label>
            <input type="text" class="form-control" name="nombre" id="inputEmail4" placeholder="" required autocomplete="off">
          </div>
          <div class="form-group col-md-4">
            <label class="h6" for=""><strong>Número de documento</strong></label>
            <input type="number" class="form-control" name="documento" id="" placeholder="# identificación" required autocomplete="off">
          </div>
          <div class="form-group col-md-4">
            <label class="h6" for="inputAddress2"><strong>Teléfono de contacto</strong></label>
            <input type="number" class="form-control" name="telefono" id="inputPhone" placeholder="" required autocomplete="off">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label class="h6" for="inputCity"><strong>Ciudad</strong></label>
            <input type="text" class="form-control" name="ciudad" id="inputCity" required autocomplete="off">
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
            <input type="text" class="form-control" name="dire_residen" id="inputZip" required autocomplete="off">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-6">
            <label class="h6" for="inputEmail"><strong>Correo electrónico</strong></label>
            <input type="email" class="form-control" name="correo" id="inputEmail" placeholder="example@email.com" required autocomplete="off">
          </div>
          <div class="form-group col-6">
            <label class="h6" for=""><strong>Elija un nombre de usuario</strong></label>
            <input type="text" class="form-control" name="usuario" id="" placeholder="nickname000" required autocomplete="off">
          </div>
        </div>
        <div class="custom-file" lang="es">
          <input type="file" class="custom-file-input" id="validatedCustomFile" name="imagen" required>
          <label class="custom-file-label" name="imagen" for="validatedCustomFile">Elige una imagen que te identifique (ávatar)...</label>
          <div class="invalid-feedback">Example invalid custom file feedback</div>
        </div>
        <div class="form-group mt-3">
          <label class="h6" for="inputEmail"><strong>Contraseña</strong></label>
          <input type="password" class="form-control" name="contrasena" id="inputPassword" placeholder="Elige una contraseña" required>
        </div>
        <div class="d-flex justify-content-center">
          <input class="btn btn-primarydeg text-white border-0 rounded-lg p-2" name="btnenviar" type="submit" value="Guardar">
        </div>
      </form>
    </div>
  </div>

  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>