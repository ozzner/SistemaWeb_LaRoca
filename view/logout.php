<?php
include_once '../handler/handler_sesiones.php';
$session = new SesionHandler("profesor");
$session->destroySession();

header("Location: index.php?message=sessión terminada.");

?>
