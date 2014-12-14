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

    public function getAllAlumnos() {
        $query = "Select * From db_laroca.alumno "
                . "Order By alumnoID asc;";

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

    public function getAlumnoById($alumnoID) {
        $query = "Select * From alumno "
                . "Where alumnoID = $alumnoID";

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

    public function updateAlumno($alumnoID, $nom, $tel, $nPa, $nMa, $nac, $dir, $sex, $dis, $gru) {
        $query = "Update alumno Set "
                . "nombres = ? , "
                . "telefono = ? , "
                . "nombrePapa = ? , "
                . "nombreMama = ? , "
                . "nacimiento = ? , "
                . "direccion = ? , "
                . "sexo = ? , "
                . "distritoID = ? , "
                . "grupoID = ? "
                . "Where alumnoID = ?";

        try {

            $conection = $this->conexion->startConnection();
            $stmt = $conection->prepare($query);
            $stmt->bind_param("sisssssiii",  $nom, $tel, $nMa, $nPa, $nac, $dir, $sex, $dis, $gru,$alumnoID);
//            var_dump($stmt->execute());
      
            if (!$stmt->execute()) {
                $info = "Execute failed";
            }
            
            $num_affected_rows = $stmt->affected_rows;
            $stmt->close();

            if ($num_affected_rows > 0) {
                $this->error = FALSE;
                $this->message = USER_UPDATED;
            } else {
                $this->error = TRUE;
                $this->message = USER_FAILED_UPDATED . "\n " . $info;;
            }
            
        } catch (Exception $exc) {

            $this->error = TRUE;
            $this->message = $exc->getCode();
        }

//        $this->conexion->closeConnection();
    }
    
    
    
    public function deleteAlumnoById($alumnoID){
        
       $query = "Delete From alumno "
              . "Where alumnoID=?;";
       
           try {

            $conection = $this->conexion->startConnection();
            $stmt = $conection->prepare($query);
            $stmt->bind_param("i",$alumnoID);
      
            if (!$stmt->execute()) {
                $info = "Execute failed";
            }
            
            $num_affected_rows = $stmt->affected_rows;
            $stmt->close();

            if ($num_affected_rows > 0) {
                $this->error = FALSE;
                $this->message = USER_DELETED;
            } else {
                $this->error = TRUE;
                $this->message = USER_FAILED_DELETED . "\n " . $info;;
            }
            
            
        } catch (Exception $exc) {

            $this->error = TRUE;
            $this->message = $exc->getMessage();
        }
       
//           $conection = $this->conexion->closeConnection();
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