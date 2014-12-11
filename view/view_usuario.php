<?php
error_reporting(E_ALL ^ E_NOTICE);
/* * **************** INCLUDES ***************** */
include_once './../controller/controller_distrito.php';
include_once './../controller/controller_grupo.php';
include_once '../controller/controller_alumno.php';

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


<!--Alumno config-->
<!--<link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>-->
<link href="../vendor/bootstrap-fileinput-master/css/fileinput.min.css" rel="stylesheet" type="text/css"/>
<!--<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->


<div id="content_usuario_main" class="MyContents">

    <div class="MyHeader">  
        <!--<h2  id="titulo">Mantenimiento de alumnos</h2>-->
    </div>
    <form method="post" action="#">
        <div id="control_alumno">
            <!--<div class="separador"></div>-->
            <ul class="nav_list" >
                <li><a href="?execute=opcion1&cmd=nuevo_alumno">Agregar</a></li>
                <li ><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg" id="target">Modificar</a></li>
                <li><a href="?execute=opcion1&cmd=alumno_listar">Eliminar</a></li>
            </ul>
            <!--<div class="separador"></div>-->
        </div>

        <br>
        <div id="content_usuario_submenu">
            <?php include($Usuario_contenido); ?>
        </div>

    </form>
    <!-- Button trigger modal -->
    <!--    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Launch demo modal
        </button>-->

    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ITEM</th>
                                <th>COD</th>
                                <th>NOMBRES</th>
                                <th>TELEFONO</th>
                                <th>PAPA</th>
                                <th>MAMA</th>
                                <th>NACIMIENTO</th>
                                <th>DIRECCION</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>ITEM</th>
                                <th>COD</th>
                                <th>NOMBRES</th>
                                <th>TELEFONO</th>
                                <th>PAPA</th>
                                <th>MAMA</th>
                                <th>NACIMIENTO</th>
                                <th>DIRECCION</th>
                            </tr>
                        </tfoot>
                        <tbody>


                            <?php foreach ($alumno as $key => $value) { ?>
                                <tr>
                                    <td><input class="MyInputRadio" type="radio" name="alumnoID" value="<?php echo $value["alumnoID"] ?>"/></td>   
                                    <td name="alumnoID"><?php echo utf8_encode($value["alumnoID"]) ?></td>
                                    <td name="alumnoID"><?php echo utf8_encode($value["nombres"]) ?></td>
                                    <td name="alumnoID"><?php echo $value["telefono"] ?></td>
                                    <td name="alumnoID"><?php echo utf8_encode($value["nombrePapa"]) ?></td>
                                    <td name="alumnoID"><?php echo utf8_encode($value["nombreMama"]) ?></td>
                                    <td name="alumnoID"><?php echo $value["nacimiento"] ?></td>
                                    <td name="alumnoID"><?php echo utf8_encode($value["direccion"]) ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>



    <script src="../vendor/bootstrap-fileinput-master/js/fileinput.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>


    <script>

        $("#target").click(function () {
            var usuarioID = $("td input:radio").val();
            location.href = "?execute=opcion1&cmd=modificar_alumno&usuarioID=" + usuarioID + "";
        });

    </script>

    <script>
        $("td input:radio").change(function () {
            var usuarioID = $(this).val();
            $("td input:radio").val(usuarioID);
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

