<?php
  abstract class Conexion{
        #atributos org
        private static $db_host = "localhost";
        private static $db_user = "root";
        private static $db_pass = "";
        protected $db_name = "auditoria";
        protected $query;
        protected $rows = array();
        protected $con;
        public $mensaje;


        #abrir conexion
        private function abrir_conexion(){
            $this->con = new mysqli(self::$db_host, self::$db_user, self::$db_pass, $this->db_name);
        }
        #cerrar_conexion
        private function cerrar_conexion(){
            $this->con->close();
        }
        protected function sentencia_simple(){
            $this->abrir_conexion();
            $this->con->query($this->query);
            $this->cerrar_conexion();
        }
        protected function sentencia_compuesta(){
            $this->abrir_conexion();
            $result = $this->con->query($this->query);
            while ($this->rows[]=$result->fetch_assoc());
            $result->close();
            $this->cerrar_conexion();
            array_pop($this->rows);

        }
          protected function traer_datos(){
            $this->abrir_conexion();
            $result = $this->con->query($this->query);
            $this->cerrar_conexion();
            return $result;
        }
    }
