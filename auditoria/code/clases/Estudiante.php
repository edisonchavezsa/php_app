<?php
 include_once '../config/Conexion.php';

define('METHOD', 'AES-256-CBC');
define('SECRET_KEY', '$CARLOS@2016');
define('SECRET_IV', '101712');

class Estudiante extends Conexion {
    #atributos hola es el protyecto original

    private $id;
    private $nombre;
    private $apellido;
    private $genero;
    private $cedula;
    private $usuario;
    private $password;

    public function get($cedula = '') {

        if ($cedula != '') {
            $this->query = "SELECT id,nombre,apellido,genero,cedula,usuario,contrasenia FROM estudiantes WHERE cedula='$cedula'";
            $this->sentencia_compuesta();
        } else {
            $this->mensaje = 'No se ha ingresado datos';
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'Dato encontrado exitosamente';
        } else {
            $this->mensaje = 'Error, no se encontró usuario';
        }
    }

    public function set($nombre, $apellido, $genero, $cedula, $usuario, $contrasenia) {
        if ($cedula != '') {
            $this->get($cedula);

            if ($cedula != $this->cedula) {
                $this->query = "INSERT INTO estudiantes(nombre,apellido,genero,cedula,usuario,contrasenia) VALUES('$nombre','$apellido','$genero','$cedula','$usuario','$contrasenia');";
                $this->sentencia_simple();
                $this->mensaje = '';
            } else {
                $this->mensaje = 'Ya se encuentra registrado';
            }
        }
    }

    public function obtener_id($id_persona) {
        $valor = 0;
        $this->query = "SELECT id_usuario FROM cuentas WHERE id_persona=$id_persona";
        $datos = $this->traer_datos();
        while (($row = mysqli_fetch_assoc($datos))) {
            $valor = $row['id_usuario'];
        }
        return $valor;
    }

    public function presentar_estudiantes() {

        $this->query = "SELECT * FROM estudiantes;";
        $datos = $this->traer_datos();
        return $datos;
    }

    public function imp_mensaje() {
        print '<b><h3>' . $this->mensaje . '</h3></b>';
        //echo"<script>alert('$this->mensaje')</script>";
    }

    public function logueo($usuario, $contrasenia) {
        $this->query = sprintf("SELECT usuario,contrasenia FROM estudiantes WHERE usuario='$usuario' AND contrasenia='$contrasenia'");
        $validar = "";
        $datos = $this->traer_datos();
        while ($row = $datos->fetch_assoc()) {
        //    print $row['usuario'] . " " . $row['contrasenia'] . "<br>";
            $validar=$row['contrasenia'];
        }


        return $validar;
    }

    public static function encryption($string) {
        $output = FALSE;
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }

    public static function decryption($string) {
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }

}
