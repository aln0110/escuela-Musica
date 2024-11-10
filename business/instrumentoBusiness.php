<?php
include '../data/dataInstrumento.php';

class instrumentoBusiness{

    private $dataInstrumento;

    public function __construct()
    {
        $this->dataInstrumento = new dataInstrumento();
    }

    public function insertInstrumento($instrumento)
    {
        return $this->dataInstrumento->insertInstrumento($instrumento);
    }

    public function getInstrumentos()
    {
        return $this->dataInstrumento->getInstrumentos();
    }

    public function getInstrumento($id)
    {
        return $this->dataInstrumento->getInstrumento($id);
    }

    public function updateInstrumento($instrumento)
    {
        return $this->dataInstrumento->updateInstrumento($instrumento);
    }

    public function logicalDelete($id)
    {
        return $this->dataInstrumento->logicalDeleteInstrumento($id);
    }

    public function uso($id)
    {
        return $this->dataInstrumento->uso($id);
    }

}



?>