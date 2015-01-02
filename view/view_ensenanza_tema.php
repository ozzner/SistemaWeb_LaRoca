<?PHP
include_once '../controller/controller_ensenanza.php';
include_once '../model/model_profesor.php';

session_start();
$profesor_session = unserialize($_SESSION["profesor"]);
$oEns = new EnsenanzaController();
$profesor = utf8_decode($profesor_session->getNombres());
//var_dump($profesor);
$json = $oEns->getEnsenanzaByEstadoAndProfesor(1, $profesor);
$data = json_decode($json, true);
$enseñanzas_1 = $data["data"];
//var_dump($json);
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">      
        <link href="../css/css_general.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../vendor/sweetalert-master/lib/sweet-alert.css" rel="stylesheet" type="text/css"/>
        <link href="../css/css_enseñanza.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body style="background: rgba(185,185,185,0.1);">
        <div class="MyContents" id="enseñanza_main_content">

            <div id="ens_tema">

                <div id="ens_tem_subcontent1">

                    <div id="ens_tem_cont_tit">
                        <h5 id="ens_tem_tit2">Total de enseñanzas:</h5><span id="ens_tem_count1" class="numbers">

                            <?PHP
                            if (is_array($enseñanzas_1)) {
                                echo count($enseñanzas_1);
                            } else {
                                echo '0';
                            }
                            ?>

                        </span>
                    </div>

                    <div id="ens_tem_cont_enseñanza">

                        <select size="7"  id="lista_ense">
                            <?PHP if (is_array($enseñanzas_1)) { ?>
                                <?php foreach ($enseñanzas_1 as $key => $value) { ?>
                                    <option value="<?php echo $value["ensenanzaID"]; ?>">
                                        <?php echo ($value["nombre"]); ?>
                                    </option>
                                <?php } ?>
                            <?php } ?>
                        </select>

                    </div><br><br>

                    <div id="ens_tem_cont_tit">
                        <h5 id="ens_tem_tit2">Número de temas:</h5><span id="ens_tem_count2" class="numbers">count</span>
                    </div>

                    <div id="ens_tem_cont_temas">
                        <select size="9" id="lista_tema">

                        </select>

                    </div>

                </div><!-- SUBCONTENT -->
                <div id="ens_tem_subcontent2">
                    <form id="ens_tem_form_1" method="POST" action="../includes/ensenanza_tema_listar.php">
                        [<span id="ens_tem_span">Enseñanza</span>]<br>
                        <input required="true" id="ens_tem_name" name="titulo" placeholder="Nombre del tema"  type="text" class="MyInput"/><br>
                        <textarea id="ens_tem_descri" name="descripcion" class="MyInput" placeholder="Descripción del tema max caracteres (245)" ></textarea><br>
                        <input type="button" id="ens_tem_btn_1"  class="MyButton_green"value="Agregar tema"/>
                    </form><br><br>

                    <form id="ens_tem_form_2" method="POST" action="../includes/ensenanza_tema_listar.php">
                        <input id="ens_tem_id" readOnly="true" name="temaID"  type="text" class="MyInput"/><br>
                        <input id="ens_tem_name" name="titulo" placeholder="Nombre del tema"  type="text" class="MyInput"/><br>
                        <textarea id="ens_tem_descri" name="descripcion" class="MyInput" placeholder="Descripción del tema max caracteres (245)" ></textarea>
                        <input type="button" id="ens_tem_btn_2" class="MyButton_blue"value="Actualizar tema"/>
                    </form>
                </div>

                <span id="idEndTem" hidden="true"></span>
            </div>

        </div>

        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/jquery.js"></script>
        <script src="../vendor/sweetalert-master/lib/sweet-alert.min.js" type="text/javascript"></script>



        <script type="text/javascript">
            $(document).ready(function () {
                $("#ens_tem_btn_1").prop("disabled", true);
                $("#ens_tem_btn_2").prop("disabled", true);


                $("#ens_tem_btn_1").click(function () {

                    var path = $("#ens_tem_form_1").attr('action');
                    var method = $("#ens_tem_form_1").attr('method');
                    var tema = $("#ens_tem_form_1 #ens_tem_name").val();
                    var id = $("#idEndTem").val();
                    var data = $("#ens_tem_form_1").serialize() + "&controller=" + 1 + "&id=" + id;
                    var c = 0;
                    if (id !== "" && tema !== "") {
                        $.ajax({
                            type: method,
                            url: path,
                            data: data,
                            dataType: 'json',
                            success: function (response) {

                                if (!response["error_status"]) {

                                    $("#lista_tema option").remove();
                                    $.each(response["data"], function (key, value) {
                                        $("#lista_tema").append(
                                                $("<option></option>")
                                                .text(value.titulo)
                                                .val(value.temaID));
                                        c++;
                                    });
                                    $('#ens_tem_form_1')[0].reset();
                                    $("#ens_tem_count2").text(c);
                                } else {
                                    $("#ens_tem_count2").text(0);
                                    $("#lista_tema option").remove();
                                }
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log(textStatus);
//                            console.log(errorThrown);
//                            console.log(jqXHR);
//                            console.log("no funciona");
                            }
                        }); //end ajax

                    } else {
                            swal({
                                title: "Campos en blanco.",
                                text: "Completar los campos con borde rojo, para poder agregar un tema.", 
                                type: "warning",
                                confirmButtonText: "Correcto",
                                confirmButtonColor: "#FFA500    ",
                            });
                    }


                });


                $("#lista_ense").change(function () {
                    $("#ens_tem_btn_1").prop("disabled", false);
                    var id = $(this).val();
                    var text = $("#lista_ense option:selected").text();
                    var path = "../includes/ensenanza_tema_listar.php";
                    var method = 'POST';
                    var c = 0;
                    $("#idEndTem").val(id);
                    $("#ens_tem_span").text(text);
//                    alert(texto);
                    $.ajax({
                        type: method,
                        url: path,
                        data: {controller: 0, id: id},
                        dataType: 'json',
                        success: function (response) {

                            if (!response["error_status"]) {

                                $("#lista_tema option").remove();
                                $.each(response["data"], function (key, value) {
                                    $("#lista_tema").append(
                                            $("<option></option>")
                                            .text(value.titulo)
                                            .val(value.temaID));
                                    c++;
                                });
                                $("#ens_tem_count2").text(c);
                            } else {
                                $("#ens_tem_count2").text(0);
                                $("#lista_tema option").remove();
                                console.log(response);
                            }

                        },
                        error: function (jqXHR, textStatus, errorThrown) {

                        }
                    });
                });



                $("#lista_tema").change(function () {
                    $("#ens_tem_btn_2").prop("disabled", false);
                    var id = $(this).val();
//                    var text = $("#lista_ense option:selected").text();
                    var path = "../includes/ensenanza_tema_listar.php";
                    var method = 'post';


                    $.ajax({
                        type: method,
                        url: path,
                        data: {controller: 2, id: id, temaID: id},
                        dataType: 'json',
                        success: function (response) {

                            if (!response["error_status"]) {

                                $.each(response["data"], function (key, value) {
                                    $("#ens_tem_form_2 #ens_tem_id").val(value.temaID);
                                    $("#ens_tem_form_2 #ens_tem_name").val(value.titulo);
                                    $("#ens_tem_form_2 #ens_tem_descri").val(value.descripcion);

                                });
                            }
                            console.log(response);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus);
                            console.log(jqXHR);
                            console.log(errorThrown);
                        }
                    });

                });


                $("#ens_tem_btn_2").click(function () {

                    var path = $("#ens_tem_form_2").attr('action');
                    var method = $("#ens_tem_form_2").attr('method');
                    var id = $("#idEndTem").val();
                    var data = $("#ens_tem_form_2").serialize() + "&controller=" + 3 + "&id=" + id;
                    var c = 0;

                    $.ajax({
                        type: method,
                        url: path,
                        data: data,
                        dataType: 'json',
                        success: function (response) {

                            if (!response["error_status"]) {

                                $.ajax({
                                    type: 'POST',
                                    url: "../includes/ensenanza_tema_listar.php",
                                    data: {controller: 0, id: id},
                                    dataType: 'json',
                                    success: function (response) {

                                        if (!response["error_status"]) {

                                            $("#lista_tema option").remove();
                                            $.each(response["data"], function (key, value) {
                                                $("#lista_tema").append(
                                                        $("<option></option>")
                                                        .text(value.titulo)
                                                        .val(value.temaID));
                                                c++;
                                            });
                                            $("#ens_tem_count2").text(c);
                                        } else {
                                            $("#ens_tem_count2").text(0);
                                            $("#lista_tema option").remove();
                                            console.log(response);
                                        }

                                    },
                                    error: function (jqXHR, textStatus, errorThrown) {

                                    }
                                });


                                $("#ens_tem_btn_2").prop("disabled", true);
                                $("#ens_tem_count2").text(c);
                            } else {
                                $("#ens_tem_count2").text(0);
                                $("#lista_tema option").remove();
                            }
                            console.log(response);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus);
                            console.log(jqXHR);
                            console.log(errorThrown);
                        }
                    }); //end ajax

                });//end click Function




            });//end document ready
        </script>


    </body>
</html>
