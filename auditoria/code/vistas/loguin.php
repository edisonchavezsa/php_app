
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="../../estilos/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../estilos/bootstrap/js/bootstrap.min.js" rel="stylesheet" type="text/css">

        <title>Logueo</title>

    </head>

    <body class="text-center">
        
        <div class="col-md-5">
            
        </div>
        <div class="col-md-2">
            
            <form class="form-signin" method="post" >
                <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Ingreso</h1>
                <label for="inputUsuario" class="sr-only">Usuario</label>
                <input type="usuario" id="usuario" class="form-control" placeholder="Usuario" required autofocus name="usuario">
                <label for="inputContrasenia" class="sr-only">Contraseña</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required name="contrasenia">
                <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
            </form>    
        </div>
        <div class="col-md-5">
        </div>

    </body>
</html>
<?php
    include_once '../clases/Estudiante.php';
    $objEstudiante = new Estudiante();
   
     if( isset($_POST['usuario']) && isset($_POST['contrasenia'])){
          $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    print "data de logueo<br>";
    print $usuario."<br>";
    print $contrasenia;
    $val =$objEstudiante->logueo($usuario, $objEstudiante->encryption($contrasenia));
    print "<br>valor = ";
    print $objEstudiante->decryption($val);
     if( $contrasenia==$objEstudiante->decryption($val)){
         session_start();
         $_SESSION['usuario'] = $usuario;
         header("Location: VistaEstudiante.php");
         exit();
     }else{
         header("Location: ../../index.php");
        exit();
     }
     }
    

?>