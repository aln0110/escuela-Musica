<?php
class matriculaDetalles {
    private $id;
    private $nombreCurso;
    private $siglasCurso;
    private $cursoGrupo;
    private $nombreEstudiante;
    private $apellidoEstudiante;
    private $nombreProfesor;
    private $apellidoProfesor;
    private $cicloNombre;
    private $nota;

    private $activo;

    public function __construct($id="", $nombreCurso="", $siglasCurso="", $cursoGrupo="",$nombreEstudiante="" , $apellidoEstudiante="" ,$nombreProfesor="", $apellidoProfesor="", $cicloNombre="", $nota="", $activo="") {

        $this->id = $id;          
        $this->nombreCurso = $nombreCurso;
        $this->siglasCurso = $siglasCurso;
        $this->cursoGrupo = $cursoGrupo;
        $this->nombreProfesor = $nombreProfesor;
        $this->apellidoProfesor = $apellidoProfesor;
        $this->cicloNombre = $cicloNombre;
        $this->activo = $activo;
        $this->nota = $nota;
        $this->nombreEstudiante = $nombreEstudiante;
        $this->apellidoEstudiante = $apellidoEstudiante;

    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
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

    public function setNota($nota) {
        $this->nota = $nota;
    }

    public function getNota() {
        return $this->nota;
    }

    public function setNombreEstudiante($nombreEstudiante) {
        $this->nombreEstudiante = $nombreEstudiante;
    }

    public function getNombreEstudiante() {
        return $this->nombreEstudiante;
    }
    
    public function setApellidoEstudiante($apellidoEstudiante) {
        $this->apellidoEstudiante = $apellidoEstudiante;
    }


    public function getApellidoEstudiante() {
        return $this->apellidoEstudiante;
    }

    

}




?>