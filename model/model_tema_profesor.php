<?php

class TemaProfesorModel{
    private $temaProfesorID;
    private $temaID;
    private $profesorID;
    private $fecha;
    
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

    public function getTemaProfesorID() {
        return $this->temaProfesorID;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setTemaProfesorID($temaProfesorID) {
        $this->temaProfesorID = $temaProfesorID;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }



}


?>

