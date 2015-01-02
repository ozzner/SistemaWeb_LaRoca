<?php

error_reporting(E_ALL ^ E_NOTICE);

class Mysql_Conexion {

    private static $connection;
    private $message;
    private $isError;
    private $errorCode;

    function __construct() {

        require_once dirname(__FILE__) . './database_configurations.php';
        include_once '../util/util_constants.php';
        
        $this->isError = NULL;
        $this->message = NULL;
    }

    public function startConnection() {

        try {
            Mysql_Conexion::$connection = new mysqli(MySQL_DB_HOST, MySQL_DB_USER, MySQL_DB_PASS, MySQL_DB_NAME);

            if (Mysql_Conexion::$connection->connect_errno) {

                $this->errorCode = mysqli_errno(Mysql_Conexion::$connection);
                $this->isError = TRUE;
                $this->message = CONNECTION_FAILED . mysqli_connect_error();
            } else {

                $this->isError = FALSE;
                $this->message = CONNECTION_SUCCESS;
            }
        } catch (Exception $exc) {
            throw $exc;
            $this->isError = TRUE;
            $this->message = $exc->getMessage();
        }
     
           return Mysql_Conexion::$connection;
  
       
    }

    public function setQuery($query) {
         $output = array();
        
        try {
            if (isset($query)) {

                if ($r = Mysql_Conexion::$connection->query($query)) {
                  
                    while ($row = $r->fetch_assoc()) {
                         $output[]=array_map("utf8_encode", $row);
                    }


                    if ($output == NULL) {
                        $this->isError = TRUE;
                        $this->message = "nulo";
                    } else {
                        $this->isError = FALSE;
                        $this->message = "Ok!";
                    }

                    $r->free();
                } else {

                    $this->messaje = 'Error en lectura de datos <br>';
                    $this->isError = TRUE;
                }
            } else {

                $this->messaje = 'Query vacio o nulo';
            }
        } catch (Exception $ex) {

            $this->isError = TRUE;
            $this->message = "Error. " . $ex->getMessage();
            $array = NULL;
        }

        return $output;
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
        return $this->isError;
    }

    function getErrorCode() {
        return $this->errorCode;
    }

    public function getConnection() {
        return Mysql_Conexion::$connection;
    }

}

?>