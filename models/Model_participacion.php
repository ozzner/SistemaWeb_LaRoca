<?php

    class ParticipacionModel{
        
        private $temaID;
        private $tipoParticipacionID;
        private $alumnoID;
        private $veces;
        private $createdAt;
        
        
        public function getTemaID() {
            return $this->temaID;
        }

        public function getTipoParticipacionID() {
            return $this->tipoParticipacionID;
        }

        public function getAlumnoID() {
            return $this->alumnoID;
        }

        public function getVeces() {
            return $this->veces;
        }

        public function getCreatedAt() {
            return $this->createdAt;
        }

        public function setTemaID($temaID) {
            $this->temaID = $temaID;
        }

        public function setTipoParticipacionID($tipoParticipacionID) {
            $this->tipoParticipacionID = $tipoParticipacionID;
        }

        public function setAlumnoID($alumnoID) {
            $this->alumnoID = $alumnoID;
        }

        public function setVeces($veces) {
            $this->veces = $veces;
        }

        public function setCreatedAt($createdAt) {
            $this->createdAt = $createdAt;
        }


    }

?>

