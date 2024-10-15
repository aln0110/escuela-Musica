<?php
 class curso{
    private $id;
    private $nombre;
    private $siglas;
    private $requisito;
    private $corequisito;
    private $creditos;
    private $estado;

    public function __construct($id="", $nombre="", $siglas="", $requisito="", $corequisito="", $creditos="", $estado=""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->siglas = $siglas;
        $this->requisito = $requisito;
        $this->corequisito = $corequisito;
        $this->creditos = $creditos;
        $this->estado = $estado;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setSiglas($siglas){
        $this->siglas = $siglas;
    }

    public function getSiglas(){
        return $this->siglas;
    }

    public function setRequisito($requisito){
        $this->requisito = $requisito;
    }

    public function getRequisito(){
        return $this->requisito;
    }

    public function setCorequisito($corequisito){
        $this->corequisito = $corequisito;
    }

    public function getCorequisito(){
        return $this->corequisito;
    }

    public function setCreditos($creditos){
        $this->creditos = $creditos;
    }

    public function getCreditos(){
        return $this->creditos;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getEstado(){
        return $this->estado;
    }



 }


?>