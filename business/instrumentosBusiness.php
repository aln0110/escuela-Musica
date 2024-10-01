<?php
include '../data/dataInstrumentos.php';

class instrumentosBusiness
{
    private $dataInstrumentos;

    public function __construct()
    {
        $this->dataInstrumentos = new dataInstrumentos();
    }

    public function instrumentosBusiness()
    {
        $this->dataInstrumentos = new dataInstrumentos();
    }

    public function insertInstrumento($instrumento)
    {
        return $this->dataInstrumentos->insertInstrumento($instrumento);
    }

    public function getInstrumentos()
    {
        return $this->dataInstrumentos->getInstrumentos();
    }

    public function getInstrumento($idInstrumento)
    {
        return $this->dataInstrumentos->getInstrumento($idInstrumento);
    }
    
    public function getInstumentosByCategoria($categoria)
    {
        return $this->dataInstrumentos->getInstumentosByCategoria($categoria);
    }

    public function getInstrumentosByEstado($estado)
    {
        return $this->dataInstrumentos->getInstrumentosByEstado($estado);
    }
    
    public function updateInstrumento($instrumento)
    {
        return $this->dataInstrumentos->updateInstrumento($instrumento);
    }

    public function logicalDeleteInstrumento($idInstrumento)
    {
        return $this->dataInstrumentos->logicalDeleteInstrumento($idInstrumento);
    }
}



?>