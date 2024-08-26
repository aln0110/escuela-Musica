<?php
include '../data/dataPartitura.php';

class partituraBusiness
{


    private $dataPartitura;

    public function __construct()
    {
        $this->dataPartitura = new dataPartitura();
    }

    public function insertPartitura($partitura)
    {
        return $this->dataPartitura->insertPartitura($partitura);
    }

    public function getPartituras()
    {
        return $this->dataPartitura->getPartituras();
    }

    public function getPartitura($idPartitura)
    {
        return $this->dataPartitura->getPartitura($idPartitura);
    }

    public function getPartiturasByInstrumento($instrumento)
    {
        return $this->dataPartitura->getPartiturasByInstrumento($instrumento);
    }

    public function updatePartitura($partitura)
    {
        return $this->dataPartitura->updatePartitura($partitura);
    }

    
}


?>