<?php
include_once '../data/dataProfesor.php';

class profesorBusiness
{
    private $dataProfesor;

    public function __construct()
    {
        $this->dataProfesor = new dataProfesor();
    }

    public function insertProfesor($profesor)
    {
        return $this->dataProfesor->insertProfesor($profesor);
    }

    public function getProfesores()
    {
        return $this->dataProfesor->getProfesores();
    }

    public function getProfesor($idProfesor)
    {
        return $this->dataProfesor->getProfesor($idProfesor);
    }

    public function updateProfesor($profesor)
    {
        return $this->dataProfesor->updateProfesor($profesor);
    }

    public function deleteProfesor($idProfesor)
    {
        return $this->dataProfesor->deleteProfesor($idProfesor);
    }

    public function logicalDelete($idProfesor)
    {
        return $this->dataProfesor->logicalDeleteProfesor($idProfesor);
    }

    public function profesorExistsByCedula($cedula)
    {
        return $this->dataProfesor->profesorExistsByCedula($cedula);
    }

    public function getProfesorIdByCedula($cedula)
    {
        return $this->dataProfesor->getProfesorIdByCedula($cedula);
    }
}

?>