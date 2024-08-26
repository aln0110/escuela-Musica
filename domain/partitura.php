<?php

class partitura{
    private $idPartitura;
    private $nombrePartitura;
    private $instrumentoPartitura;
    private $pdfPartitura;
    private $estadoPartitura;

    public function __construct($idPartitura=null, $nombrePartitura="", $instrumentoPartitura="", $pdfPartitura="", $estadoPartitura="") {
        $this->idPartitura = $idPartitura;
        $this->nombrePartitura = $nombrePartitura;
        $this->instrumentoPartitura = $instrumentoPartitura;
        $this->pdfPartitura = $pdfPartitura;
        $this->estadoPartitura = $estadoPartitura;
    }

    public function getIdPartitura() {
        return $this->idPartitura;
    }
    public function setIdPartitura($idPartitura) {
        $this->idPartitura = $idPartitura;
    }

    public function getNombrePartitura() {
        return $this->nombrePartitura;
    }
    public function setNombrePartitura($nombrePartitura) {
        $this->nombrePartitura = $nombrePartitura;
    }

    public function getInstrumentoPartitura() {
        return $this->instrumentoPartitura;
    }
    public function setInstrumentoPartitura($instrumentoPartitura) {
        $this->instrumentoPartitura = $instrumentoPartitura;
    }

    public function getPdfPartitura() {
        return $this->pdfPartitura;
    }
    public function setPdfPartitura($pdfPartitura) {
        $this->pdfPartitura = $pdfPartitura;
    }

    public function getEstadoPartitura() {
        return $this->estadoPartitura;
    }
    public function setEstadoPartitura($estadoPartitura) {
        $this->estadoPartitura = $estadoPartitura;
    }

}




?>