<?php

class TipoParticipacionModel{
    
    private $tipoParticipacionID;
    private $nombre;
    
    
    public function getTipoParticipacionID() {
        return $this->tipoParticipacionID;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setTipoParticipacionID($tipoParticipacionID) {
        $this->tipoParticipacionID = $tipoParticipacionID;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}
?>
