<?php
include '../data/dataCiclo.php';

class cicloBusiness
{
    private $dataCiclo;

    public function __construct()
    {
        $this->dataCiclo = new dataCiclo();
    }

    public function insertCiclo($ciclo)
    {
        return $this->dataCiclo->insertCiclo($ciclo);
    }

    public function getCiclos()
    {
        return $this->dataCiclo->getCiclos();
    }

    public function getCiclo($idCiclo)
    {
        return $this->dataCiclo->getCiclo($idCiclo);
    }

    public function updateCiclo($ciclo)
    {
        return $this->dataCiclo->updateCiclo($ciclo);
    }

    public function logicalDelete($idCiclo)
    {
        return $this->dataCiclo->logicalDeleteCiclo($idCiclo);
    }



}


?>