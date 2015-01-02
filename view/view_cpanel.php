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
    header("Location: index.php?message=Su sessión ha expirado");
    exit();
}
?>

<html>
    <head>
        <meta charset="UTF-8">

        <script src="../js/js_my_functions.js" type="text/javascript"></script>
        <link href="../css/css_general.css" rel="stylesheet" type="text/css"/>
        <link href="../css/css_header.css" rel="stylesheet" type="text/css"/>

        <!-- Custom CSS -->
        <link href="../css/simple-sidebar.css" rel="stylesheet">
        <script src="../vendor/DataTable/js/jquery-1.11.1.min.js" type="text/javascript"></script>

    <!-- Fonts Awesone -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">    
        <title><?php echo $titulo; ?></title>
    </head>

    <body onload="startTime()">

        <header>
            <div id="content_bienvenida">
                <div id="bienvenida_content_logo"><a  href="?execute=opcion0"><img src="../resources/img/logo.png"/></a></div>
            </div>

            <div id="content_clock">
                <?php
                $MySession = unserialize($_SESSION["profesor"]);
//                var_dump($MySession);
                $name = ($MySession->getNombres());
                $cod = $MySession->getProfesorID();
                ?>
                <label id="profesorID"><?php echo "$name  -  Cod [00$cod]"; ?></label><br>
                <span id="reloj"></span>
            </div>

            <div id="content_logut">

                <select class="MyDropdown" id="session" onclick="display_usgs_change()">
                    <option id="spin_name" value="profesor"><?php echo $session->getSession_name(); ?></option>
                    <option id="spin_user" value="perfil"> Perfil</option>
                    <option id="spin_session" value="salir" >Cerrar sesión</option>
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
                            <a id="opcion3" href="?execute=opcion3">Enseñanzas</a>
                        </li>
                        <li>
                            <a id="opcion2" href="?execute=opcion2">Iniciar clase</a>
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

        <script>
            $("#sidebar-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>


    </body>
</html>
