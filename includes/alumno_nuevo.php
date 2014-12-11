<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">

        <!--Alumno config-->
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../vendor/bootstrap-fileinput-master/css/fileinput.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <title></title>
    </head>
    <body>
        <form method="post" action="" id="form_view_user" enctype="multipart/form-data">

            <div role="tabpanel" id="alumno_content">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist" id="myTab" >
                    <li role="presentation" class="active"><a href="#alumno" aria-controls="home" role="tab" data-toggle="tab">Alumno</a></li>
                    <li role="presentation"><a href="#padres" aria-controls="profile" role="tab" data-toggle="tab">Padres</a></li>
                    <li role="presentation"><a href="#ubicacion" aria-controls="messages" role="tab" data-toggle="tab">Ubicación</a></li>
                    <li role="presentation"><a href="#foto" aria-controls="settings" role="tab" data-toggle="tab">Fotografía</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content" id="tabContentID">
                    <div role="tabpanel" class="tab-pane active" id="alumno">

                        <fieldset>
                            <legend>Datos del nuevo alumno</legend>


                            <div class="agrupar">
                                <input required="true" id="nom" name="nombres" class="MyInput" type="text" placeholder="Ingrese nombres" data-toggle="tooltip" data-placement="right" title="Nombres de alumno"/><br>
                                <input required="true" id="fech" name="fecha"  class="MyInput" type="date" placeholder="Fecha nacimiemto" data-toggle="tooltip" data-placement="right" title="Su cumpleaños"/><br>
                            </div>

                            <div class="v_separador"></div>

                            <div class="MyRadioGroup">
                             
                                    <input type="radio" style="height: 20px;" class="MyInputRadio" checked="true" value="M" name="sexo" data-toggle="tooltip" data-placement="right" title="Sexo masculino"/>&nbsp;Masculino<br>
                                    <input type="radio" style="height: 20px;" class="MyInputRadio" value="F" name="sexo" data-toggle="tooltip" data-placement="right" title="Sexo femenino" />&nbsp;Femenino<br>
                            </div>
                        </fieldset>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="padres">
                        <fieldset>
                            <legend>Datos de sus padres</legend>

                            <div class="agrupar">
                                <input  name="papa"   class="MyInput" type="text" placeholder="Nombre de padre" data-toggle="tooltip" data-placement="bottom" title="Ingrese nombre de papá"/><br>
                            </div>
                            <div class="agrupar">
                                <input class="MyInput" name="mama"  type="text" placeholder="Nombre de madre" data-toggle="tooltip" data-placement="top" title="Ingrese nombre de mamá"/><br>
                            </div>
                            <div class="agrupar">
                                <input  class="MyInput" id="cel" name="celular" type="number" placeholder="993297151" data-toggle="tooltip" data-placement="bottom" title="Celular de referencia de papá o mamá en caso de emergencia"/><br>
                            </div>
                        </fieldset>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="ubicacion">
                        <fieldset>
                            <legend>Ubicación del alumno</legend>
                            <div class="agrupar">
                                <select required="true" name="grupo" class="MyDropdown" onclick="display_usgs_change()" data-toggle="tooltip" data-placement="top" title="Grupo al que pertenece">
                                    <?php foreach ($grupos as $key => $value) { ?>
                                        <option value="<?php echo $value['grupoID']; ?>"><?php echo utf8_encode($value['nombre']); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="agrupar">
                                <select required="true" name="distrito"  class="MyDropdown" data-toggle="tooltip" data-placement="top" title="¿En qué distrito vive?">
                                    <?php foreach ($distritos as $key => $value) { ?>
                                        <option value="<?php echo $value['distritoID']; ?>"><?php echo utf8_encode($value['nombre']); ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="agrupar">
                                <input required="true" id="dire" name="direccion" class="MyInput" style="width: 300px;" type="text" placeholder="Ingrese dirección" data-toggle="tooltip" data-placement="bottom" title="Jr. Marañon 699 - Urb. José Galvez"/><br>
                            </div>
                        </fieldset>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="foto">

                        <div id="foto_restricciones">
                            <h2>Restricciones</h2>
                            <h4>La imagen a subir debe cumplir las siguientes condiciones:</h4>
                            <ul>
                                <li>Debe ser menor a <span style="color: red">512KB</span></li>
                                <li>Extenciones permitidas: <span style="color: red">"image/jpg", "image/jpeg", "image/gif", "image/png"</span></li>
                            </ul>

                        </div>

                        <div id="foto_subir" >
    <!--                        <input id="imagen" type="file"  class="file"  data-show-preview="false" />-->
                            <input  id="imagen" name="imagen" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true" >

                        </div>
                    </div>
                </div>
            </div>

            <button class="MyButton" id="btnGrabarAlumno" type="submit">Grabar</button><span id="message_usuario" ><?php echo $message; ?></span>
        </form>

    <!--<script src="../js/jquery.js"></script>-->
    <!--<script src="../js/bootstrap.min.js"></script>-->

<!--<script src="../js/jquery.js"></script>-->
<!--<script src="../vendor/DataTable/js/jquery-1.11.1.min.js" type="text/javascript"></script>-->
        <script src="../js/bootstrap.min.js"></script>




        <script>
                                    $(document).ready(function () {

                                        $('#btnGrabarAlumno').click(function () {

                                            if ($("#fech").val().length < 1 || $("#nom").val().length < 1 || $("#dire").val().length < 1) {
                                                MostrarMensaje();
                                                $("#message_usuario").removeClass();
                                                $("#message_usuario").addClass("MyInfo");
                                                $("#message_usuario").text("Los campos marcados de ROJO son OBLIGATORIOS.");
                                                OcultarMensaje();
                                            }

<?php if ($message != '') { ?>
                                                OcultarMensaje();
<?php } ?>

                                        });

                                        $("#cel").keyup(function () {
                                            if ($("#cel").val().length > 9) {
                                                MostrarMensaje();
                                                $("#message_usuario").text("El número celular no puede ser mayor a 9 dígitos.");
                                                $("#message_usuario").removeClass();
                                                $("#message_usuario").addClass("MyWarning");
                                                //                    OcultarMensaje();
                                            } else {
                                                $("#message_usuario").removeClass();
                                                $("#message_usuario").text("");
                                            }
                                            //alert("kEY UP");

                                        });

<?php if ($isError == TRUE) { ?>

                                            //        alert("is error es true");
                                            MostrarMensaje()
                                            $("#message_usuario").removeClass();
                                            $("#message_usuario").addClass("MyError");
                                            OcultarMensaje();
<?php } else if ($isError === FALSE) { ?>
                                            //     alert("is error es FALSE");
                                            MostrarMensaje()
                                            $("#message_usuario").removeClass();
                                            $("#message_usuario").addClass("MySuccess");
                                            OcultarMensaje();
<?php } else if ($isError == NULL) { ?>
                                            //     alert("is error es NULO");
                                            $("#message_usuario").removeClass();

                                            //                $("#message_usuario").text("NADAA");
                                            //                alert("Nulooo");
<?php } ?>


                                    });
        </script>

        <script>
            function OcultarMensaje() {
                $("#message_usuario").fadeOut(4500);
            }

            function MostrarMensaje() {
                $("#message_usuario").fadeIn(0);
            }
        </script>



    </body>
</html>
