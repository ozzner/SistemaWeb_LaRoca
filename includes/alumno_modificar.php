<!DOCTYPE html>
<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once '../model/model_alumno.php';
include_once '../includes/usuario_update.php';
$message = $_REQUEST["message"];
$isError = $_REQUEST["isError"];
//var_dump($_REQUEST["usuarioID"]);

if ($_REQUEST["usuarioID"] !== "undefined" AND $_REQUEST["usuarioID"] !== "") {

    $alumnoID = $_REQUEST["usuarioID"];
    $oAlumno = new AlumnoController();
    $alumno = $oAlumno->getAlumnoById($alumnoID);
    $aMoldel = new AlumnoModel();

    $aMoldel->setAlumnoID($alumno[0]["alumnoID"]);
    $aMoldel->setCreatedAt($alumno[0]["createdAt"]);
    $aMoldel->setDireccion(utf8_encode($alumno[0]["direccion"]));
    $aMoldel->setDistritoID($alumno[0]["distritoID"]);
    $aMoldel->setFoto($alumno[0]["foto"]);
    $aMoldel->setGrupoID($alumno[0]["grupoID"]);
    $aMoldel->setNacimiento($alumno[0]["nacimiento"]);
    $aMoldel->setNombreMama(utf8_encode($alumno[0]["nombreMama"]));
    $aMoldel->setNombrePapa(utf8_encode($alumno[0]["nombrePapa"]));
    $aMoldel->setNombres(utf8_encode($alumno[0]["nombres"]));
    $aMoldel->setSexo($alumno[0]["sexo"]);
    $aMoldel->setTelefono($alumno[0]["telefono"]);
}else{
    header("Location: ?execute=opcion1&cmd=list");
}



?>
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
        <form method="post" action="#" id="form_view_user" enctype="multipart/form-data">

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

                        <fieldset style="color:#4876ff;">
                            <legend ><?php echo ($aMoldel->getNombres() . " - Cod[" . $aMoldel->getAlumnoID() . "]"); ?></legend>

                            <div class="agrupar">
                                <input required="true" id="alumnoID" name="alumnoID" value="<?php echo $aMoldel->getAlumnoID(); ?>" class="MyInput" type="text"  data-toggle="tooltip" data-placement="right" title="Código de alumno"/><br>
                                <input required="true" id="nom" name="nombres" value="<?php echo $aMoldel->getNombres(); ?>" class="MyInput" type="text" placeholder="Ingrese nombres" data-toggle="tooltip" data-placement="right" title="Nombres de alumno"/><br>
                                <input required="true" id="fech" name="fecha" value="<?php echo $aMoldel->getNacimiento(); ?>"  class="MyInput" type="date" placeholder="Fecha nacimiemto" data-toggle="tooltip" data-placement="right" title="Su cumpleaños"/><br>
                            </div>

                            <div class="v_separador" style="height: 140px;"></div>

                            <div class="MyRadioGroup">
                                <?php if ($aMoldel->getSexo() == 'M') { ?>
                                    <input type="radio" style="height: 20px;" class="MyInputRadio" checked="true" value="M" name="sexo" data-toggle="tooltip" data-placement="right" title="Sexo masculino"/>&nbsp;Masculino<br>
                                    <input type="radio" style="height: 20px;" class="MyInputRadio" value="F" name="sexo" data-toggle="tooltip" data-placement="right" title="Sexo femenino" />&nbsp;Femenino<br>
                                <?php } else { ?>
                                     <input type="radio" style="height: 20px;" class="MyInputRadio"  value="M" name="sexo" data-toggle="tooltip" data-placement="right" title="Sexo masculino"/>&nbsp;Masculino<br>
                                    <input type="radio" style="height: 20px;" class="MyInputRadio" checked="true" value="F" name="sexo" data-toggle="tooltip" data-placement="right" title="Sexo femenino" />&nbsp;Femenino<br>
                                <?php } ?>

                            </div>
                        </fieldset>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="padres">
                        <fieldset  style="color:#4876ff;">
                            <legend>Datos padres</legend>

                            <div class="agrupar">
                                <input  name="papa" value="<?php echo $aMoldel->getNombrePapa(); ?>"   class="MyInput" type="text" placeholder="Nombre de padre" data-toggle="tooltip" data-placement="bottom" title="Ingrese nombre de papá"/><br>
                            </div>
                            <div class="agrupar">
                                <input class="MyInput" name="mama" value="<?php echo $aMoldel->getNombreMama(); ?>" type="text" placeholder="Nombre de madre" data-toggle="tooltip" data-placement="top" title="Ingrese nombre de mamá"/><br>
                            </div>
                            <div class="agrupar">
                                <input  class="MyInput" id="cel" name="celular" value="<?php echo $aMoldel->getTelefono(); ?>" type="number" placeholder="993297151" data-toggle="tooltip" data-placement="bottom" title="Celular de referencia de papá o mamá en caso de emergencia"/><br>
                            </div>
                        </fieldset>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="ubicacion">
                        <fieldset style="color:#4876ff;">
                            <legend>Ubicación del alumno</legend>
                            <div class="agrupar">
                                <select required="true" name="grupo" class="MyDropdown" onclick="display_usgs_change()" data-toggle="tooltip" data-placement="top" title="Grupo al que pertenece">
                                    <?php foreach ($grupos as $key => $value) { ?>
                                        <option value="<?php echo $value['grupoID']; ?>"><?php echo ($value['nombre']); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="agrupar">
                                <select required="true" name="distrito"  class="MyDropdown" data-toggle="tooltip" data-placement="top" title="¿En qué distrito vive?">
                                    <?php foreach ($distritos as $key => $value) { ?>
                                        <option value="<?php echo $value['distritoID']; ?>"><?php echo ($value['nombre']); ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="agrupar">
                                <input required="true" value="<?php echo $aMoldel->getDireccion(); ?>" id="dire" name="direccion" class="MyInput" style="width: 300px;" type="text" placeholder="Ingrese dirección" data-toggle="tooltip" data-placement="bottom" title="Jr. Marañon 699 - Urb. José Galvez"/><br>
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
                            <input  id="imagen" name="imagen" type="file" value="<?php echo $aMoldel->getFoto(); ?>" class="file" multiple="true" data-show-upload="false" data-show-caption="true" >

                        </div>
                    </div>
                </div>
            </div>

            <button class="MyButton_blue" id="btnActualizarAlumno" type="submit">Actualizar</button><span id="message_usuario" ><?php echo $message; ?></span>
        </form>

    <!--<script src="../js/jquery.js"></script>-->
    <!--<script src="../js/bootstrap.min.js"></script>-->

<!--<script src="../js/jquery.js"></script>-->
<!--<script src="../vendor/DataTable/js/jquery-1.11.1.min.js" type="text/javascript"></script>-->
        <script src="../js/bootstrap.min.js"></script>




        <script>
                                    $(document).ready(function () {
                                        document.getElementById("alumnoID").disabled = true;
                                         $("#modificar_id").css({backgroundColor: '#8b0a50'});
                                        $('#btnActualizarAlumno').click(function () {

                                            if ($("#fech").val().length < 1 || $("#nom").val().length < 1 || $("#dire").val().length < 1) {
                                                MostrarMensaje();
                                                $("#message_usuario").removeClass();
                                                $("#message_usuario").addClass("MyInfo");
                                                $("#message_usuario").text("Los campos marcados de ROJO son OBLIGATORIOS.");
                                                OcultarMensaje();
                                            }else{
                                                 document.getElementById("alumnoID").disabled = false;
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
<?php } else if ($isError === NULL) { ?>
//        alert("is error es NULO");
                                            $("#message_usuario").removeClass();
<?php } else if ($isError == 0) { ?>
                                             
//                                                 alert("is error es FALSE");
                                            MostrarMensaje()
                                            $("#message_usuario").removeClass();
                                            $("#message_usuario").addClass("MySuccess");
                                            OcultarMensaje();
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
