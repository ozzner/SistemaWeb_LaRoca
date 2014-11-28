<?php

class AlumnoModel {

    private $alumnoID;
    private $nombres;
    private $telefono;
    private $nombrePapa;
    private $nombreMama;
    private $nacimiento;
    private $direccion;
    private $foto;
    private $sexo;
    private $createdAt;
    
    private $distritoID;
    private $grupoID;

    public function getAlumnoID() {
        return $this->alumnoID;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getNombrePapa() {
        return $this->nombrePapa;
    }

    public function getNombreMama() {
        return $this->nombreMama;
    }

    public function getNacimiento() {
        return $this->nacimiento;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getDistritoID() {
        return $this->distritoID;
    }

    public function getGrupoID() {
        return $this->grupoID;
    }

    public function setAlumnoID($alumnoID) {
        $this->alumnoID = $alumnoID;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setNombrePapa($nombrePapa) {
        $this->nombrePapa = $nombrePapa;
    }

    public function setNombreMama($nombreMama) {
        $this->nombreMama = $nombreMama;
    }

    public function setNacimiento($nacimiento) {
        $this->nacimiento = $nacimiento;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function setDistritoID($distritoID) {
        $this->distritoID = $distritoID;
    }

    public function setGrupoID($grupoID) {
        $this->grupoID = $grupoID;
    }


}

?>