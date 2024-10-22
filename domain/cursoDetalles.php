<?php
class CursoDetalles {
    private $idCurso;
    private $nombreCurso;
    private $siglasCurso;
    private $nombreProfesor;
    private $apellidoProfesor;
    private $activo;

    public function __construct($idCurso="", $nombreCurso="", $siglasCurso="", $nombreProfesor="", $apellidoProfesor="", $activo="") {

       $this->idCurso = $idCurso;          
        $this->nombreCurso = $nombreCurso;
        $this->siglasCurso = $siglasCurso;
        $this->nombreProfesor = $nombreProfesor;
        $this->apellidoProfesor = $apellidoProfesor;
        $this->activo = $activo;
    }

    public function getIdCurso() {
        return $this->idCurso;
    }
    public function setIdCurso($idCurso) {
        $this->idCurso = $idCurso;
    }


    public function getNombreCurso() {
        return $this->nombreCurso;
    }

    public function getSiglasCurso() {
        return $this->siglasCurso;
    }

    public function getNombreProfesor() {
        return $this->nombreProfesor;
    }

    public function getApellidoProfesor() {
        return $this->apellidoProfesor;
    }

    public function isActivo() {
        return $this->activo;
    }
}




?>