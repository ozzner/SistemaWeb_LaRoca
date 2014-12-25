<?php

/**
 * Description of controller_enseñanza
 *
 * @author Renzo Santillán
 */
class EnsenanzaController {

    private $error;
    private $message;
    private $conexion;

    function __construct() {

        include_once '../util/util_constants.php';
        include_once "../database/database_mysql.php";
        include_once '../util/util_datatime.php';

        $this->conexion = new Mysql_Conexion();
    }

    public function storeNewEnsenanza($nom, $fInicio, $fFin) {

        $query = "Insert Into ensenanza "
                . "(fechaInicio , "
                . "fechaFin , "
                . "nombre) "
                . "Values (?,?,?);";


        try {

            $conection = $this->conexion->startConnection();
            $stmt = $conection->prepare($query);
            $stmt->bind_param("sss", $fInicio, $fFin, $nom);

            $r = $stmt->execute();
            $stmt->close();

            if ($r) {
                $this->message = TEACHING_CREATED;
                $this->error = FALSE;
            } else {
                $this->message = TEACHING_FAILED_CREATED;
                $this->error = TRUE;
            }
        } catch (Exception $exc) {
            $this->error = TRUE;
            $this->message = $exc->getCode();
        }
    }

    public function getAllDataByEstado($estado) {
        $query = "Select * From ensenanza "
                . "Where estado = $estado "
                . "Order By fechaInicio Desc;";

        $data = array();

        try {

            $this->conexion->startConnection();
            $data = $this->conexion->setQuery($query);

            $error = $this->conexion->getError();

            if (!$error) {
                return $data;
            } else {
                $this->message = $this->conexion->getMessage();
                $this->error = TRUE;
                return FALSE;
            }
        } catch (mysqli_sql_exception $sql_ex) {

            $this->error = TRUE;
            $this->message = $sql_ex->getMessage();
            return FALSE;
        }

        $this->conexion->closeConnection();
    }

    public function updateEnsenanza($nombre, $estado, $enseñanzaID) {
        $query = utf8_decode("Update ensenanza Set "
                . "creadoPor = ? , "
                . "estado = ? "
                . "Where enseñanzaID = ? ;");

        var_dump($query);

        try {

            $conection = $this->conexion->startConnection();
            $stmt = $conection->prepare($query);
            $stmt->bind_param("sii", $nombre, $estado, $enseñanzaID);
//            var_dump($stmt->execute());

            if (!$stmt->execute()) {
                $info = "Execute failed";
                echo $info;
            }

            $num_affected_rows = $stmt->affected_rows;
            $stmt->close();

            if ($num_affected_rows > 0) {
                $this->message = TEACHING_UPDATED;
                $this->error = FALSE;
            } else {
                $this->message = TEACHING_FAILED_UPDATED;
                $this->error = TRUE;
            }
        } catch (Exception $exc) {

            $this->error = TRUE;
            $this->message = $exc->getCode();
        }
    }

    function getError() {
        return $this->error;
    }

    function getMessage() {
        return $this->message;
    }

}
