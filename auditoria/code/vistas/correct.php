<?php
$response_code = $_POST['g-recaptcha-response'];


function curl($url, $parameters)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
    curl_setopt($ch, CURLOPT_POST, 1);
    $headers = [];
    $headers[] = "Content-Length: " . strlen(http_build_query($parameters));

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    return $result;
}

$para = [
        'secret' => '6LfSqFkUAAAAADqrgDQKYimoIe5N5aG4SDYzNwOC',
        'response' => $response_code

];

$returned = curl("https://www.google.com/recaptcha/api/siteverify", $para);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Google ReCaptcha</title>


    <!-- BootStrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body style="margin-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="panel panel-primary">
                    <hr>
                    <?php
                        $data = json_decode($returned);
                        $check = $data->success;
                    ?>
                    <div style="text-align: center;">
                        <?php if ($check): ?>
                            <br><br>
                            <div class="panel-heading"><h3>DATOS GUARDADOS CORRECTAMENTE</h3></div>
                        <?php else: ?>
                            <br><br>
                            <div class="panel-heading"><h3>USTED ES UN ROBOT!</h3></div>
                        <?php endif ?>

                    <br><br>
                    <h4><a href="../../index.php">REGRESAR</a></h4>
                    <hr><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
include_once '../clases/Estudiante.php';
if (isset($_POST['nombre']) && isset($_POST['apellido']) &&
        isset($_POST['genero']) &&
        isset($_POST['cedula']) &&
        isset($_POST['usuario']) &&
        isset($_POST['contrasenia'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $genero = $_POST['genero'];
    $cedula = $_POST['cedula'];
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    $objEstudiante = new Estudiante();
   /* $objEstudiante->set($nombre, $apellido, $genero, $cedula, $usuario,$objEstudiante->encryption($contrasenia));
    $objEstudiante->imp_mensaje();
    var_dump($_POST);
      $secret='6LfSqFkUAAAAADqrgDQKYimoIe5N5aG4SDYzNwOC';
      $ip=$_SERVER['REMOTE_ADDR'];
      $captcha = $_POST["g-recaptcha-response"];
      $result = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
      var_dump($result);*/

    $data = json_decode($returned);
    $check = $data->success;

    if($check){
      $objEstudiante->set($nombre, $apellido, $genero, $cedula, $usuario,$objEstudiante->encryption($contrasenia));
                  $objEstudiante->imp_mensaje();

    }else{
      echo "ERROR";
    }


}

?>
