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

        <!-- Bootstrap Core CSS -->
<!--        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>-->
        <!-- Custom CSS -->
        <link href="../css/simple-sidebar.css" rel="stylesheet">
        <!--<script src="../vendor/jquery-2.1.1/jquery-2.1.1.min.js" type="text/javascript"></script>-->
        <script src="../vendor/DataTable/js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <title><?php echo $titulo; ?></title>
    </head>
    <body onload="startTime()">

        <header>
            <div id="content_bienvenida">
                <div id="bienvenida_content_logo"><a  href="?execute=opcion0"><img src="../resources/img/logo.png"/></a></div>
            </div>

            <div id="content_clock">
                <?php
                $name = utf8_encode($_SESSION["profesor"]->getNombres());
                $cod = $_SESSION["profesor"]->getProfesorID();
                ?>
                <label id="profesorID"><?php echo "$name - Cod[00$cod]"; ?></label><br>
                <span id="reloj"></span>
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

            <div id="page-content-wrapper" class="MyMenu">

                <div id="menu_icon">
                    <a href="#sidebar-toggle" id="sidebar-toggle">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </a>
                </div>


                <!--INICIO-->
                <div  class="sub_menu">
                    <?php include ($submenu); ?>
                </div>

            </div>

            <div id="wrapper">

                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <li>
                            <a id="opcion0" href="?execute=opcion0">Inicio</a>
                        </li>
                        <li>
                            <a id="opcion1" href="?execute=opcion1">Gestión de usuarios</a>
                        </li>
                        <li>
                            <a id="opcion2" href="?execute=opcion2">Iniciar clase</a>
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



        <!-- Menu Toggle Script -->

<!--        <script src="../vendor/dataTables-1.10.4/js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="../vendor/dataTables-1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>-->

<!--        <script>
                    $(document).ready(function () {
                        $('#example').dataTable();
                    });
        </script>-->

        <script>
            $("#sidebar-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>


    </body>
</html>
