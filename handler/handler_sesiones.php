<?php

class SesionHandler {

    var $session_name;

    function __construct($session_name) {
        $this->session_name = $session_name;
        $active = $this->isActiveSession();

        if ($active) {
            session_start();
        }
    }

    public function storeMySession($object) {
        $_SESSION[$this->session_name] = $object;
    }

    public function destroySession() {
        session_destroy();
    }

    public function isActiveSession() {
        if (isset($_SESSION[$this->session_name])) {
            return true;
        } else {
            return false;
        }
    }
    
    
    /*+++++++++++++++ SET AND GET +++++++++++++++*/
    public function getSession_name() {
        return $this->session_name;
    }

    public function setSession_name($session_name) {
        $this->session_name = $session_name;
    }


}
?>

