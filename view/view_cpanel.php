<!DOCTYPE html>
<?php
error_reporting(E_ALL ^ E_NOTICE);
/* * *** Includes **** */
include_once '../includes/admin_content.php';
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
        <link href="../css/css_header.css" rel="stylesheet" type="text/css"/>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/simple-sidebar.css" rel="stylesheet">
        <script src="../vendor/jquery-2.1.1/jquery-2.1.1.min.js" type="text/javascript"></script>

        <title>La Roca system</title>
    </head>
    <body onload="startTime()">


        <header>
            <div id="content_bienvenida">
                <div id="bienvenida_content_logo"><img src="../resources/img/logo.gif"/></div>
            </div>

            <div id="content_clock">
                <?php
                $name = utf8_encode($_SESSION["profesor"]->getNombres());
                $cod = $_SESSION["profesor"]->getProfesorID();
                ?>
                <label id="profesorID"><?php echo "$name - Cod[00$cod]"; ?></label><br>
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

            <script>
                $(document).ready(function () {

                    $("#opcion1").click(function () {
                        $("#gestion_usuario").show();
                    });

                    $("#opcion2").click(function () {
                        $("#gestion_usuario").hide();
                    });
                });
            </script>




            <div id="page-content-wrapper" class="MyMenu">
                
                <div id="menu_icon">
                    <a href="#sidebar-toggle" id="sidebar-toggle">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </a>
                </div>

                <div id="gestion_usuario">
                    
                    <ul class="nav_list">
                        <li>
                            <a href="#">Alumno</a>
                        </li>
                        <li>
                            <a href="#">Profesor</a>
                        </li>
                    </ul>
                    
                </div>
                
            </div>

            <div id="wrapper">


                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">

                        <li>
                            <a id="opcion1" href="?execute=opcion1">Gestión de usuarios</a>
                        </li>
                        <li>
                            <a  id="opcion2" href="#">Iniciar clase</a>
                        </li>
                        <li>
                            <a href="#">Enseñanzas</a>
                        </li>
                        <li>
                            <a href="#">Análisis y búsqueda</a>
                        </li>
                        <li>
                            <a href="#">Generar reportes</a>
                        </li>
                        <li>
                            <a href="#">Ministerios la roca</a>
                        </li>
                    </ul>
                </div>



                <div id="page-content-wrapper">
                    <?php include ($contenido); ?>
                </div>


            </div>



        </div>
        <!-- jQuery -->
        <script src="../js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Menu Toggle Script -->
        <script>
                $("#sidebar-toggle").click(function (e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });
        </script>

    </body>
</html>
