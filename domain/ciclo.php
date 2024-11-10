<?php 

class ciclo{

    private $idCiclo;
    private $nombreCiclo;
    private $descripcionCiclo;
    private $tipoCiclo;
    private $fechaInicioCiclo;
    private $fechaFinCiclo;
    private $estadoCiclo;

    public function __construct($idCiclo=null, $nombreCiclo="", $descripcionCiclo="", $tipoCiclo="", $fechaInicioCiclo="", $fechaFinCiclo="", $estadoCiclo="") {
        $this->idCiclo = $idCiclo;
        $this->nombreCiclo = $nombreCiclo;
        $this->descripcionCiclo = $descripcionCiclo;
        $this->tipoCiclo = $tipoCiclo;
        $this->fechaInicioCiclo = $fechaInicioCiclo;
        $this->fechaFinCiclo = $fechaFinCiclo;
        $this->estadoCiclo = $estadoCiclo;
    }

    public function getIdCiclo() {
        return $this->idCiclo;
    }
    public function setIdCiclo($idCiclo) {
        $this->idCiclo = $idCiclo;
    }

    public function getNombreCiclo() {
        return $this->nombreCiclo;
    }
    public function setNombreCiclo($nombreCiclo) {
        $this->nombreCiclo = $nombreCiclo;
    }

    public function getDescripcionCiclo() {
        return $this->descripcionCiclo;
    }
    public function setDescripcionCiclo($descripcionCiclo) {
        $this->descripcionCiclo = $descripcionCiclo;
    }

    public function getTipoCiclo() {
        return $this->tipoCiclo;
    }
    public function setTipoCiclo($tipoCiclo) {
        $this->tipoCiclo = $tipoCiclo;
    }

    public function getFechaInicioCiclo() {
        return $this->fechaInicioCiclo;
    }
    public function setFechaInicioCiclo($fechaInicioCiclo) {
        $this->fechaInicioCiclo = $fechaInicioCiclo;
    }

    public function getFechaFinCiclo() {
        return $this->fechaFinCiclo;
    }
    public function setFechaFinCiclo($fechaFinCiclo) {
        $this->fechaFinCiclo = $fechaFinCiclo;
    }

    public function getEstadoCiclo() {
        return $this->estadoCiclo;
    }
    public function setEstadoCiclo($estadoCiclo) {
        $this->estadoCiclo = $estadoCiclo;
    }

}


?>