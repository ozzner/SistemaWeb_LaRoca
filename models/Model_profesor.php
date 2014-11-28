<?php

class ProfesorModel{
    
    private $profesorID;
    private $nombres;
    private $edad;
    private $celular;
    private $nacimiento;
    private $sexo;
    private $createdAt;
    private $foto;
    private $direccion;
    private $grupoID;
    
    
    public function getProfesorID() {
        return $this->profesorID;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function getNacimiento() {
        return $this->nacimiento;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getGrupoID() {
        return $this->grupoID;
    }

    public function setProfesorID($profesorID) {
        $this->profesorID = $profesorID;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    public function setNacimiento($nacimiento) {
        $this->nacimiento = $nacimiento;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setGrupoID($grupoID) {
        $this->grupoID = $grupoID;
    }


}


?>

