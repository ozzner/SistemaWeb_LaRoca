<?php
include_once '../controller/controller_alumno.php';
$oAlumno = new AlumnoController();

if ($_REQUEST["usuarioID"] !== "undefined") {
$usuarioID = $_REQUEST["usuarioID"];
$oAlumno->deleteAlumnoById($usuarioID);
$message = $oAlumno->getMessage();

header("Location: ../view/view_cpanel.php?execute=opcion1&cmd=lista&message=$message");
}else{
    header("Location: ../view/view_cpanel.php?execute=opcion1&cmd=nuevo_alumno");
}


?>