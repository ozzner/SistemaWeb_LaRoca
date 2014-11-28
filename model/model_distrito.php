<?php

    class DistritoModel{
        
        private $distritoID;
        private $nombre;
        
        public function getDistritoID() {
            return $this->distritoID;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function setDistritoID($distritoID) {
            $this->distritoID = $distritoID;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }


    }
?>