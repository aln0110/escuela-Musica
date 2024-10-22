<?php
include_once '../data/dataMatricula.php';

class matriculaBusiness
{
    private $dataMatricula;

    public function __construct()
    {
        $this->dataMatricula = new dataMatricula();
    }

    public function insertMatricula($matricula)
    {
        return $this->dataMatricula->insertMatricula($matricula);
    }

    public function getMatriculas()
    {
        return $this->dataMatricula->getMatriculas();
    }

    public function getMatricula($idMatricula)
    {
        return $this->dataMatricula->getMatricula($idMatricula);
    }

    public function updateMatricula($matricula)
    {
        return $this->dataMatricula->updateMatricula($matricula);
    }


    public function logicalDelete($idMatricula)
    {
        return $this->dataMatricula->logicalDeleteMatricula($idMatricula);
    }


    public function getMatriculaDetails($idMatricula)
    {
        return $this->dataMatricula->getMatriculaDetails($idMatricula);
    }

    public function getCursoByEstudiante($idEstudiante)
    {
        return $this->dataMatricula->getCursoByEstudiante($idEstudiante);
    }



}



?>