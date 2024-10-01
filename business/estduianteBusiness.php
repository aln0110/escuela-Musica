<?php
include_once "data/dataEstudiante.php";

class  estudianteBusiness
{
    public $dataEstudiante;

    public function estudianteBusiness()
    {
        $this->dataEstudiante = new dataEstudiante();
    }

    public function insertEstudiante($estudiante)
    {
        return $this->dataEstudiante->insertEstudiante($estudiante);
    }

    public function getEstudiantes()
    {
        return $this->dataEstudiante->getEstudiantes();
    }

    public function getEstudiante($idEstudiante)
    {
        return $this->dataEstudiante->getEstudiante($idEstudiante);
    }

    public function updateEstudiante($estudiante)
    {
        return $this->dataEstudiante->updateEstudiante($estudiante);
    }

    public function deleteEstudiante($idEstudiante)
    {
        return $this->dataEstudiante->deleteEstudiante($idEstudiante);
    }

    public function logicalDelteEstudiante($idEstudiante)
    {
        return $this->dataEstudiante->logicalDelteEstudiante($idEstudiante);
    }
}

?>