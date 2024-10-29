<?php
class CursoDetalles {
    private $idCurso;
    private $nombreCurso;
    private $siglasCurso;
    private $cursoGrupo;
    private $nombreProfesor;
    private $apellidoProfesor;
    private $cicloNombre;

    private $activo;

    public function __construct($idCurso="", $nombreCurso="", $siglasCurso="", $cursoGrupo="",$nombreProfesor="", $apellidoProfesor="", $cicloNombre="", $activo="") {

       $this->idCurso = $idCurso;          
        $this->nombreCurso = $nombreCurso;
        $this->siglasCurso = $siglasCurso;
        $this->cursoGrupo = $cursoGrupo;
        $this->nombreProfesor = $nombreProfesor;
        $this->apellidoProfesor = $apellidoProfesor;
        $this->cicloNombre = $cicloNombre;
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

    public function setCicloNombre($cicloNombre) {
        $this->cicloNombre = $cicloNombre;
    }

    public function getCicloNombre() {
        return $this->cicloNombre;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function setCursoGrupo($cursoGrupo) {
        $this->cursoGrupo = $cursoGrupo;
    }   

    public function getCursoGrupo() {
        return $this->cursoGrupo;
    }
    

}




?>