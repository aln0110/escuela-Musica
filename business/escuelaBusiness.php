<?php
include '../data/dataEscuela.php';
 
class EscuelaBusiness
{
    private $escuelaData;
    
    public function __construct()
    {
        $this->escuelaData = new EscuelaData();
    }
    
    public function insertEscuela($escuelaMusica)
    {
        return $this->escuelaData->insertEscuela($escuelaMusica);
    }

    public function updateEscuela($escuelaMusica)
    {
        return $this->escuelaData->updateEscuela($escuelaMusica);
    }

    public function getEscuelas()
    {
        return $this->escuelaData->getEscuelas();
    }

    public function getEscuela($idEscuelaMusica)
    {
        return $this->escuelaData->getEscuela($idEscuelaMusica);
    }

    public function deleteEscuela($idEscuelaMusica)
    {
        return $this->escuelaData->deleteEscuela($idEscuelaMusica);
    }

    public function logicalDelete($idEscuelaMusica){
        return $this->escuelaData->logicalDelte($idEscuelaMusica);
    }

    
}


?>