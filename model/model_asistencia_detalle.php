<?php

class AsistenciaDetalleModel{
    

    private $alumnoID;
    private $estado;
    private $asistencia_fecha;
    private $temaProfesorID;
    
    public function getAlumnoID() {
        return $this->alumnoID;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getAsistencia_fecha() {
        return $this->asistencia_fecha;
    }

    public function getTemaProfesorID() {
        return $this->temaProfesorID;
    }

    public function setAlumnoID($alumnoID) {
        $this->alumnoID = $alumnoID;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setAsistencia_fecha($asistencia_fecha) {
        $this->asistencia_fecha = $asistencia_fecha;
    }

    public function setTemaProfesorID($temaProfesorID) {
        $this->temaProfesorID = $temaProfesorID;
    }



}


?>