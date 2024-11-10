<?php

class EscuelaMusica
{
    private $idEscuelaMusica;
    private $nombre;
    private $cedulaJuridica;
    private $correo;
    private $telefono;
    private $estado;


    public function __construct($idEscuelaMusica = null, $nombre = "", $cedulaJuridica = "", $correo = "",  $telefono = "", $estado = 0)
    {
        $this->idEscuelaMusica = $idEscuelaMusica;
        $this->nombre = $nombre;
        $this->cedulaJuridica = $cedulaJuridica;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->estado = $estado;
    }

    public function getIdEscuelaMusica()
    {
        return $this->idEscuelaMusica;
    }

    public function setIdEscuelaMusica($idEscuelaMusica)
    {
        $this->idEscuelaMusica = $idEscuelaMusica;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getCedulaJuridica()
    {
        return $this->cedulaJuridica;
    }

    public function setCedulaJuridica($cedulaJuridica)
    {
        $this->cedulaJuridica = $cedulaJuridica;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
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

?>
