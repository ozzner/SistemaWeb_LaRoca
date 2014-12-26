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


    session_start();
    $MySession = unserialize($_SESSION["profesor"]);
//    var_dump($MySession);
    $nombre = $MySession->getNombres();
    var_dump($nombre);
    var_dump($enseñanzaID);

    $oEns = new EnsenanzaController();
    $oEns->updateEnsenanza($nombre, $controller, $enseñanzaID);
    $isError = $oEns->getError();
    $mensaje = $oEns->getMessage();

    header("Location: ../view/view_cpanel.php?execute=opcion3&isError=$isError&message=$mensaje");
} else {
   
//   header("Location: ../view/view_cpanel.php?execute=opcion3&isError=$isError&message=$mensaje");
}