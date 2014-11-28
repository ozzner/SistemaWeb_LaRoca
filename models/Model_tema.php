<?php

    class TemaModel {
        
        private $temaID;
        private $titulo;
        private $descripcion;
        private $enseñazaID;
        
        public function getTemaID() {
            return $this->temaID;
        }

        public function getTitulo() {
            return $this->titulo;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function getEnseñazaID() {
            return $this->enseñazaID;
        }

        public function setTemaID($temaID) {
            $this->temaID = $temaID;
        }

        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        public function setEnseñazaID($enseñazaID) {
            $this->enseñazaID = $enseñazaID;
        }


    }
?>