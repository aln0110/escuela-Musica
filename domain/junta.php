<?php 
/*
     creo que se deberia de agregar correo y telefono a la tabla de juntas
*/
class junta{
    private $idjunta;
    private $nombrejunta;
    private $identificacionjunta;
    private $cedulajunta;
    private $juntapuesto;
    private $correo;
    private $telefono;
    private $fechainiciojunta;
    private $fechafinaljunta;
    private $juntaactivo;

    public function __construct($idjunta=null, $nombrejunta="", $cedulajunta="", $juntapuesto="", $fechainiciojunta="", $fechafinaljunta="", $juntaactivo="", $identificacionjunta='', $correo='', $telefono='') {
        $this->idjunta = $idjunta;
        $this->nombrejunta = $nombrejunta;
        $this->cedulajunta = $cedulajunta;
        $this->juntapuesto = $juntapuesto;
        $this->fechainiciojunta = $fechainiciojunta;
        $this->fechafinaljunta = $fechafinaljunta;
        $this->juntaactivo = $juntaactivo;
        $this->identificacionjunta = $identificacionjunta;
        $this->correo = $correo;
        $this->telefono = $telefono;

    }

    public function getIdjunta() {
        return $this->idjunta;
    }

    public function setIdjunta($idjunta) {
        $this->idjunta = $idjunta;
    }

    public function getNombrejunta() {
        return $this->nombrejunta;
    }

    public function setNombrejunta($nombrejunta) {
        $this->nombrejunta = $nombrejunta;
    }

    public function getCedulajunta() {
        return $this->cedulajunta;
    }

    public function setCedulajunta($cedulajunta) {
        $this->cedulajunta = $cedulajunta;
    }

    public function getJuntapuesto() {
        return $this->juntapuesto;
    }

    public function setJuntapuesto($juntapuesto) {
        $this->juntapuesto = $juntapuesto;
    }

    public function getFechainiciojunta() {
        return $this->fechainiciojunta;
    }

    public function setFechainiciojunta($fechainiciojunta) {
        $this->fechainiciojunta = $fechainiciojunta;
    }

    public function getFechafinaljunta() {
        return $this->fechafinaljunta;
    }

    public function setFechafinaljunta($fechafinaljunta) {
        $this->fechafinaljunta = $fechafinaljunta;
    }

    public function getJuntaactivo() {
        return $this->juntaactivo;
    }

    public function setJuntaactivo($juntaactivo) {
        $this->juntaactivo = $juntaactivo;
    }

    public function getIdentificacionjunta() {
        return $this->identificacionjunta;
    }
    public function setIdentificacionjunta($identificacionjunta) {
        $this->identificacionjunta = $identificacionjunta;
    }

    public function getCorreo() {
        return $this->correo;
    }
    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getTelefono() {
        return $this->telefono;
    }
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    


}



?>