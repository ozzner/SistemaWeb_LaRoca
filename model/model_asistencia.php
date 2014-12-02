<?php
    
    class AsistenciaModel{
        
        private $asistenciaID;
        private $fecha;
     
        public function getAsistenciaID() {
            return $this->asistenciaID;
        }

        public function getFecha() {
            return $this->fecha;
        }

        public function setAsistenciaID($asistenciaID) {
            $this->asistenciaID = $asistenciaID;
        }

        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }



    }
?>