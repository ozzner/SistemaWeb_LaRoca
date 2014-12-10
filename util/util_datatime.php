<?php

class DatatimeUtil {

    
    function __construct() {
    
    }

    
    public function genDataTime($format) {
        date_default_timezone_set('America/Bogota');
        $time = new DateTime();
        $date = $time->format($format);

        return $date;
    }

}

?>