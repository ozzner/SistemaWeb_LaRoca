<?php
    
    class AsistenciaModel{
        
        private $asistenciaID;
        private $fecha;
        private $tpTemaID;
        private $tpProfesorID;
        
        public function getAsistenciaID() {
            return $this->asistenciaID;
        }

        public function getFecha() {
            return $this->fecha;
        }

        public function getTpTemaID() {
            return $this->tpTemaID;
        }

        public function getTpProfesorID() {
            return $this->tpProfesorID;
        }

        public function setAsistenciaID($asistenciaID) {
            $this->asistenciaID = $asistenciaID;
        }

        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }

        public function setTpTemaID($tpTemaID) {
            $this->tpTemaID = $tpTemaID;
        }

        public function setTpProfesorID($tpProfesorID) {
            $this->tpProfesorID = $tpProfesorID;
        }


    }
?>