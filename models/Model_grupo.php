<?php

    class GrupoModel{
        
        private $grupoID;
        private $nombre;
        private $ministerioID;
        
        public function getGrupoID() {
            return $this->grupoID;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getMinisterioID() {
            return $this->ministerioID;
        }

        public function setGrupoID($grupoID) {
            $this->grupoID = $grupoID;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function setMinisterioID($ministerioID) {
            $this->ministerioID = $ministerioID;
        }


    }
?>