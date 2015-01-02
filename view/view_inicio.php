<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../vendor/DataTable/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../vendor/DataTable/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>
        <div class="MyContents">
            <h1>BIENVENIDO AL SISTEMA DE LA ROCA - VERSION 1.0</h1>
            <br />
            <font size='1'><table class='xdebug-error xe-fatal-error' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
                <tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Fatal error: Call to a member function bind_param() on a non-object in C:\wamp\www\SistemaWeb_La_roca\controller\controller_tema.php on line <i>125</i></th></tr>
                <tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
                <tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
                <tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0007</td><td bgcolor='#eeeeec' align='right'>383952</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\wamp\www\SistemaWeb_La_roca\includes\ensenanza_tema_listar.php' bgcolor='#eeeeec'>..\ensenanza_tema_listar.php<b>:</b>0</td></tr>
                <tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.0037</td><td bgcolor='#eeeeec' align='right'>463240</td><td bgcolor='#eeeeec'>TemaController->updateTema(  )</td><td title='C:\wamp\www\SistemaWeb_La_roca\includes\ensenanza_tema_listar.php' bgcolor='#eeeeec'>..\ensenanza_tema_listar.php<b>:</b>69</td></tr>
            </table></font>


<!--<script src="../vendor/DataTable/js/jquery-1.11.1.min.js" type="text/javascript"></script>-->
            <script src="../vendor/DataTable/js/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="../vendor/DataTable/js/dataTables.bootstrap.js" type="text/javascript"></script>

        </div>


        <script>
            $(document).ready(function () {
                $('#example').dataTable();
            });
        </script>
    </body>
</html>
