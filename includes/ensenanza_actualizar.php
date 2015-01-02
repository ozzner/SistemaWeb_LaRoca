<?php

/**
 * Description of enseñanza_crear
 *
 * @author Renzo Santillán
 */
//$nombreEnseñanza = $_POST["nombre"];
//$fechaInicio = $_POST["fecha_inicio"];
//$fechaFin = $_POST["fecha_fin"];

if (isset($_REQUEST["id"]) and isset($_REQUEST["controller"])) {
    include_once '../controller/controller_ensenanza.php';
    require_once '../model/model_profesor.php';


    $enseñanzaID = $_REQUEST["id"];
    $controller = $_REQUEST["controller"];
    $fechaInicio = $_REQUEST["inicio"];
    $fechaFin = $_REQUEST["fin"];
    $nombre = utf8_decode($_REQUEST["nombre"]);

    session_start();
    $MySession = unserialize($_SESSION["profesor"]);
//    var_dump($MySession);
    $creadoPor = utf8_decode($MySession->getNombres());
    $terminadoPor = utf8_decode($MySession->getNombres());
//    
//    var_dump($nombre);
//    var_dump($enseñanzaID);
//    var_dump($controller);
//    var_dump($fechaInicio);
//    var_dump($fechaFin);
//    var_dump($creadoPor);
//    var_dump($terminadoPor);

    $oEns = new EnsenanzaController();
    $oEns->updateEnsenanza($fechaInicio, $fechaFin, $nombre, $creadoPor, $controller, $terminadoPor, $enseñanzaID);
    $isError = $oEns->getError();
    $mensaje = $oEns->getMessage();

    header("Location: ../view/view_cpanel.php?execute=opcion3&isError=$isError&message=$mensaje");
} else {
   
//   header("Location: ../view/view_cpanel.php?execute=opcion3&isError=$isError&message=$mensaje");
}