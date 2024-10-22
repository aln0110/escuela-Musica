<?php
class MatriculaDetails {
    private $matriculaId;
    private $cursoNombre;
    private $cursoSigla;
    private $estudianteNombreCompleto;
    private $profesorNombreCompleto;
    private $fechaMatricula;
    private $matriculaActivo;

    public function __construct($matriculaId="", $cursoNombre="", $cursoSigla="", $estudianteNombreCompleto="", $profesorNombreCompleto="", $fechaMatricula="", $matriculaActivo="") {
        $this->matriculaId = $matriculaId;
        $this->cursoNombre = $cursoNombre;
        $this->cursoSigla = $cursoSigla;
        $this->estudianteNombreCompleto = $estudianteNombreCompleto;
        $this->profesorNombreCompleto = $profesorNombreCompleto;
        $this->fechaMatricula = $fechaMatricula;
        $this->matriculaActivo = $matriculaActivo;
    
    }

    public function getMatriculaId() {
        return $this->matriculaId;
    }

    public function getCursoNombre() {
        return $this->cursoNombre;
    }

    public function getCursoSigla() {
        return $this->cursoSigla;
    }

    public function getEstudianteNombreCompleto() {
        return $this->estudianteNombreCompleto;
    }

    public function getProfesorNombreCompleto() {
        return $this->profesorNombreCompleto;
    }

    public function getFechaMatricula() {
        return $this->fechaMatricula;
    }

    public function getMatriculaActivo() {
        return $this->matriculaActivo;
    }

    public function setMatriculaId($matriculaId) {
        $this->matriculaId = $matriculaId;
    }
}



?>