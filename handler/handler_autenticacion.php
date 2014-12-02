<?php


include_once '../controller/controller_acceso.php';
include_once '../model/model_profesor.php';
include_once '../handler/handler_sesiones.php';


$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];

if (!empty($contraseña) and !empty($usuario)) {

     $acceso = new AccesoController($usuario, $contraseña);
     $r =  $acceso->Login();
     
    if ( $r === FALSE) {
       $message = $acceso->getMessage();
       header("Location: ../view/index.php?message=$message");
    }else{
        
         $usuarioID = $r;
         $data = $acceso->getAllDataUser($usuarioID);
         $oProfesor = new ProfesorModel();
         
         $oProfesor->setCelular($data[0]["nombres"]);
         $oProfesor->setProfesorID($data[0]["profesorID"]);
         $oProfesor->setGrupoID($data[0]["grupoID"]);
         
         $oSession = new SesionHandler("profesor");
         $oSession->storeMySession($oProfesor);
         
         header("Location: ../view/view_cpanel.php?usuarioID=$userID");
    }  
    
} else {
    $message = "Ningún campo debe estar vacio";
    header("Location: ../view/index.php?message=$message");
}
?>