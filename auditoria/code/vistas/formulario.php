<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>REGISTRO</title>
        <link href="../../estilos/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../estilos/bootstrap/js/bootstrap.min.js" rel="stylesheet" type="text/css">
        <script src='https://www.google.com/recaptcha/api.js'></script>
    <body>



        <main role="main">

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron">
                <div class="container">
                    <div class="col-md-12">
                        <h1 class="display-3 center-block">REGISTRO</h1>
                    </div>


                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <p><a class="btn btn-primary btn-lg left-block" href="../../index.php" role="button">Salir</a></p>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>

            </div>

            <div class="container">
                <!-- Example row of columns -->
                <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div  style="background: #E6E6E6" class="col-md-6 ">
                        <h2>REGISTRO</h2>
                        <form action="correct.php" method="post">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre"
                                       placeholder="Ingrese su nombre" name="nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" id="apellido"
                                       placeholder="Ingrese su apellido" name="apellido">
                            </div>
                            <div class="form-group">
                                <label for="genero">Genero</label>
                                <select class="form-control" name="genero">
                                    <option>Masculino</option>
                                    <option>Femenino</option>
                                    <option>Otro</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cedula">Cédula</label>
                                <input type="text" class="form-control" id="cedula"
                                       placeholder="999999999" name="cedula">
                            </div>
                            <div class="form-group">
                                <label for="usuario">Usuario</label>
                                <input type="text" class="form-control" id="usuario"
                                       placeholder="Usuario" name="usuario">
                            </div>
                            <div class="form-group">
                                <label for="contrasenia">Contraseña</label>
                                <input type="password" class="form-control" id="contrasenia"
                                       placeholder="Contraseña" name="contrasenia">
                            </div>
                              <div class="g-recaptcha" data-sitekey="6LfSqFkUAAAAAFvimz7TNDEbKkC-GzDlJm1F0gaX"></div> <br>
                            <button type="submit" class="btn btn-primary btn-lg">REGISTRARSE</button>
                        </form>
                    </div>

                    <div class="col-md-3">


                    </div>
                </div>

                <hr>

            </div> <!-- /container -->

        </main>

        <footer class="container">
            <p>&copy; Company 2017-2018</p>
        </footer>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="../../../../assets/js/vendor/popper.min.js"></script>
        <script src="../../../../dist/js/bootstrap.min.js"></script>
    </body>
</head>
<body>


</body>
</html>
