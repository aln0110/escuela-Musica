<?php
include_once '../data/dataMatriculaDetalle.php';

class matriculaDetalleBusiness
{
    private $dataMatriculaDetalle;

    public function __construct()
    {
        $this->dataMatriculaDetalle = new dataMatriculaDetalles();
    }

    public function getMatriculaDetalleByEstudent($id)
    {
        return $this->dataMatriculaDetalle->getMatriculaDetalleByEstudent($id);
    }

    public function updateNota($id, $nota)
    {
        return $this->dataMatriculaDetalle->uptadeteNota($id, $nota);
    }

    public function logicalDelete($idMatriculaDetalle)
    {
        return $this->dataMatriculaDetalle->logicalDelete($idMatriculaDetalle);
    }
}




?>