<?php

/**
 * Description of enseñanza_crear
 *
 * @author Renzo Santillán
 */

if (isset($_POST["nombre"]) and isset($_POST["fecha_inicio"])) {
    include_once '../controller/controller_ensenanza.php';
   $nombreEnseñanza = $_POST["nombre"];
   $fechaInicio = $_POST["fecha_inicio"];
   
   
   if (isset($_POST["fecha_fin"]) and $_POST["fecha_fin"] != "") {
       $fechaFin = $_POST["fecha_fin"];
   }
 
    $oEns = new EnsenanzaController();
    $oEns->storeNewEnsenanza( utf8_decode($nombreEnseñanza) , $fechaInicio, $fechaFin);
    $isError = $oEns->getError();
    $message = $oEns->getMessage();
    
    header("Location: ../view/view_cpanel.php?execute=opcion3&message=$message&isError=$isError");
} else {

}