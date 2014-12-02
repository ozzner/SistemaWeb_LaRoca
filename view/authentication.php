<?php

$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];
 include_once '../controller/controller_acceso.php';

 var_dump($contraseña);
 var_dump($usuario);
if (!empty($contraseña) and !empty($usuario)) {

     $acceso = new AccesoController($usuario, $contraseña);
     $r =  $acceso->Login();
     
    if ( $r === FALSE) {
       $message = $acceso->getMessage();
       header("Location: index.php?message=$message");
    }else{
         $userID = $r;
         header("Location: view_cpanel.php?usuarioID=$userID");
    }  
    
} else {
    $message = "Ningún campo debe estar vacio";
    header("Location: index.php?message=$message");
}
?>