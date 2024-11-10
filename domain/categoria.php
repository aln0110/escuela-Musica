<?php

class Categoria
{
    public $id;
    public $nombre;
    public $estado;

    public function __construct($id = "", $nombre = "", $estado = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->estado = $estado;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
}
