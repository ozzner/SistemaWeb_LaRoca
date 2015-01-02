<?php

class UtilJson {

    function __construct() {
        
    }

    function getJsonParser($array, $status) {
        
        $arry_json = array();
        $arry_json['error_status'] = $status;
        $arry_json['data'] = $array;

        return json_encode($arry_json, 256);
    }

}

?>