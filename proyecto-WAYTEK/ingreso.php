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

<body class="bg-gray">
    
    <div class="card ml-auto mt-3 mb-0 text-center col-lg-6 col-md-6 col-sm-6"style="widht=18rem">
        <div class="card-header py-2">
          <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
              <a class="nav-link" href="registro.php">Registrarse</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="">Ingresar</a>
            </li>
          </ul>
        </div>
        <div class="card-body px-5">
          <h2 class="h4">Tienes cuenta, ingresa ahora...</h2>
          <form action="*" method="POST">
            <div class="form-group my-5">
              <label class="h6" for="exampleInputEmail1"><strong>Usuario</strong></label>
              <input type="text" class="form-control" name="*" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Escriba su nombre de usuario">
              <small id="emailHelp" class="form-text text-muted">...</small>
            </div>
            <div class="form-group my-5">
              <label class="h6" for="exampleInputPassword1"><strong>Contraseña</strong></label>
              <input type="password" class="form-control" name="*" id="exampleInputPassword1" placeholder="****">
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Recordar contraseña</label>
            </div>
            <input class="btn btn-primarydeg text-white border-0 rounded-lg p-2" name="btnenviar" type="submit" value="Enviar">
          </form>
        </div>
        <div class="card-footer">
            <p>johamtorres10@gmail.com - andjelmejor@gmail.com<br>313 898 3240 - 322 755 4747<br>Agrado, Huila</p>
        </div>
      </div>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>