<?php

class AsistenciaDetalleModel{
    
    private $asistenciaID;
    private $alumnoID;
    private $estado;
    
    
    public function getAsistenciaID() {
        return $this->asistenciaID;
    }

    public function getAlumnoID() {
        return $this->alumnoID;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setAsistenciaID($asistenciaID) {
        $this->asistenciaID = $asistenciaID;
    }

    public function setAlumnoID($alumnoID) {
        $this->alumnoID = $alumnoID;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }


}


?>