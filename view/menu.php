<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/simple-sidebar.css" rel="stylesheet">
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>


        <script>
            $(document).ready(function() {

                $("#opcion1").click(function() {
                    $("#gestion_usuario").show();
                });

                $("#opcion2").click(function() {
                    $("#gestion_usuario").hide();
                });
            });
        </script>




        <div id="page-content-wrapper" class="MyMenu">
            <a href="#sidebar-toggle" id="sidebar-toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>

            <div class="sub_menu" id="gestion_usuario">
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

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">

                    <li>
                        <a id="opcion1" href="#">Gestión de usuarios</a>
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

            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->


            <div id="page-content-wrapper">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-lg-12">
                            <h1>Simple Sidebar</h1>
                            <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                            <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                            <!--                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>-->

                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->




    </body>

</html>
