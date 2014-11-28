<?php
    
    class EnseñanzaModel{
        
        private $enseñanzaID;
        private $fechaInicio;
        private $fechaFin;
        
        public function getEnseñanzaID() {
            return $this->enseñanzaID;
        }

        public function getFechaInicio() {
            return $this->fechaInicio;
        }

        public function getFechaFin() {
            return $this->fechaFin;
        }

        public function setEnseñanzaID($enseñanzaID) {
            $this->enseñanzaID = $enseñanzaID;
        }

        public function setFechaInicio($fechaInicio) {
            $this->fechaInicio = $fechaInicio;
        }

        public function setFechaFin($fechaFin) {
            $this->fechaFin = $fechaFin;
        }


    }

?>