<?php

class AccesoController {

    private $usuario;
    private $contraseña;
    private $conexion;
    private $message;
    private $isError;


    function __construct($usuario, $contraseña) {
        
        include_once "../database/database_mysql.php";
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
        $this->conexion = new Mysql_Conexion();
        $this->conexion->startConnection();
    }
    
    public function getMessage() {
        return $this->message;
    }
    
    function getIsError() {
        return $this->isError;
    }

    
    public function isUserExist() {
        $query = "Select * "
                . "From acceso "
                . "Where (usuarioID = " . $this->usuario . ");";
        
        $error = $this->conexion->getError();
        
        if (!$error) {
            
             $this->conexion->setQuery($query);
             $error = $this->conexion->getError();
            
           if (!$error) {
               return TRUE;
           }else{
             $this->message = "¡El usuario no existe!";
             $this->isError = TRUE;
             return FALSE;
           }
           
        }else{
            
            $mensaje = $this->conexion->getMessage();
            header("Location: ../view/index.php?message=$mensaje&isError=$this->isError");
            
        }
        
        $this->conexion->closeConnection();
        
    }
    
    
    public function Login() {
       $r = $this->isUserExist();
       
       if ($r === FALSE) {
           return FALSE;
       }else{
           
            $query = " Select *"
                    ." From acceso "
                    . "Where (usuarioID=$this->usuario AND contraseña='$this->contraseña');";

            $data = $this->conexion->setQuery(utf8_decode($query));
            $error = $this->conexion->getError();
     
            if ($error) {
                $this->message = "¡Usuario y/o contraseña incorrecta!";
                $this->isError = TRUE;
                return FALSE;
            }else{
              $param = $data[0]["usuarioID"];
              return $param;
            }
       }
    }
    
    
    public function getAllDataUser($usuarioID) {
        $query = "Select * From acceso acc
                  Inner Join profesor pro On acc.profesorID = pro.profesorID
                  Where usuarioID = $usuarioID;";
        
        $data = $this->conexion->setQuery(utf8_decode($query));
        $error = $this->conexion->getError();
        
        if (!$error) {
            return $data;
        }else{
            return FALSE;
        }
    }

}

?>