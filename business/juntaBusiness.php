<?php
include '../data/dataJunta.php';

class JuntaBusiness
{
    private $juntaData;
    
    public function __construct()
    {
        $this->juntaData = new DataJunta();
    }
    
    public function insertJunta($junta)
    {
        return $this->juntaData->insertJunta($junta);
    }

    public function updateJunta($junta)
    {
        return $this->juntaData->updateJunta($junta);
    }

    public function getJuntas()
    {
        return $this->juntaData->getJuntas();
    }

    public function getJunta($idjunta)
    {
        return $this->juntaData->getJunta($idjunta);
    }

    public function deleteJunta($idjunta)
    {
        return $this->juntaData->deleteJunta($idjunta);
    }

    public function logicalDelete($idjunta){
        return $this->juntaData->logicalDelte($idjunta);
    }

    public function verifyPuesto($junta){
        return $this->juntaData->verifyPuesto($junta);
    }

    
}

?>