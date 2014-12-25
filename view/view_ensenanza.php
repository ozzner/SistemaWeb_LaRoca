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
                                <td class="cell_c"><a id="iniciar_click" href="../includes/ensenanza_actualizar.php?id=<?php echo ($values[utf8_decode("enseñanzaID")]); ?>"><img class="img_32" src="../resources/img/open_3.png"/></a></td>
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
                            <th  class="row_a_2">PROFESOR</th>
                            <th  class="row_c_2">ESTADO</th>
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
                                <td class="cell_c_2" style="padding-right: 0px;"><?php echo $value["estado"] ?></td>
                                <td class="cell_c_2"><a href="#" ><img class="img_32" src="../resources/img/done_2.png"/></a></td>
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

            <!--MODAL-->

            <div class="modal fade" id="MyModal2">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div style="background: #428bca;color: white;font-size:20px;" class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Registro de enseñanza</h4>
                        </div>
                        <div class="modal-body">
                            <div><h4 id="ens_pop_titulo">Nueva enseñanza</h4></div>

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
        $("#iniciar_click").click(function (){
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
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>

    </body>
</html>
