<?php

class TemaProfesorModel{
    
    private $temaID;
    private $profesorID;
    
    public function getTemaID() {
        return $this->temaID;
    }

    public function getProfesorID() {
        return $this->profesorID;
    }

    public function setTemaID($temaID) {
        $this->temaID = $temaID;
    }

    public function setProfesorID($profesorID) {
        $this->profesorID = $profesorID;
    }


}


?>

