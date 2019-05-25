<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap_bienve.css">
    <title>Bienvenido</title>
</head>
<body class="bg-primary">
    <div class="py-2 d-flex justify-content-between">
        <h1 class="text-white ml-4">BIENVENIDO</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Salir
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Al salir cerrará sesión...</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Seguro que desea salir?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Si</button>
                    <button type="button" class="btn btn-primary">No, mejor no</button>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card my-1 mx-auto w-75" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Tienda...</h5>
            <h6 class="card-subtitle mb-2 text-muted">Tema de la tienda o slogan</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Administrar tienda</a>
        </div>
    </div>

    <script src="js/jquery.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>