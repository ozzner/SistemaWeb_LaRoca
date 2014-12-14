<!DOCTYPE html>
<?PHP
include_once '../controller/controller_alumno.php';

$oAlumno = new AlumnoController();
$alumnos = $oAlumno->getAllAlumnos();
?>



<html>
    <head>
        <meta charset="UTF-8">
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <!--<link href="../vendor/DataTable/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
        <link href="../vendor/DataTable/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>
        
        <div class="MyContents" style="overflow-y: auto;overflow-x: hidden;height: 475px;">
            
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ITEM</th>
                        <th>COD</th>
                        <th>NOMBRES</th>
                        <th>TELEFONO</th>
                        <th>PAPA</th>
                        <th>MAMA</th>
                        <th>NACIMIENTO</th>
                        <th>DIRECCION</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>ITEM</th>
                        <th>COD</th>
                        <th>NOMBRES</th>
                        <th>TELEFONO</th>
                        <th>PAPA</th>
                        <th>MAMA</th>
                        <th>NACIMIENTO</th>
                        <th>DIRECCION</th>
                    </tr>
                </tfoot>
                <tbody>


                    <?php foreach ($alumnos as $key => $value) { ?>
                        <tr>
                            <td ><input class="MyInputRadio" id="alum_id_radio" type="radio" name="alumnoID" value="<?php echo $value["alumnoID"] ?>"/></td>   
                            <td ><?php echo utf8_encode($value["alumnoID"]) ?></td>
                            <td ><?php echo utf8_encode($value["nombres"]) ?></td>
                            <td ><?php echo $value["telefono"] ?></td>
                            <td ><?php echo utf8_encode($value["nombrePapa"]) ?></td>
                            <td ><?php echo utf8_encode($value["nombreMama"]) ?></td>
                            <td ><?php echo $value["nacimiento"] ?></td>
                            <td ><?php echo utf8_encode($value["direccion"]) ?></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>


            <!--<script src="../vendor/DataTable/js/jquery-1.11.1.min.js" type="text/javascript"></script>-->
            <script src="../vendor/DataTable/js/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="../vendor/DataTable/js/dataTables.bootstrap.js" type="text/javascript"></script>

        </div>


        <script>
            $(document).ready(function () {
                $('#example').dataTable();
                $("#listar_id").css({backgroundColor: '#8b0a50'});
            });
        </script>
    </body>
</html>
