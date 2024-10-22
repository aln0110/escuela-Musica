<?php
include_once '../data/dataCurso.php';

class cursoBusiness
{
    private $dataCurso;

    public function __construct()
    {
        $this->dataCurso = new dataCurso();
    }

    public function insertCurso($curso)
    {
        return $this->dataCurso->insertCurso($curso);
    }

    public function getCursos()
    {
        return $this->dataCurso->getCursos();
    }

    public function getCurso($idCurso)
    {
        return $this->dataCurso->getCurso($idCurso);
    }

    public function updateCurso($curso)
    {
        return $this->dataCurso->updateCurso($curso);
    }

    public function deleteCurso($idCurso)
    {
        return $this->dataCurso->deleteCurso($idCurso);
    }

    public function logicalDelete($idCurso)
    {
        return $this->dataCurso->logicalDeleteCurso($idCurso);
    }

    public function cursoExistsBySigla($sigla)
    {
        return $this->dataCurso->cursoExistsBySigla($sigla);
    }

    public function getCursoBySigla($sigla)
    {
        return $this->dataCurso->getCursoIdBySigla($sigla);
    }
}




?>