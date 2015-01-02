<?php
include_once '../controller/controller_ensenanza.php';
$oEns = new EnsenanzaController();

if ($_REQUEST["ensenanzaID"] !== "undefined") {
$ensenanzaID = $_REQUEST["ensenanzaID"];

//var_dump($ensenanzaID);
$oEns->deleteEnsenanzaById($ensenanzaID);
$message = $oEns->getMessage();

//echo $message;
header("Location: ../view/view_cpanel.php?execute=opcion1&cmd=lista&message=$message");

}else{
    echo 'Error.';
}


?>