<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once '../controller/controller_ensenanza.php';

$oEnse = new EnsenanzaController();
$enseñanzas = $oEnse->getAllDataByEstado(0);
$enseñanzas2 = $oEnse->getAllDataByEstado(1);

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
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body style="background: rgba(185,185,185,0.2);">
        <div class="MyContents" id="enseñanza_main_content">


            <div id="ens_en_proceso">
                <div class="ens_titulo">
                    <span>ENSEÑANZAS PENDIENTES</span>
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
                        <?php foreach ($enseñanzas as $key => $values) { ?>
                            <tr>
                                <td class="cell_a"><?php echo utf8_encode($values["nombre"]) ?></td>
                                <td class="cell_b"><?php echo utf8_encode($values["fechaInicio"]) ?></td>
                                <td class="cell_b"><?php echo $values["fechaFin"] ?></td>
                                <td class="cell_c"><a id="iniciar_click" href="../includes/ensenanza_actualizar.php?controller=1&id=<?php echo ($values[utf8_decode("enseñanzaID")]); ?>"><img class="img_32" src="../resources/img/warning_3.png"/></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

            <div id="ens_terminado">
                <div class="ens_titulo">
                    <span>ENSEÑANZAS EN PROCESO</span>
                </div>
                <table  class="MyTable">
                    <thead>
                        <tr>
                            <th  class="row_a_2">NOMBRE</th>
                            <th  class="row_b_2">INICIO</th>
                            <th  class="row_b_2">FINAL</th>
                            <th  class="row_a_2">CREADO_POR</th>
                            <th  class="row_c_2">EDITAR</th>
                            <th  class="row_c_2">TERMINAR</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($enseñanzas2 as $key => $value) { ?>
                            <tr>
                                <td class="cell_a_2"><?php echo utf8_encode($value["nombre"]) ?></td>
                                <td class="cell_b_2"><?php echo utf8_encode($value["fechaInicio"]) ?></td>
                                <td class="cell_b_2" style="text-align: left;"><?php echo $value["fechaFin"] ?></td>
                                <td class="cell_a_2" style="text-align: left;"><?php echo utf8_encode($value["creadoPor"]) ?></td>
                                <td class="cell_c_2" ><a href="#" onclick="getId(this);" data-toggle="modal" data-target="#MyModal_edit" ><img style="width: 17px;height: 17px;" src="../resources/img/edit.png"/></a></td>
                                <td class="cell_c_2" ><a href="#" onclick="getId(this);" data-toggle="modal" data-target="#MyModal_terminar"  ><img id="ens_end" class="img_32"  src="../resources/img/warning_1.png"/></a></td>
                                <td hidden="true" id="ids"><?php echo utf8_encode($value[utf8_decode("enseñanzaID")]) ?></td>
                            </tr>
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

    </div>



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

                    <form >
                        <input disabled="true" name="nombre" type="text" style="width: 90%" class="MyInput" placeholder="Nombre de la enseñanza" required="true"  data-toggle="tooltip" data-placement="right" title="Nombre de la enseñanza"/><br>
                        <input disabled="true" name="fecha_inicio" type="date" style="width: 90%" class="MyInput" required="true"  data-toggle="tooltip" data-placement="left" title="Inicio de la enseñanza"/><br>
                        <input disabled="true" name="fecha_fin" type="date" style="width: 90%" class="MyInput"  data-toggle="tooltip" data-placement="right" title="Fecha fin (Opcional)" /><br><br>
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

</div>






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
    function getId(id) {
        var myId = $(id).parent().siblings(":last").text();
        $("#MyId").text(myId);
    }
</script>


<script>
    $(document).ready(function () {

        var path = $("#form_ens_term").attr('action');
        var method = $("#form_ens_term").attr('method');

//            var json = $("#form_ens_term").serialize();


        $("#form_ens_term").submit(function (e) {
            var id = $("#MyId").html();
//            alert(id);
            e.preventDefault();

            $.ajax({
                type: method,
                url: path,
                data: {id: id, controller: 2},
                success: function (response) {
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
