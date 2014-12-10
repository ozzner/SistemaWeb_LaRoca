<?php

class ImageHandler {

    private $imgNombre;
    private $ruta;
    private $message;
    private $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    private $limite_kb = 512000;
    private $isError;

    function __construct() {
        include_once '../util/util_constants.php';
    }

    protected function checkConstraints() {

        $this->ruta = "../resources/temp/" . $_FILES['imagen']['name'];

//        var_dump($this->ruta);
//        var_dump(strlen($_FILES['imagen']["name"]));


            if (!in_array($_FILES['imagen']['type'], $this->permitidos)) {
                return 1;
            } else if ($_FILES['imagen']['size'] > $this->limite_kb) {
                return 2;
//        } 
//        else if (!file_exists($this->ruta)) {
//            return 3;
            } else {
                return 0;
            }
       
    }

    public function getImgNombre() {
        $this->imgNombre = FALSE;

        $int = $this->checkConstraints();
//        var_dump($int);

        switch ($int) {
            case 1:
                $this->message = IMAGE_CONSTRAINT_TYPE;
                $this->isError = TRUE;
//                var_dump($this->message);

                break;
            case 2:
                $this->message = IMAGE_CONSTRAINT_SIZE;
                $this->isError = TRUE;
//                var_dump($this->message);
//                var_dump($_FILES['imagen']['size']);
                break;
//            case 3:
//                $this->message = IMAGE_CONSTRAINT_EXIST;
//                var_dump($this->message);
//                return FALSE;
            case 0:

                $resultado = move_uploaded_file($_FILES["imagen"]["tmp_name"], $this->ruta);

                if ($resultado) {

                    $this->imgNombre = $_FILES['imagen']['name'];
                    $this->message = IMAGE_UPLOAD_OK;
                    $this->isError = FALSE;
//                    var_dump($this->imgNombre);
                    return $this->imgNombre;
                    
                } else {
                    $this->message = IMAGE_UPLOAD_FAILED;
                    $this->imgNombre = FALSE;
                    $this->isError = TRUE;
                }
                
            default :
//                echo 'Menos -1';
                $this->imgNombre = FALSE;
                $this->isError = TRUE;
                $this->message = "vacio";
        }
        return $this->imgNombre;
    }

    function getMessage() {
        return $this->message;
    }

    function getIsError() {
        return $this->isError;
    }


    
    
//
//if (in_array($_FILES['image']['type'], $permitidos) and ) {
//
//
//if (!file_exists($ruta)){
////aqui movemos el archivo desde la ruta temporal a nuestra ruta
////usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
////almacenara true o false
//$r = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
//if ($r){
//echo "el archivo ha sido movido exitosamente";
//$this->imgNombre = $_FILES['image']['name'];
//return $this->imgNombre;
//} else {
//echo "ocurrio un error al mover el archivo.";
//}
//
//}else{
//echo "Archivo ".$_FILES['image']["name"]." ya existe";
//}
//
//}else{
//echo "Archivo no permitido o exede el límite permitido";
//}
}

?>
