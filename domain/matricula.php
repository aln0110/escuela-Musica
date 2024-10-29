<?php

class matricula{

    private $id;
    private $idEstudiante;
    private $idCurso;
    private $fecha;
    private $activo;

    public function __construct($id="", $idEstudiante="", $idCurso="", $fecha="", $activo=""){
        $this->id = $id;
        $this->idEstudiante = $idEstudiante;

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