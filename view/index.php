<!DOCTYPE html>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$mensaje = $_REQUEST["message"];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../vendor/simple-sidebar-1.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../vendor/simple-sidebar-1.0.0/css/simple-sidebar.css" rel="stylesheet" type="text/css"/>
        <title>Login</title>
    </head>
    <body>
        <header>

        </header>
                
                <section id="main_login">
                    <div>Esto es un encabezado</div>
                    <form id="form_login" method="post" action="../handler/handler_autenticacion.php">
                        <h1>Inicia sesión con tu usuario y contraseña</h1>
                        <div class="controles_form">
                            <input type="text" placeholder="Usuario" name="usuario"/><br>
                            <input type="password" placeholder="Contraseña" name="contraseña"/><br>
                            <input type="submit" value="Iniciar"/>
                            <div>
                                <label><?php echo $mensaje; ?></label>
                            </div>
                        </div>
                        
                    </form>
                    
                </section>
 
    </body>
</html>
