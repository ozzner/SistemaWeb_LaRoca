<?php

class TemaController {

    private $error;
    private $message;
    private $conexion;

    function __construct() {

        include_once '../util/util_constants.php';
        include_once "../database/database_mysql.php";
        include_once '../util/util_datatime.php';
        include_once '../util/util_json.php';

        $this->conexion = new Mysql_Conexion();
    }

    public function getTemasByEnsenanzaID($enseñanzaID) {
        $oJson = new UtilJson();

       $query = "Select * "
                . "From tema "
                . "Where (ensenanzaID = $enseñanzaID) "
                . "Order By temaID Desc;";

        try {

            $this->conexion->startConnection();
            $data = $this->conexion->setQuery($query);
            $error = $this->conexion->getError();

            if (!$error) {
                $json = $oJson->getJsonParser($data, FALSE);
                return $json;
            } else {

                $array["message"] = GETDATA_FAILED;
                $array["info"] = $this->conexion->getMessage();
                $json = $oJson->getJsonParser($array, TRUE);
                return $json;
            }
            
        } catch (mysqli_sql_exception $sql_ex) {

            $this->error = TRUE;
            $this->message = $sql_ex->getMessage();
            return FALSE;
        }
    }

    public function getTemaByID($temaID) {
        $oJson = new UtilJson();

        $query = "Select * "
                . "From tema "
                . "Where (temaID = $temaID) ";

//        $data = array();

        try {

            $this->conexion->startConnection();
            $data = $this->conexion->setQuery($query);
            $error = $this->conexion->getError();
            
            if (!$error) {
                $json = $oJson->getJsonParser($data, FALSE);
                return $json;
            } else {

                $array["message"] = GETDATA_FAILED;
                $array["info"] = $this->conexion->getMessage();
                $json = $oJson->getJsonParser($array, TRUE);
                return $json;
            }
            
        } catch (mysqli_sql_exception $sql_ex) {

            $this->error = TRUE;
            $this->message = $sql_ex->getMessage();
            return FALSE;
        }
    }

    public function insertTemaByEnsenanzaID($titulo, $descripcion, $enseñanzaID) {


        $query = "Insert Into tema "
                . "(titulo , "
                . "descripcion , "
                . "ensenanzaID) "
                . "Values (?,?,?);";

        try {

            $conection = $this->conexion->startConnection();
            $stmt = $conection->prepare($query);
            $stmt->bind_param("ssi", $titulo, $descripcion, $enseñanzaID);

            $r = $stmt->execute();
            $stmt->close();

            if ($r) {
                return 0;
            } else {
                return 1;
            }
        } catch (Exception $exc) {
            return 2;
        }
    }

    public function updateTema($titulo, $descripcion, $enseñanzaID, $temaID ) {

        $query = "Update tema Set "
                . "titulo = ? , "
                . "descripcion = ? , "
                . "ensenanzaID = ? "
                . "Where temaID = ? ;";
        
        
        $conection = $this->conexion->startConnection();
        $stmt = $conection->prepare($query);
        $stmt->bind_param("ssii", $titulo ,$descripcion ,$enseñanzaID ,$temaID);

        if ($stmt->execute()) {

            $num_affected_rows = $stmt->affected_rows;
            $stmt->close();
            return $num_affected_rows;
            
        }else{
            return 0;
        }
    }

    function getError() {
        return $this->error;
    }

    function getMessage() {
        return $this->message;
    }

    function getConexion() {
        return $this->conexion;
    }

}

?>