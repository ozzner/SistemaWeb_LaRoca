<?php

error_reporting(E_ALL ^ E_NOTICE);

class Mysql_Conexion {

    private static $connection;
    private $message;
    private $error;

    function __construct() {

        require_once dirname(__FILE__) . './database_configurations.php';
        $this->error = NULL;
        $this->message = NULL;
    }

    public function startConnection() {

        try {
            Mysql_Conexion::$connection = new mysqli(MySQL_DB_HOST, MySQL_DB_USER, MySQL_DB_PASS, MySQL_DB_NAME);

            if (Mysql_Conexion::$connection->connect_errno) {

                $this->error = TRUE;
                $this->message = "Se presento el siguiente error. " . mysqli_connect_error();
            } else {

                $this->error = FALSE;
                $this->message = "¡Conexión exitosa!";
            }
        } catch (Exception $exc) {
            $this->error = TRUE;
            $this->message = $exc->getMessage();
        }
    }

    
    public function setQuery($query) {
        $array = array();

        try {
            if (isset($query)) {
              
                if ($r = Mysql_Conexion::$connection->query($query)) {
                    while ($row = $r->fetch_assoc()) {
                        $array[] = $row;
                    }
                    var_dump($array);
                    if ($array == NULL) {
                        echo 'entro NULL <br>';
                        $this->error = TRUE;
                        $this->message = "nulo";
                    } else {
                         echo 'entro NO NULL <br>';
                        $this->error = FALSE;
                        $this->message = "Ok!";
                    }

                    $r->free();
                    ;
                } else {
                    echo ' ERROR LECTURA <br>';
                    $this->messaje = 'Error en lectura de datos <br>';
                    $this->error = TRUE;
                }
            }
        } catch (Exception $ex) {

            $this->error = TRUE;
            $this->message = "Error. " . $ex->getMessage();
            $array = NULL;
        }

        return $array;
    }

    public function closeConnection() {
        $this->connection->close();
        unset($this->connection);
    }

    /* ++++++++++++++ SET AND GET ++++++++++++++ */

    public function getMessage() {
        return $this->message;
    }

    public function getError() {
        return $this->error;
    }

    public function getConnection() {
        return Mysql_Conexion::$connection;
    }

}

?>