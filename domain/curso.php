<?php
 class curso{
    private $id;
    private $nombre;
    private $siglas;
    private $requisito;
    private $corequisito;
    private $creditos;
    private $estado;
    private $iniHora;
    private $finHora;
    private $grupo;
    private $idCiclo;
    private $idProfesor;

    public function __construct($id="", $nombre="", $siglas="", $requisito="", $corequisito="", $creditos="", $estado="", $iniHora="", $finHora="",  $grupo="", $idCiclo="", $idProfesor=""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->siglas = $siglas;
        $this->requisito = $requisito;
        $this->corequisito = $corequisito;
        $this->creditos = $creditos;
        $this->estado = $estado;
        $this->iniHora = $iniHora;
        $this->finHora = $finHora;
        $this->grupo = $grupo;
        $this->idCiclo = $idCiclo;
        $this->idProfesor = $idProfesor;

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

    public function setIniHora($iniHora){
        $this->iniHora = $iniHora;
    }

    public function getIniHora(){
        return $this->iniHora;
    }

    public function setFinHora($finHora){
        $this->finHora = $finHora;
    }

    public function getFinHora(){
        return $this->finHora;
    }

    public function setGrupo($grupo){
        $this->grupo = $grupo;
    }

    public function getGrupo(){
        return $this->grupo;
    }

    public function setIdCiclo($idCiclo){
        $this->idCiclo = $idCiclo;
    }

    public function getIdCiclo(){
        return $this->idCiclo;
    }

    public function setIdProfesor($idProfesor){
        $this->idProfesor = $idProfesor;
    }

    public function getIdProfesor(){
        return $this->idProfesor;
    }

    



 }


?>