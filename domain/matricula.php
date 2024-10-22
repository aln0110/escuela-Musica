<?php

class matricula{

    private $id;
    private $idEstudiante;
    private $idProfesor;
    private $idCurso;
    private $fecha;
    private $activo;

    public function __construct($id="", $idEstudiante="", $idProfesor="", $idCurso="", $fecha="", $activo=""){
        $this->id = $id;
        $this->idEstudiante = $idEstudiante;
        $this->idProfesor = $idProfesor;
        $this->idCurso = $idCurso;
        $this->fecha = $fecha;
        $this->activo = $activo;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }

    public function setIdEstudiante($idEstudiante){
        $this->idEstudiante = $idEstudiante;
    }
    public function getIdEstudiante(){
        return $this->idEstudiante;
    }

    public function setIdProfesor($idProfesor){
        $this->idProfesor = $idProfesor;
    }

    public function getIdProfesor(){
        return $this->idProfesor;
    }

    public function setIdCurso($idCurso){
        $this->idCurso = $idCurso;
    }

    public function getIdCurso(){
        return $this->idCurso;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setActivo($activo){
        $this->activo = $activo;
    }

    public function getActivo(){
        return $this->activo;
    }
    

    





}




?>