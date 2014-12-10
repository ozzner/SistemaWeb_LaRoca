<?php
error_reporting(E_ALL ^ E_NOTICE);
/* * **************** INCLUDES ***************** */
include_once './../controller/controller_distrito.php';
include_once './../controller/controller_grupo.php';
include_once '../includes/usuario_insert.php';
include_once '../includes/usuario_content.php';


$oDistrito = new DistritoController();
$oGrupo = new GrupoController();

$grupos = $oGrupo->getAllData();
$distritos = $oDistrito->getAllData();


//var_dump($isError);
?>


<link href="../css/css_general.css" rel="stylesheet" type="text/css"/>
<link href="../css/css_usuario.css" rel="stylesheet" type="text/css"/>



<div id="content_usuario_main" class="MyContents">

    <div class="MyHeader">  
        <!--<h2  id="titulo">Mantenimiento de alumnos</h2>-->
    </div>

    <div id="control_alumno">
        <!--<div class="separador"></div>-->
        <ul class="nav_list" >
            <li><a href="?execute=opcion1&cmd=nuevo_alumno">Agregar</a></li>
            <li><a href="?execute=opcion1&cmd=alumno_modificar">Modificar</a></li>
            <li><a href="?execute=opcion1&cmd=alumno_listar">Eliminar</a></li>
        </ul>
        <!--<div class="separador"></div>-->
    </div>

    <br>
    <div id="content_usuario_submenu">
        <?php include($Usuario_contenido); ?>
    </div>



    <script src="../vendor/bootstrap-fileinput-master/js/fileinput.min.js" type="text/javascript"></script>

    <!--<script src="../js/jquery.js"></script>-->
<!--    <script src="../vendor/DataTable/js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="../vendor/bootstrap-fileinput-master/js/fileinput.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js"></script>-->

    <script>
        /* Initialize your widget via javascript as follows */
        $("#imagen").fileinput({
            previewFileType: "image",
//            browseClass: "btn btn-success",
            browseLabel: "buscar...",
//            browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
            removeClass: "btn btn-danger",
            removeLabel: "Borrar",
            removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
            uploadClass: "btn btn-info",
            uploadLabel: "Enviar",
            uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',
        });
    </script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        })

    </script>






</div>

