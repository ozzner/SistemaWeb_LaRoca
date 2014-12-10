<?php

//error_reporting(E_ALL ^ E_NOTICE);

class AlumnoController {

    private $error;
    private $message;
    private $conexion;

    function __construct() {
        include_once '../util/util_constants.php';
        include_once "../database/database_mysql.php";
        include_once '../util/util_datatime.php';

        $this->conexion = new Mysql_Conexion();
    }
    
    
    

    public function storeNewAlumno($nom, $tel, $nPa, $nMa, $nac, $dir, $fot, $sex, $dis, $gru) {
        $query = "Insert Into alumno "
                . "(nombres,"
                . "telefono,"
                . "nombrePapa,"
                . "nombreMama,"
                . "nacimiento,"
                . "direccion,"
                . "foto,"
                . "sexo,"
                . "createdAt,"
                . "distritoID,"
                . "grupoID)"
                . "Values (?,?,?,?,?,?,?,?,?,?,?);";

        $time = new DatatimeUtil();
        $current_time = $time->genDataTime(DATETIME_FORMAT);
        
        try {

            $conection = $this->conexion->startConnection();
            $stmt = $conection->prepare($query);
            $stmt->bind_param("sisssssssii", $nom, $tel, $nMa, $nPa, $nac, $dir, $fot, $sex, $current_time, $dis, $gru);

            $r = $stmt->execute();
            $stmt->close();

            if ($r) {
                $this->error = FALSE;
                $this->message = USER_CREATED;
            } else {
                $this->error = TRUE;
                $this->message = USER_FAILED . "\n " . $info;
            }
        } catch (Exception $exc) {

            $this->error = TRUE;
            $this->message = $exc->getCode();
        }
    }

    
    
    public function isPhoneExist($celular) {
        $query = "Select * "
                . "From alumno "
                . "Where (telefono = " . $celular . ");";
        
        $this->conexion->startConnection();
        $this->conexion->setQuery($query);

        $error = $this->conexion->getError();
        
        if ($error) {
            $this->error = FALSE;
            $this->message = $this->conexion->getMessage();
            return FALSE;
        } else {
//            $this->message = $this->conexion->getMessage();
            $this->message = USER_PHONE_EXIST;
            $this->error = TRUE;
            return TRUE;
        }
    }
    
    
    

    function getError() {
        return $this->error;
    }

    function getMessage() {
        return $this->message;
    }

}

?>