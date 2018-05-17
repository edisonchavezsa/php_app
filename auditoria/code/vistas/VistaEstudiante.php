
<h1>Vista Estudiante</h1>
<?php
require_once '../config/Conexion.php';
require_once '../clases/Estudiante.php';

session_start();
$objP = new Estudiante();
$result=$objP->presentar_estudiantes();
/*while($row = $result->fetch_assoc()){
  print $row['nombre']." ".$row['apellido']." ".$row['cedula']."<br>";
  } */
?>
<html>
    <head>
        <title>title</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="../../estilos/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../estilos/bootstrap/js/bootstrap.min.js" rel="stylesheet" type="text/css">
    </head>
    <body>

        <main role="main">

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron">
                <div class="container">
                    <div class="col-md-5">

                        <h4 class="display-4 ">hola: <b><?php echo $_SESSION['usuario']; ?></b></h4>
                    </div>
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-4">
                        <p><a class="btn btn-primary btn-lg center-block" href="salir.php" role="button">Salir &raquo;</a></p>
                    </div>
                </div>

            </div>

            <div class="container">
                <!-- Example row of columns -->
                <div class="row">
                    <div class="col-md-8">
                        <h2>Usuarios registrados</h2>
                     
                                
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Cédula</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = $result->fetch_assoc()){?>
                                    <tr>
                                        <td><?php echo $row['nombre'];?></td>
                                        <td><?php echo $row['apellido'];?></td>
                                        <td><?php echo $row['cedula'];?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                  
                    </div>

                    <div class="col-md-4">
                        <h2>Estudiantes</h2>
                        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                        <p><a class="btn btn-secondary" href="#" role="button">Ver detalles &raquo;</a></p>
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

    </body>
</html>
