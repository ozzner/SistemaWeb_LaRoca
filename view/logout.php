<?php
include_once '../handler/handler_sesiones.php';
$session = new SesionHandler("profesor");
$session->destroySession();

header("Location: login.php?message=sessión terminada.");

?>
