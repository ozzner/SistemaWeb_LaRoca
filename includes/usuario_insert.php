<?php

include_once '../handler/handler_image.php';

$nom = utf8_decode($_POST["nombres"]);
$nac = $_POST["fecha"];
$dir = utf8_decode($_POST["direccion"]);
$sex = $_POST["sexo"];
$dis = utf8_decode($_POST["distrito"]);
$gru = utf8_decode($_POST["grupo"]);
$nMa = utf8_decode($_POST["mama"]);
$nPa = utf8_decode($_POST["papa"]);


if (!empty($nom) and ! empty($dir) and ! empty($nac)) {
    include_once '../controller/controller_alumno.php';
    include_once '../util/util_constants.php';
    $oAlum = new AlumnoController();
    $oImage = new ImageHandler();


    $tel = utf8_decode($_POST["celular"]);

    if (strlen($_FILES['imagen']["name"]) > 0 and $_POST["celular"] !== '') {
//        echo 'Imagen y celular llenos';
        if ($oAlum->isPhoneExist($tel)) {
            $message = $oAlum->getMessage();
            $isError = $oAlum->getError();
        } else {

            $r = $oImage->getImgNombre();

            if ($r != FALSE) {
                $photo = $r;
                $oAlum->storeNewAlumno($nom, $tel, $nMa, $nPa, $nac, $dir, $photo, $sex, $dis, $gru);
                $message = $oAlum->getMessage();
                $isError = $oAlum->getError();
            } else {
                $message = $oImage->getMessage();
                $isError = $oImage->getIsError();
            }
        }
    } else if (strlen($_FILES['imagen']["name"]) <= 0 and strlen($_POST["celular"]) <= 0) {
//        var_dump($_FILES['imagen']["name"]);
//        var_dump($_POST["celular"]);

//        echo 'Imagen y celular vacios';
        $photo = "Imagen_pendiente";
        $oAlum->storeNewAlumno($nom, null, $nMa, $nPa, $nac, $dir, $photo, $sex, $dis, $gru);
        $message = $oAlum->getMessage();
        $isError = $oAlum->getError();
//        var_dump($isError);
        
    } else if (strlen($_POST["celular"]) > 0 and strlen($_FILES['imagen']["name"]) <= 0) {
//        echo 'Solo celular lleno y imagen vacia';
//        $r = $oImage->getImgNombre();
        $photo = "Imagen_pendiente";
        var_dump($_FILES['imagen']["name"]);    
       
        if (!$oAlum->isPhoneExist($tel)) {
            $oAlum->storeNewAlumno($nom, $tel, $nMa, $nPa, $nac, $dir, $photo, $sex, $dis, $gru);
        }

        $message = $oAlum->getMessage();
        $isError = $oAlum->getError();
    } else {
//        echo 'celular vacio imagen llena';
        $r = $oImage->getImgNombre();

        if ($r != FALSE) {
            $photo = $r;
            $oAlum->storeNewAlumno($nom, null, $nMa, $nPa, $nac, $dir, $photo, $sex, $dis, $gru);
            $message = $oAlum->getMessage();
            $isError = $oAlum->getError();
        } else {
            $message = $oImage->getMessage();
            $isError = $oImage->getIsError();
        }
    }
}
?>