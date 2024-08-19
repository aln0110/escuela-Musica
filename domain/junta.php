<?php 
/*
     creo que se deberia de agregar correo y telefono a la tabla de juntas
     esto es una prueba para ver si los cambios se reflejan en la web
*/
class junta{
    private $idjunta;
    private $nombrejunta;
    private $cedulajunta;
    private $juntapuesto;
    private $fechainiciojunta;
    private $fechafinaljunta;
    private $juntaactivo;

    public function __construct($idjunta=null, $nombrejunta="", $cedulajunta="", $juntapuesto="", $fechainiciojunta="", $fechafinaljunta="", $juntaactivo="") {
        $this->idjunta = $idjunta;
        $this->nombrejunta = $nombrejunta;
        $this->cedulajunta = $cedulajunta;
        $this->juntapuesto = $juntapuesto;
        $this->fechainiciojunta = $fechainiciojunta;
        $this->fechafinaljunta = $fechafinaljunta;
        $this->juntaactivo = $juntaactivo;
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


}



?>