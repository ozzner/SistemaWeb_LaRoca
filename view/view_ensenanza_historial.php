<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once '../controller/controller_ensenanza.php';

$oEnse = new EnsenanzaController();
$enseñanzas_2 = $oEnse->getAllDataByEstado(-1);

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
    <body style="background: rgba(185,185,185,0.2);">
        <div class="MyContents" id="enseñanza_main_content">


            <div id="ens_historial">
                <div class="ens_titulo">
                    <span>HISTORIAL DE ENSEÑANZAS LA ROCA - (2: TERMINADO)</span>
                </div>
                <table  class="MyTable" id="tb_historial">
                    <thead>
                        <tr>
                            <th  class="row_a_3" style="width: 24.2%;" >NOMBRE_ENSEÑANZA</th>
                            <th  class="row_b_3">INICIO</th>
                            <th  class="row_b_3">FINAL</th>
                            <th  class="row_a_3" style="width: 17.5%;">CREADO_POR</th>
                            <th  class="row_c_3">ESTADO</th>
                            <th  class="row_b_3" style="width: 11.7%;">TERMINADO</th>
                            <th  class="row_a_3">TERMINADO_POR</th>
                            <th  class="row_b_3_1">ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP if (is_array($enseñanzas_2)) { ?>
                            <?php foreach ($enseñanzas_2 as $key => $value) { ?>
                                <tr>
                                    <td class="cell_a_3" ><?php echo ($value["nombre"]) ?></td>
                                    <td class="cell_b_3"><?php echo ($value["fechaInicio"]) ?></td>
                                    <td class="cell_b_3"><?php echo $value["fechaFin"] ?></td>
                                    <td class="cell_a_3" style="width: 16.5%;"><?php echo ($value["creadoPor"]) ?></td>
                                    <td class="cell_c_3" ><?php echo $value["estado"] ?></td>
                                    <td class="cell_b_3" ><?php echo $value["fechaTerminado"] ?></td>
                                    <td class="cell_a_3"  style="width: 15.5%;"><?php echo ($value["terminadoPor"]) ?></td>
                                    <td class="cell_d_3"><a onclick="getId(this);" href="#" data-toggle="modal" data-target="#MyModal_eliminar"  ><img class="img_32" src="../resources/img/delete.png"/></a></td>
                                    <td hidden="true" id="ids"><?php echo ($value[utf8_decode("ensenanzaID")]) ?></td>
                                </tr>
                            <?php } ?>  
                        <?php } ?>  
                    </tbody>
                </table>
                &nbsp;&nbsp;&nbsp;<span style="color:red;font-size: 14px;" class="numbers"><?php echo count($enseñanzas_2);?> registros</span>
            </div>

        </div>


        <!-- MODAL ELIMINAR  -->

        <div class="modal fade" id="MyModal_eliminar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div style="background:#ee2c2c;color: white;font-size:20px;" class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Eliminar enseñanza</h4>
                    </div>
                    <div class="modal-body">
                        <span hidden="true" id="MyId2"></span>
                        <img src="../resources/img/error.png"> <h4 id="ens_tit_info_modal">¿Seguro que desea ELIMINAR permanentemenrte esta enseñanza?</h4>

                        <form method="POST" action="../includes/ensenanza_eliminar.php" id="form_ens_elim">
                            <input value="Eliminar enseñanza"  id="acc_eliminar" type="submit" class="MyButton_red"/>
                        </form>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->  







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
            $(document).ready(function () {

                var path = $("#form_ens_elim").attr('action');
                var method = $("#form_ens_elim").attr('method');

//            var json = $("#form_ens_term").serialize();


                $("#form_ens_elim").submit(function (e) {
                    var id = $("#MyId2").html();
//                    alert(id);
                    e.preventDefault();

                    $.ajax({
                        type: method,
                        url: path,
                        data: {ensenanzaID: id},
                        success: function (response) {
                            location.reload();
                            console.log(response);
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
            function getId(id) {
                var myId = $(id).parent().siblings(":last").text();
                $("#MyId2").text(myId);
            }
        </script>

        <script>
            $("#iniciar_click").click(function () {
                OcultarMensajeFast();
            });
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
            });
        </script>

    </body>
</html>
