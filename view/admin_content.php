<?php
    $exe = $_REQUEST["execute"];

    
    if (isset($exe)) {
    
        switch ($exe) {
            case "opcion1":
                $titulo = "Gestión de usuarios";
                $contenido = "view_alumno.php";
                break;
            default:
                $titulo = "Inicio";
                $contenido = "menu.php";
                break;
        }
        
}  else {
      $titulo = "Inicio";
      $contenido = "menu.php";
}


?>