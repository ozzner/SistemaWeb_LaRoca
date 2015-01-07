<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="../vendor/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css"/>
        <link href="../vendor/bootstrap-checkbox-x/css/checkbox-x.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/css_general.css" rel="stylesheet" type="text/css"/>
        <link href="../css/css_iniciar_clase.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body style="background: rgba(185,185,185,0.1);">
        
        <div class="MyContents" id="iniciar_clase_main_content">
            
            &nbsp; &nbsp; &nbsp; &nbsp;<input id="ini_button_switch" type="checkbox" name="my-checkbox"> &nbsp; &nbsp; &nbsp;<input id="ini_button_grabar" value="Grabar" type="button" class="MyButton_green"><br><br>
            
            <div id="ini_asis_table1">

                <table  class="MyTable" id="ini_tb_asistencia">
                    <thead>
                        <tr>
                            <th style="width: 20%!important;">CODIGO</th>
                            <th>NOMBRE_DE_  ALUMNO</th>
                            <th style="width: 20%!important;">ASISTENCIA</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td style="width: 20%!important;">1010</td>
                            <td>Shantal Garcia Perez</td>
                            <td  style="width: 15%!important;">
                                <div class="form-group has-warning">
                                    <input id="check-1h" name="check-1h" value="0" data-toggle="checkbox-x" type="checkbox" data-size="sm">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%!important;">1010</td>
                            <td>Shantal Garcia Perez</td>
                            <td  style="width: 15%!important;">
                                <div class="form-group has-warning">
                                    <input id="check-1h" name="check-1h" value="0" data-toggle="checkbox-x" type="checkbox" data-size="sm">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%!important;">1010</td>
                            <td>Shantal Garcia Perez</td>
                            <td  style="width: 15%!important;">
                                <div class="form-group has-warning">
                                    <input id="check-1h" name="check-1h" value="0" data-toggle="checkbox-x" type="checkbox" data-size="sm">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%!important;">1010</td>
                            <td>Shantal Garcia Perez</td>
                            <td  style="width: 15%!important;">
                                <div class="form-group has-warning">
                                    <input id="check-1h" name="check-1h" value="0" data-toggle="checkbox-x" type="checkbox" data-size="sm">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%!important;">1010</td>
                            <td>Shantal Garcia Perez</td>
                            <td  style="width: 15%!important;">
                                <div class="form-group has-warning">
                                    <input id="check-1h" name="check-1h" value="0" data-toggle="checkbox-x" type="checkbox" data-size="sm">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%!important;">1010</td>
                            <td>Shantal Garcia Perez</td>
                            <td  style="width: 15%!important;">
                                <div class="form-group has-warning">
                                    <input id="check-1h" name="check-1h" value="0" data-toggle="checkbox-x" type="checkbox" data-size="sm">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%!important;">1010</td>
                            <td>Shantal Garcia Perez</td>
                            <td  style="width: 15%!important;">
                                <div class="form-group has-warning">
                                    <input id="check-1h" name="check-1h" value="0"  data-toggle="checkbox-x" type="checkbox" data-size="sm">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%!important;">1010</td>
                            <td>Shantal Garcia Perez</td>
                            <td  style="width: 15%!important;">
                                <div class="form-group has-warning">
                                    <input id="check-1h" name="check-1h" value="0"  data-toggle="checkbox-x" type="checkbox" data-size="sm">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%!important;">1010</td>
                            <td>Shantal Garcia Perez</td>
                            <td  style="width: 15%!important;">
                                <div class="form-group has-warning">
                                    <input id="check-1h" name="check-1h" value="0" data-toggle="checkbox-x" type="checkbox" data-size="sm">
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>


                <div id="ini_info2">
                    
                    <div id="ini_encabezado2">
                        <h4 style="color: blue;">Información de la asistencia</h4>
                    </div><br>

                    <div class="ini_row">
                       <i class="fa fa-calendar"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span class="ini_participacion">Fecha de ejecución</span><span class="numbers">20-ene-2015</span>
                    </div>
                    <div class="ini_row">
                        <i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span class="ini_participacion">Profesor a cargo</span><span class="numbers">Renzo Santillán Chavez</span>
                    </div>
                    <hr>
                    <div class="ini_row">
                        <i class="fa fa-flag"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span class="ini_participacion">Numero de alumnos que asistieron</span><span class="numbers">20/40 (50%)</span>
                    </div>
                    <div class="ini_row">
                        <i class="fa fa-flag-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span class="ini_participacion">Numero de alumnos que NO asistieron</span><span class="numbers">10/40 (20%)</span>
                    </div>
                    <hr>
                    <div class="ini_row">
                        <i class="fa fa-users"></i>&nbsp;&nbsp;<span class="ini_participacion"><strong>Total de alumnos</strong></span><span ><strong class="numbers">38/40 (98.95%)</strong></span>
                    </div>
                    <br><br>
                    <!--                <div id="init__notas">
                                        <input id="int_inp_agregar" type="text" placeholder="Ingrese una nota o recordatorio" class="MyInput"/><input id="int_btn_agregar" class="MyButton_green" type="button" value="Agregar"/>
                                    </div>-->
                    <!--                <div id="init_lista">
                                        <select size="8"  id="init_lis_recordar">
                                            <option>Recordar #1</option>
                                            <option>Recordar #2</option>
                                            <option>Recordar #3</option>
                                        </select>
                                    </div>-->
                </div>

            </div>


        </div>

        <script src="../js/jquery.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="../vendor/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
        <script src="../vendor/bootstrap-checkbox-x/js/checkbox-x.min.js" type="text/javascript"></script>

        <script>
            $("[name='my-checkbox']").bootstrapSwitch();
        </script>

        <script>

            $('table tr').click(function () {
                $(this).find('[type="checkbox"]').prop('checked', true);
//                var usuarioID = $(this).find('[type="checkbox"]').val();
//                $("table tr td div").removeClass();
                $(this).removeAttr('style');
                $(this).css('background', '#b9b9b9');
                $(this).css('color', 'white');
//                alert(usuarioID);
//                $("#radio_value").val(usuarioID);
            });

            $('td').click(function () {
                $('table tr').removeAttr('style');
            });
        </script>

        <script>
            $(document).ready(function () {
                $('table tr').click(function (event) {
                    if (event.target.type !== 'checkbox') {
                        $(':checkbox', this).trigger('click');
                    }
                });
            });
        </script>

    </body>
</html>
