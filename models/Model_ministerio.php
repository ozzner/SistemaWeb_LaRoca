<?php

class MinisterioModel{
    
    private $ministerioID;
    private $nombre;
    private $createdAt;
    
    public function getMinisterioID() {
        return $this->ministerioID;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setMinisterioID($ministerioID) {
        $this->ministerioID = $ministerioID;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }


}
?>