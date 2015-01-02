<?php

include_once '../controller/controller_tema.php';

/**
 * Description of enseñanza_crear
 *
 * @author Renzo Santillán
 */
if (isset($_REQUEST["id"]) And isset($_REQUEST["controller"])) {
//    require_once '../model/model_profesor.php';
    $enseñanzaID = $_REQUEST["id"];
    $controller = $_REQUEST["controller"];
//    $fechaInicio = $_REQUEST["inicio"];
//    $fechaFin = $_REQUEST["fin"];
//    $nombre = $_REQUEST["nombre"];
//    session_start();
//    $MySession = unserialize($_SESSION["profesor"]);
//    var_dump($MySession);
//    $creadoPor = $MySession->getNombres();
//    $terminadoPor = $MySession->getNombres();
//    var_dump($nombre);
//    var_dump($enseñanzaID);
//    var_dump($controller);
//    var_dump($fechaInicio);
//    var_dump($fechaFin);
//    var_dump($creadoPor);
//    var_dump($terminadoPor);

    $oTem = new TemaController();

    switch ($controller) {

        case 0:
            $array = $oTem->getTemasByEnsenanzaID($enseñanzaID);
            break;

        case 1:
            $titulo = utf8_decode($_POST["titulo"]);
            $descripcion = utf8_decode($_POST["descripcion"]);

            if (isset($titulo)) {

                $iResult = $oTem->insertTemaByEnsenanzaID($titulo, $descripcion, $enseñanzaID);
                if ($iResult == 0) {
                    $array = $oTem->getTemasByEnsenanzaID($enseñanzaID);
                }
            }
            break;

        case 2:
            $temaID = $_REQUEST["temaID"];
            $array = $oTem->getTemaByID($temaID);
            break;


        case 3:
            $temaID = utf8_decode($_POST["temaID"]);
            $titulo = utf8_decode($_POST["titulo"]);
            $descripcion = utf8_decode($_POST["descripcion"]);

            if (isset($titulo) And isset($temaID)) {

                $iResult = $oTem->updateTema($titulo, $descripcion, $enseñanzaID, $temaID);
               
                if ($iResult > 0) {
                    $array = $oTem->getTemaByID($temaID);
                } else {
                    return false;
                }
            } else {
                echo "Campos obligatorios";
                return false;
            }
            break;

        default:
            break;
    }

    echo $array;


//    header("Location: ../view/view_cpanel.php?execute=opcion3&isError=$isError&message=$mensaje");
} else {
    
}