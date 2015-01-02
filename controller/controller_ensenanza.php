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
        include_once '../util/util_json.php';

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

        switch ($estado) {
            case 0:
                $query = "Select * From ensenanza "
                        . "Where estado = $estado "
                        . "Order By fechaInicio Desc;";
                break;

            case 1:
                $query = "Select * From ensenanza "
                        . "Where estado = $estado "
                        . "Order By fechaInicio Desc;";
                break;

            case 2:
                $query = "Select * From ensenanza "
                        . "Where estado = $estado "
                        . "Order By fechaTerminado Desc;";
                break;

            default:
                $query = "Select * From ensenanza "
                        . "Order By fechaTerminado Desc;";
                break;
        }

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

    public function getEnsenanzaByEstadoAndProfesor($estado, $profesor) {
        $oJson = new UtilJson();

        $query = "Select ensenanzaID, nombre "
                . "From ensenanza "
                . "Where (estado = $estado And creadoPor = '$profesor') "
                . "Order By ensenanzaID Desc;";

//        var_dump($query);

        try {

            $this->conexion->startConnection();
            $data = $this->conexion->setQuery($query);
            $error = $this->conexion->getError();
//            var_dump($data);
            if (!$error) {
                $json = $oJson->getJsonParser($data, FALSE);
//                var_dump($json);
                return $json;
            } else {
                $array["message"] = GETDATA_FAILED;
                $array["info"] = $this->conexion->getMessage();
                $oJson->getJsonParser($array, TRUE);
                echo $this->conexion->getMessage();
            }
        } catch (mysqli_sql_exception $sql_ex) {

            $this->error = TRUE;
            $this->message = $sql_ex->getMessage();
            return FALSE;
        }

//        $this->conexion->closeConnection();
    }

    function updateEnsenanza(
    $fechaInicio, $fechaFin, $nombre, $creadoPor, $controller, $terminadoPor, $enseñanzaID
    ) {


        try {

            $conection = $this->conexion->startConnection();

            switch ($controller) {
                case 0:
                    $controller = 1;

                    $query = ("Update ensenanza Set "
                            . "fechaInicio = ? , "
                            . "fechaFin = ? , "
                            . "nombre = ? , "
                            . "estado = ? "
                            . "Where ensenanzaID = ? ;");

//                    var_dump($query);
                    $stmt = $conection->prepare($query);
                    $stmt->bind_param("sssii", $fechaInicio, $fechaFin, $nombre, $controller, $enseñanzaID);
                    break;

                case 1:
                    $query = ("Update ensenanza Set "
                            . "creadoPor = ? , "
                            . "estado = ? "
                            . "Where ensenanzaID = ? ;");
//                    var_dump($query);
                    $stmt = $conection->prepare($query);
                    $stmt->bind_param("sii", $creadoPor, $controller, $enseñanzaID);
                    break;

                case 2:
                    $query = ("Update ensenanza Set "
                            . "estado = ? , "
                            . "fechaTerminado = ? , "
                            . "terminadoPor = ? "
                            . "Where ensenanzaID = ? ;");

                    $oDataTime = new DatatimeUtil();
                    $now = $oDataTime->genDataTime(DATETIME_FORMAT);

                    $stmt = $conection->prepare($query);
                    $stmt->bind_param("issi", $controller, $now, $terminadoPor, $enseñanzaID);
                    break;

                default:
                    break;
            }

            if (!$stmt->execute()) {
                $info = "Execute failed";
            }

            $num_affected_rows = $stmt->affected_rows;
            $stmt->close();

            if ($num_affected_rows > 0) {
                $this->message = TEACHING_UPDATED;
                $this->error = FALSE;
            } else {
                $this->message = TEACHING_FAILED_UPDATED . ". " . $info;
                $this->error = TRUE;
            }
        } catch (Exception $exc) {

            $this->error = TRUE;
            $this->message = $exc->getCode();
        }
    }

    function deleteEnsenanzaById($ensenanzaID) {

        $query = "Delete from ensenanza "
                . "where ensenanzaID = ?;";

        try {

            $conection = $this->conexion->startConnection();
            $stmt = $conection->prepare(utf8_decode($query));
            $stmt->bind_param("i", $ensenanzaID);

            if (!$stmt->execute()) {
                $info = "Execute failed";
            }

            $num_affected_rows = $stmt->affected_rows;
            $stmt->close();

            if ($num_affected_rows > 0) {
                $this->error = FALSE;
                $this->message = TEACHING_DELETED;
            } else {
                $this->error = TRUE;
                $this->message = TEACHING_FAILED_DELETED . ". " . $info;
                ;
            }
        } catch (Exception $exc) {

            $this->error = TRUE;
            $this->message = $exc->getMessage();
        }

//           $conection = $this->conexion->closeConnection();
    }

    function getError() {
        return $this->error;
    }

    function getMessage() {
        return $this->message;
    }

}
