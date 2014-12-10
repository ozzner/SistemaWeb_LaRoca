<?php

$exe = $_REQUEST["execute"];


if (isset($exe)) {

    switch ($exe) {

        case "opcion0":
            $titulo = "::: La roca :::";
            $contenido = "view_inicio.php";
            $submenu = "../includes/submenu_inicio.php";
            break;
        case "opcion1":
            $titulo = "Gestión de usuarios";
            $contenido = "view_usuario.php";
            $submenu = "../includes/submenu_usuario.php";
            break;
        case "opcion2":
            $titulo = "Iniciar clase";
            $contenido = "view_iniciar_clase.php";
            $submenu = "../includes/submenu_default.php";
            break;
        default :
            $contenido = "view_inicio.php";
            $submenu = "../includes/submenu_default.php";
    }
} else {
    $titulo = "Inicio";
    $contenido = "view_menu.php";
    $submenu = "../includes/submenu_default.php";
}
?>