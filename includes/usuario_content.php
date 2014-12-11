
<?php

$exe = $_REQUEST["cmd"];

//echo 'Qeu pasa' . $exe;
if (isset($exe)) {

    switch ($exe) {
   
        case "nuevo_alumno":
//            echo 'Entro aqui_1 ' . $exe;
            $Usuario_contenido = '../includes/alumno_nuevo.php';
            break;
        case "modificar_alumno":
//              echo 'Entro aqui_2 ' . $exe;
            $Usuario_contenido = '../includes/alumno_modificar.php';
            break;
        case "eliminar_alumno":
//              echo 'Entro aqui_3 ' . $exe;
            $Usuario_contenido = "view_inicio.php";
            break;
        default :
//              echo 'Entro aqui_4 ' . $exe;
            $Usuario_contenido = "../includes/alumno_listar.php";
    }
} else {
   $Usuario_contenido = "../includes/alumno_listar.php";
}
?>