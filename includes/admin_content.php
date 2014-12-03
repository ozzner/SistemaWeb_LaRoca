<?php
    $exe = $_REQUEST["execute"];

    
    if (isset($exe)) {
    
        switch ($exe) {
            case "opcion1":
                $titulo = "Gestión de usuarios";
                $contenido = "view_usuario.php";
                break;
            default:
                $titulo = "Inicio";
                $contenido = "view_menu.php";
                break;
        }
        
}  else {
      $titulo = "Inicio";
      $contenido = "view_menu.php";
}


?>