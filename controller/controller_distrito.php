<?php
error_reporting(E_ALL ^ E_NOTICE);
class DistritoController {

    private $message;
    private $conexion;

    function __construct() {
        include_once "../database/database_mysql.php";
        $this->conexion = new Mysql_Conexion();
        $this->conexion->startConnection();
    }

    public function getAllData() {
        $query = "Select * "
                . "From distrito;";

        $error = $this->conexion->getError();

        if (!$error) {

            $data = $this->conexion->setQuery($query);
            $error = $this->conexion->getError();

            if (!$error) {
                return $data;
            } else {
                $this->message = $this->conexion->getMessage();
                return FALSE;
            }
        } else {
            $this->message = $this->conexion->getMessage();
        }
    }

    public function getMessage() {
        return $this->message;
    }

}

?>