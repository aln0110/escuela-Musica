<?php
include '../data/dataCategoria.php';

class categoriaBusiness
{


    private $dataCategoria;

    public function __construct()
    {
        $this->dataCategoria = new dataCategoria();
    }

    public function categoriaBusiness()
    {
        $this->dataCategoria = new dataCategoria();
    }

    public function insertCategoria($categoria)
    {
        return $this->dataCategoria->insertCategoria($categoria);
    }

    public function getCategorias()
    {
        return $this->dataCategoria->getCategorias();
    }

    public function getCategoria($idCategoria)
    {
        return $this->dataCategoria->getCategoria($idCategoria);
    }

    public function updateCategoria($categoria)
    {
        return $this->dataCategoria->updateCategoria($categoria);
    }

    public function logicalDeleteCategoria($idCategoria)
    {
        return $this->dataCategoria->logicalDeleteCategoria($idCategoria);
    }
    public function categoriaExist($dato)
    {
        return $this->dataCategoria->categiriaExist($dato);
    }
}




?>