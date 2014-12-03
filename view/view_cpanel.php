<!DOCTYPE html>
<?php
/* * *** Includes **** */
include_once '../handler/handler_sesiones.php';
include_once '../model/model_profesor.php';
include_once './../handler/handler_sesiones.php';

$session = new SesionHandler("profesor");
$active = $session->isActiveSession();

if (!$active) {
    header("Location: login.php?message=sessión expirada");
    exit();
}
?>

<html>
    <head>
        <meta charset="UTF-8">

        <script src="../js/js_my_functions.js" type="text/javascript"></script>
        <link href="../css/css_general.css" rel="stylesheet" type="text/css"/>
        <link href="../css/css_header.css" rel="stylesheet" type="text/css"/>
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

        
        <div class="display">
            <!--    <div class="swipe-area"></div>
                    <a href="#" data-toggle=".container" id="sidebar-toggle">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </a>
                    <div class="content">
                        <h1>Creando un menu swipeable para navegadores web y moviles</h1>
                        <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                    </div>
                </div>-->
            <?php include_once 'menu.php'; ?>
        </div>
        <!-- jQuery -->
        <script src="../js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Menu Toggle Script -->
        <script>
                    $("#sidebar-toggle").click(function(e) {
                        e.preventDefault();
                        $("#wrapper").toggleClass("toggled");
                    });
        </script>

    </body>
</html>
