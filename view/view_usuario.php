<link href="../css/css_usuario.css" rel="stylesheet" type="text/css"/>
<div id="content_usuario_main" class="MyContents">


    <div class="MyHeader">
        <h3>Mantenimiento de usuarios</h3>
    </div>

    <div id="control_alumno">
        <div class="separador"></div>
        <ul class="nav_list" >
            <li><a href="#">Agregar</a></li>


            <li><a href="#">Modificar</a></li>


            <li><a href="#">Eliminar</a></li>
        </ul>
        <div class="separador"></div>
    </div>

    <br><br>
    <form method="post">

        <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#alumno" aria-controls="home" role="tab" data-toggle="tab">Alumno</a></li>
                <li role="presentation"><a href="#padres" aria-controls="profile" role="tab" data-toggle="tab">Padres</a></li>
                <li role="presentation"><a href="#ubicacion" aria-controls="messages" role="tab" data-toggle="tab">Ubicación</a></li>
                <li role="presentation"><a href="#foto" aria-controls="settings" role="tab" data-toggle="tab">Fotografía</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" id="tabContentID">
                <div role="tabpanel" class="tab-pane active" id="alumno">

                    <fieldset>
                        <legend>Datos alumno</legend>


                        <div class="agrupar">
                            <input class="MyInput" type="text" placeholder="Ingrese nombres" data-toggle="tooltip" data-placement="right" title="Nombres de alumno"/><br>
                            <input class="MyInput" type="date" placeholder="Fecha nacimiemto" data-toggle="tooltip" data-placement="right" title="Su cumpleaños"/><br>
                        </div>

                        <div class="v_separador"></div>

                        <div class="MyRadioGroup">
                            <input type="radio"  class="MyInputRadio" checked="true" value="M" name="sexo" data-toggle="tooltip" data-placement="right" title="Sexo masculino"/>&nbsp;Masculino<br>
                            <input type="radio" class="MyInputRadio" value="F" name="sexo" data-toggle="tooltip" data-placement="right" title="Sexo femenino" />&nbsp;Fenemenino<br>
                        </div>
                    </fieldset>

                </div>
                <div role="tabpanel" class="tab-pane" id="padres">
                    <fieldset>
                        <legend>Datos padres</legend>

                        <div class="agrupar">
                            <input class="MyInput" type="text" placeholder="Nombre de padre" data-toggle="tooltip" data-placement="bottom" title="Ingrese nombre de papá"/><br>
                        </div>
                        <div class="agrupar">
                            <input class="MyInput" type="text" placeholder="Nombre de madre" data-toggle="tooltip" data-placement="top" title="Ingrese nombre de mamá"/><br>
                        </div>
                        <div class="agrupar">
                            <input class="MyInput" type="number" placeholder="993297151" data-toggle="tooltip" data-placement="bottom" title="Celular de referencia de papá o mamá en caso de emergencia"/><br>
                        </div>
                    </fieldset>

                </div>
                <div role="tabpanel" class="tab-pane" id="ubicacion">
                    <fieldset>
                        <legend>Ubicación del alumno</legend>
                        <div class="agrupar">
                            <input class="MyInput" type="datetime" placeholder="Nombre de madre" data-toggle="tooltip" data-placement="top" title="Ingrese nombre de mamá"/><br>
                        </div>
                        <div class="agrupar">
                            <input class="MyInput" type="number" placeholder="993297151" data-toggle="tooltip" data-placement="bottom" title="Celular de referencia de papá o mamá en caso de emergencia"/><br>
                        </div>
                        <div class="agrupar">
                            <input class="MyInput" type="text" placeholder="Ingrese dirección" data-toggle="tooltip" data-placement="bottom" title="Jr. Marañon 699 - Urb. José Galvez"/><br>
                        </div>
                    </fieldset>

                </div>
                <div role="tabpanel" class="tab-pane" id="foto">...</div>
            </div>

        </div>
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
    </form>






</div>

