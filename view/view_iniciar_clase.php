<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">      
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">    
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/css_general.css" rel="stylesheet" type="text/css"/>
        <link href="../css/css_iniciar_clase.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body style="background: rgba(185,185,185,0.1);">
        <div class="MyContents" id="iniciar_clase_main_content">

            <div id="ini_estado">

                <div id="ini_encabezado">
                    &nbsp;&nbsp;<h4>Temas a cargo del profesor: </h4>&nbsp;[<span style="color: blue">&nbsp;Profesor Rolando Tapia&nbsp;</span>]
                </div><br><br>

                <div id="ini_sel_tema">
                    <select class="MyDropdown" id="ini_dropdown">
                        <option>Tema asociado numero 1</option>
                        <option>Otro Tema asociado numero 2</option>
                        <option>Ultimo otro Tema mas asociado numero 3</option>
                    </select>
                    <div id="ini_buttons">
                        <input type="button" class="MyButton_green" value="¡Iniciar!"/>
                        <input type="button" class="MyButton_red" value="¡Terminar!"/>
                    </div><br><br>
                    <div id="int__timer">
                        <input id="ini_hora" type="number" placeholder="00" min="0" max="23"/>&nbsp;Hrs.&nbsp;&nbsp;
                        <input id="ini_min" type="number" min="0" max="60" placeholder="00"/>&nbsp;Min.
                        <span id="int_tiempo_res">00:00</span> &nbsp;<span style="font-size: 14px;padding: 5px;">tiempo restante.</span>
                        <span id="ini_message" class="MySuccess">Mensajes por aqui</span>
                    </div><br><br><br>

                    <div id="int__timer2">
                        <span id="int_tiempo_res">1.-</span> <span style="font-size: 15px;padding: 5px;">Trajo biblia</span>
                        <span id="ini_message2" class="MyInfo">Pendiente</span>
                    </div>
                    <div id="int__timer2">
                        <span id="int_tiempo_res">2.-</span> <span style="font-size: 15px;padding: 5px;">Participación</span>
                        <span id="ini_message2" class="MyInfo">Pendiente</span>
                    </div>
                    <div id="int__timer2">
                        <span id="int_tiempo_res">3.-</span> <span style="font-size: 15px;padding: 5px;">Asistencia</span>
                        <span id="ini_message2" class="MyInfo">Pendiente</span>
                    </div>
                </div>
            </div>

            <div id="ini_info">
                <div id="ini_encabezado2">
                    <h4>Temas a cargo del profesor: </h4>
                </div><br>

                <div class="ini_row">
                    <i class="fa fa-hand-o-up"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span class="ini_participacion">Asistencia total de la clase</span><span style="color: blue" class="numbers">20/40 (50%)</span>
                </div>
                <div class="ini_row">
                      <i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span  class="ini_participacion">Alumnos con biblia</span><span style="color: blue" class="numbers">10/40 (20%)</span>
                </div>
                <div class="ini_row">
                  <i class="fa fa-graduation-cap"></i>&nbsp;&nbsp;<span  class="ini_participacion">Participación mayor</span><span class="numbers" style="color: blue">Shantal García Perez</span>
                </div>
                <br><br><br>
                <div id="init__notas">
                    <input id="int_inp_agregar" type="text" placeholder="Ingrese una nota o recordatorio" class="MyInput"/><input id="int_btn_agregar" class="MyButton_green" type="button" value="Agregar"/>
                </div>
                <div id="init_lista">
                    <select size="8"  id="init_lis_recordar">
                        <option>Recordar #1</option>
                        <option>Recordar #2</option>
                        <option>Recordar #3</option>
                    </select>
                </div>
            </div>
            
        </div>
    </body>
</html>
