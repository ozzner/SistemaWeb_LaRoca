<!DOCTYPE html>
<?php
/* * *** Includes **** */
include_once '../handler/handler_sesiones.php';
include_once '../model/model_profesor.php';
include_once './../handler/handler_sesiones.php';

$session = new SesionHandler("profesor");
$active = $session->isActiveSession();

if (!$active) {
    header("Location: index.php?message=sessión expirada");
    exit();
}
?>

<html>
    <head>
        <meta charset="UTF-8">
  
        <script src="../js/js_my_functions.js" type="text/javascript"></script>
        <link href="../css/css_general.css" rel="stylesheet" type="text/css"/>
        <link href="../css/css_header.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../css/style_menu.css" title="style css" type="text/css" media="screen" charset="utf-8">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="../js/jsplug.js" type="text/javascript"></script>
        <title>La Roca system</title>
    </head>
    <body onload="startTime()">


        <header>
            <div id="content_bienvenida">
                <div id="bienvenida_content_logo"><img src="../img/logo.gif"/></div>
            </div>

            <div id="content_clock">
                <?php
                $name = utf8_encode($_SESSION["profesor"]->getNombres());
                $cod = $_SESSION["profesor"]->getProfesorID();
                echo "<label>$name - Cod[00$cod]</label><br>";
                ?>
                <span id="clock"></span>
            </div>

            <div id="content_logut">

                <select class="MyDropdown" id="session" onclick="display_usgs_change()">
                    <option value="profesor"><?php echo $session->getSession_name(); ?></option>
                    <option value="perfil">Perfil</option>
                    <option value="salir" >Cerrar sesión</option>
                </select>

            </div>

        </header>
        
        <div class="container">
    <div id="sidebar">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Potafolio</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="#">Contacto</a></li>
        </ul>
    </div>
    <div class="main-content">
    <div class="swipe-area"></div>
        <a href="#" data-toggle=".container" id="sidebar-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="content">
            <h1>Creando un menu swipeable para navegadores web y moviles</h1>
            <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
        </div>
    </div>
    </div>

    </body>
</html>
