<?php
error_reporting(E_ALL ^ E_NOTICE);
/* * **************** INCLUDES ***************** */
include_once './../controller/controller_distrito.php';
include_once './../controller/controller_grupo.php';
include_once '../controller/controller_alumno.php';

include_once '../includes/usuario_content.php';

$oDistrito = new DistritoController();
$oGrupo = new GrupoController();


$grupos = $oGrupo->getAllData();
$distritos = $oDistrito->getAllData();

//var_dump($isError);
?>


<link href="../css/css_general.css" rel="stylesheet" type="text/css"/>
<link href="../css/css_usuario.css" rel="stylesheet" type="text/css"/>


<!--Alumno config-->
<link href="../vendor/bootstrap-fileinput-master/css/fileinput.min.css" rel="stylesheet" type="text/css"/>



<div id="content_usuario_main" class="MyContents">

    <div class="MyHeader">  
        <!--<h2  id="titulo">Mantenimiento de alumnos</h2>-->
    </div>
    <form method="post" action="#">
        <div id="control_alumno">
            <!--<div class="separador"></div>-->
            <ul class="nav_list" >
                <li><a id="agregar_id" href="?execute=opcion1&cmd=nuevo_alumno">Agregar</a></li>
                <li><a id="listar_id" href="?execute=opcion1&cmd=alumno_listar">&nbsp;&nbsp;Listar&nbsp;&nbsp;</a></li>
                <li ><a id="modificar_id" href="#">Modificar</a></li>
                <li ><a id="eliminar_id" href="#" data-toggle="modal" data-target="#MyModal">Eliminar</a></li>

            </ul>
            <!--<div class="separador"></div>-->
        </div>
        <div id="radio_value"></div>
        <br>
        <div id="content_usuario_submenu">
            <?php include($Usuario_contenido); ?>
        </div>


        <?php if ($_REQUEST["usuarioID"] !== "undefined") { ?>

            <div class="modal fade" id="MyModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div style="background: orangered;color: white;font-size:20px;" class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">ELIMINAR ALUMNO</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            $var_php = "<script> var usuarioID = $(#radio_value).val();"
                                    . " document.write(usuarioID);</script>";
                            ?>

                            <p>¿Estás seguro que deseas eliminar al alumno con CODIGO = <?php echo $var_php; ?>&hellip;</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" style="background: orangered;color: white"class="btn btn-default" data-dismiss="modal">Salir</button>
                            <button type="button" id="btnEliminar" class="btn btn-primary">Eliminar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->  

        <?php } ?>

    </form>

    <script src="../vendor/bootstrap-fileinput-master/js/fileinput.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>


    <script>
        $(document).ready(function () {
            $('#example').dataTable();
            $("#listar_id").css({backgroundColor: '#8b0a50'});
        });
    </script>
    
    
    
    <script>

        $('table tr').click(function () {
            $(this).find('[type="radio"]').prop('checked', true);
            var usuarioID = $(this).find('[type="radio"]').val();

            $(this).removeAttr('style');
            $(this).css('background', '#b9b9b9');
            $(this).css('color', 'white');
            $("#radio_value").val(usuarioID);
        });

        $('td').click(function () {
            $('table tr').removeAttr('style');
        });

    </script>

    <script>
        $("td input:radio").click(function () {
            var usuarioID = $(this).val();
            $("#radio_value").val(usuarioID);
            $('table tr').removeAttr('style');

        });
    </script>

    <script>

        $("#modificar_id").click(function () {
            var usuarioID = $("#radio_value").val();
            location.href = "?execute=opcion1&cmd=modificar_alumno&usuarioID=" + usuarioID + "";
        });


        $("#btnEliminar").click(function () {
            var usuarioID = $("#radio_value").val();
            location.href = "../includes/usuario_delete.php?usuarioID=" + usuarioID;
        });

    </script>

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

