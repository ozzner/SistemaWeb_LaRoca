<?php
include_once '../controller/controller_ensenanza.php';

$oEnse = new EnsenanzaController();
$enseñanzas = $oEnse->getAllDataByEstado(0);
$enseñanzas2 = $oEnse->getAllDataByEstado(1);
//var_dump($enseñanzas2);
if (isset($_REQUEST["isError"])) {

    $message = $_REQUEST["message"];
    $isError = $_REQUEST["isError"];
}
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../css/css_general.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/css_enseñanza.css" rel="stylesheet" type="text/css"/>

    </head>
    <body style="background: rgba(185,185,185,0.1);">
        <div class="MyContents" id="enseñanza_main_content">


            <div id="ens_en_proceso">
                <div class="ens_titulo">
                    <span>ENSEÑANZAS PENDIENTES - (0: CREADO)</span>
                </div>

                <table  class="MyTable">
                    <thead>
                        <tr>
                            <th  class="row_a">NOMBRE</th>
                            <th  class="row_b">INICIO</th>
                            <th  class="row_b">FINAL</th>
                            <th  class="row_c">INICIAR</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?PHP if (is_array($enseñanzas)) { ?>
                            <?php foreach ($enseñanzas as $key => $values) { ?>
                                <tr>
                                    <td class="cell_a"><?php echo ($values["nombre"]) ?></td>
                                    <td class="cell_b"><?php echo ($values["fechaInicio"]) ?></td>
                                    <td class="cell_b"><?php echo $values["fechaFin"] ?></td>
                                    <td class="cell_c"><a title="¡Click aqui para iniciar!"id="iniciar_click" href="../includes/ensenanza_actualizar.php?controller=1&id=<?php echo ($values[utf8_decode("ensenanzaID")]); ?>"><img class="img_32" src="../resources/img/warning_3.png"/></a></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

            <div id="ens_terminado">
                <div class="ens_titulo">
                    <span>ENSEÑANZAS EN PROCESO - (1: INICIADO)</span>
                </div>
                <table  class="MyTable" id="tb_terminar">
                    <thead>
                        <tr>
                            <th  class="row_a_2" style="width: 34.3%;">NOMBRE</th>
                            <th  class="row_b_2">INICIO</th>
                            <th  class="row_b_2">FINAL</th>
                            <th  class="row_a_2">A_CARGO_DE</th>
                            <th  class="row_c_2" style="width: 30%;">EDITAR</th>
                            <th  class="row_c_2">TERMINAR</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?PHP if (is_array($enseñanzas2)) { ?>
                            <?php foreach ($enseñanzas2 as $key => $value) { ?>
                                <tr>
                                    <td class="cell_a_2" style="width: 28.5%;"><?php echo ($value["nombre"]) ?></td>
                                    <td class="cell_b_2"><?php echo ($value["fechaInicio"]) ?></td>
                                    <td class="cell_b_2"><?php echo $value["fechaFin"] ?></td>
                                    <td class="cell_a_2" style="width: 28.3%;" ><?php echo ($value["creadoPor"]) ?></td>
                                    <td class="cell_c_2" style="widht: 3% !important; padding-left:2px;padding-right: 25px;" title="¡Editar enseñanza!" ><a href="#" onclick="getValues(this);" data-toggle="modal" data-target="#MyModal_edit" ><img style="width: 17px;height: 17px;" src="../resources/img/edit.png"/></a></td>
                                    <td class="cell_c_2" style="padding-left: 5px;padding-right: 5px;"><a href="#" onclick="getId(this);" title="¡Click para terminar!" data-toggle="modal" data-target="#MyModal_terminar"  ><img id="ens_end" class="img_32"  src="../resources/img/warning_1.png"/></a></td>
                                    <td hidden="true" id="ids"><?php echo ($value[utf8_decode("ensenanzaID")]) ?></td>
                                </tr>
                            <?php } ?>  
                        <?php } ?>  
                    </tbody>

                </table>
            </div>


            <div id="ens_button">
                <input type="button" value="Nueva enseñanza" data-toggle="modal" data-target="#MyModal2"  class="MyButton_green"/>
            </div>

            <div id="ens_message">
                <span id="message_ensenanza" ><?php echo $message; ?></span>
            </div>

            <!-- MODAL AGREGAR -->

            <div class="modal fade" id="MyModal2">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div style="background: #02a902;color: white;font-size:20px;" class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Registro de enseñanza</h4>
                        </div>
                        <div class="modal-body">
                            <div id="ens_pop_titulo" > <img src="../resources/img/done.png"></div><br>

                            <form method="POST" action="../includes/ensenanza_crear.php">
                                <input name="nombre" type="text" style="width: 90%" class="MyInput" placeholder="Nombre de la enseñanza" required="true"  data-toggle="tooltip" data-placement="right" title="Nombre de la enseñanza"/><br>
                                <input name="fecha_inicio" type="date" style="width: 90%" class="MyInput" required="true"  data-toggle="tooltip" data-placement="left" title="Inicio de la enseñanza"/><br>
                                <input name="fecha_fin" type="date" style="width: 90%" class="MyInput"  data-toggle="tooltip" data-placement="right" title="Fecha fin (Opcional)" /><br><br>
                                <input value="Crear" type="submit" id="ens_btn_submit" class="MyButton_green" required="true"/><br>
                            </form>
                        </div>
                        <!--                        <div class="modal-footer">
                                                    <button type="button" style="background: orangered;color: white"class="btn btn-default" data-dismiss="modal">Salir</button>
                                                    <button type="button" id="btnEliminar" class="btn btn-primary">Eliminar</button>
                                                </div>-->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->  

        </div>



        <!-- MODAL TERMINAR -->

        <div class="modal fade" id="MyModal_terminar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div style="background: #FFA500;color: white;font-size:20px;" class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Terminar enseñanza</h4>
                    </div>
                    <div class="modal-body">
                        <span hidden="true" id="MyId"></span>
                        <img src="../resources/img/warning.png">  <h4 id="ens_tit_info_modal">¿Seguro que desea terminar esta enseñanza?</h4>

                        <form method="POST" action="../includes/ensenanza_actualizar.php" id="form_ens_term">
                            <input value="Terminar"  id="acc_terminar" type="submit" class="MyButton_yellow"/>
                        </form>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->  

<!--    </div>-->



    <!-- MODAL EDITAR -->

    <div class="modal fade" id="MyModal_edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div style="background: #428bca;color: white;font-size:20px;" class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Modificación de enseñanza</h4>
                </div>
                <div class="modal-body">
                    <div  > <img style="width: 32px;height: 32px;"src="../resources/img/information.png"></div><br>

                    <form id="form_ens_edit" method="POST" action="../includes/ensenanza_actualizar.php">
                        <input id="idEns" disabled="true" name="id_ens" type="text" style="width: 90%" class="MyInput" placeholder="Nombre de la enseñanza" required="true"  data-toggle="tooltip" data-placement="right" title="Código de enseñanza"/><br>
                        <input id="nombre"  name="nombre" type="text" style="width: 90%" class="MyInput" placeholder="Nombre de la enseñanza" required="true"  data-toggle="tooltip" data-placement="right" title="Nombre de la enseñanza"/><br>
                        <input id="inicio"  name="fecha_inicio" type="date" style="width: 90%" class="MyInput" required="true"  data-toggle="tooltip" data-placement="left" title="Inicio de la enseñanza"/><br>
                        <input id="fin" name="fecha_fin" type="date" style="width: 90%" class="MyInput"  data-toggle="tooltip" data-placement="right" title="Fecha fin (Opcional)" /><br><br>
                        <input id="creado" disabled="true" name="creado_por" type="text" style="width: 90%" class="MyInput"  data-toggle="tooltip" data-placement="right" title="Enseñanza creada por:" /><br><br>
                        <input value="Actualizar" type="submit" id="ens_btn_submit" class="MyButton_blue" required="true"/><br>
                    </form>
                </div>
                <!--                        <div class="modal-footer">
                                            <button type="button" style="background: orangered;color: white"class="btn btn-default" data-dismiss="modal">Salir</button>
                                            <button type="button" id="btnEliminar" class="btn btn-primary">Eliminar</button>
                                        </div>-->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->  

<!--</div>-->






<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script src="../js/jquery.js"></script>

<script>
                                    $(document).ready(function () {


<?php if ($isError == TRUE) { ?>

                                            //                                                    alert("is error es true");
                                            MostrarMensaje()
                                            $("#message_ensenanza").removeClass();
                                            $("#message_ensenanza").addClass("MyError");
                                            OcultarMensaje();
<?php } else if ($isError === NULL) { ?>
                                            //        alert("is error es NULO");
                                            $("#message_ensenanza").removeClass();
<?php } else if ($isError == 0) { ?>

                                            //                                            alert("is error es FALSE");
                                            MostrarMensaje()
                                            $("#message_ensenanza").removeClass();
                                            $("#message_ensenanza").addClass("MySuccess");
                                            OcultarMensaje();

                                            //                $("#message_usuario").text("NADAA");
                                            //                alert("Nulooo");
<?php } ?>


                                    });
</script>

<script>
    function getValues(id) {
        var myId = $(id).parent().siblings(":last").text();
        var nombre = $(id).parent().siblings().eq(0).text();
        var inicio = $(id).parent().siblings().eq(1).text();
        var fin = $(id).parent().siblings().eq(2).text();
        var creado = $(id).parent().siblings().eq(3).text();

        console.log("ID:" + myId + "nombre:" + nombre + "inicio:" + inicio + "fin:" + fin + "creado:" + creado);

        $("#idEns").val(myId);
        $("#nombre").val(nombre);
        $("#inicio").val(inicio);
        $("#fin").val(fin);
        $("#creado").val(creado);

    }
</script>

<script>
    function getId(id) {
        var myId = $(id).parent().siblings(":last").text();
        $("#MyId").text(myId);
    }
</script>

<script>
    $(document).ready(function () {

//            var json = $("#form_ens_term").serialize();


        $("#form_ens_term").submit(function (e) {
            var path = $("#form_ens_term").attr('action');
            var method = $("#form_ens_term").attr('method');
            var id = $("#MyId").html();

//            alert(path + " path");
            e.preventDefault();

            $.ajax({
                type: method,
                url: path,
                data: {id: id, controller: 2},
                success: function (response) {
//                $( "#contact-edit" ).dialog("close");
                    location.reload();
                    console.log(response)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(errorThrown);
                    console.log(jqXHR);
                }

            }); // Ajax Call
        });


        $("#form_ens_edit").submit(function (e) {
            var path = $("#form_ens_edit").attr('action');
            var method = $("#form_ens_edit").attr('method');
//            var json = $("#form_ens_term").serialize();
            var id = $("#idEns").val();
            var name = $("#nombre").val();
            var start = $("#inicio").val();
            var end = $("#fin").val();
//            var created = $("#creado").val();

//            alert(id);
            e.preventDefault();

            $.ajax({
                type: method,
                url: path,
                data: {controller: 0, id: id, nombre: name, inicio: start, fin: end},
                success: function (response) {
//                $( "#contact-edit" ).dialog("close");
                    location.reload();
                    console.log(response)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(errorThrown);
                    console.log(jqXHR);
                }

            }); // Ajax Call
        });

    }); //document.ready

</script>

<script>
    function OcultarMensaje() {
        $("#message_ensenanza").fadeOut(4500);
    }
    function OcultarMensajeFast() {
        $("#message_ensenanza").fadeOut(0);
    }

    function MostrarMensaje() {
        $("#message_ensenanza").fadeIn(0);
    }
</script>


<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>

</body>
</html>
