<!DOCTYPE html>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$mensaje = $_REQUEST["message"];

if (isset($mensaje)) {
    $isError = $_REQUEST["isError"];
} else {
    $mensaje = "Ingrese sus credenciales";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../vendor/simple-sidebar-1.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../vendor/simple-sidebar-1.0.0/css/simple-sidebar.css" rel="stylesheet" type="text/css"/>
        <link href="../css/css_general.css" rel="stylesheet" type="text/css"/>
        <link href="../css/css_login.css" rel="stylesheet" type="text/css"/>
        <title>Login</title>
    </head>
    <body>
        <header>
        </header>

        <section id="main_login">
            <div id="div_login"><span id="encabezado_login"><?php echo $mensaje; ?></span></div>
            <form id="form_login" method="post" action="../handler/handler_autenticacion.php">


                <div class="controles_form_login">
                    <input autocomplete="off" autofocus="true" id="usuario_login" class="MyInput" type="text" placeholder="Usuario" name="usuario"/>
                    <input  autocomplete="off" id="clave_login" class="MyInput" type="password" placeholder="Contraseña" name="contraseña"/><br>
                    <input id="submit_login" class="MyButton_green" type="submit" value="Iniciar"/>
                    <div id="mensaje">
                        <label id="lblMensaje"> </label>
                    </div>
                </div>
            </form>

        </section>

        <script src="../js/jquery.js" type="text/javascript"></script>

        <script>
            $(document).ready(function () {
                $("#lblMensaje").removeClass();
                $("#lblMensaje").text("");
                $("#message_usuario").fadeIn(0);
                $("#encabezado_login").css({"color": "blue"});
                $("#encabezado_login").fadeOut(3500);



<?php if ($isError == TRUE) { ?>
                    $("#encabezado_login").removeClass();
                    $("#encabezado_login").css({"color": "red"});
<?php } else if ($isError === NULL) { ?>
                    $("#encabezado_login").removeClass();
<?php } else if ($isError == 0) { ?>

                    MostrarMensaje()
                    $("#encabezado_login").removeClass();
                    //                    $("#encabezado_login").addClass("MySuccess");
                    OcultarMensaje();

<?php } ?>

            });

        </script>


        <script>

            $("#usuario_login").hover(function () {

                $("#lblMensaje").removeClass();
                $("#lblMensaje").text("");

            });

            $("#usuario_login").keyup(function () {
                $(this).css({"color": "green"});
            });
            $("#usuario_login").focus(function () {
                $("#clave_login").css({"color": "black"});
                $(this).css({"color": "green"});
            });


            $("#clave_login").hover(function () {

                $("#lblMensaje").removeClass();
                $("#lblMensaje").text("");
            });

            $("#clave_login").keyup(function () {
                $(this).css({"color": "red"});
            });

            $("#clave_login").focus(function () {
                $(this).css({"color": "red"});
                $("#usuario_login").css({"color": "black"});
            });

            $("#submit_login").hover(function () {

                $("#clave_login").css({"color": "black"});
                $("#usuario_login").css({"color": "black"});
            });

        </script>


    </body>
</html>
