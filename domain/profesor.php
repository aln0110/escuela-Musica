<?php
class profesor
{
    private $id;
    private $nombre;
    private $apellido;
    private $direccion;
    private $tipoIdentificacion;
    private $cedula;
    private $fechaNacimiento;
    private $iban;
    private $telefono;
    private $correo;
    private $estado;

    public function __construct($id = "", $nombre = "", $apellido = "", $direccion = "", $tipoIdentificacion = "", $cedula = "", $iban = "", $telefono = "", $correo = "", $estado = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->tipoIdentificacion = $tipoIdentificacion;
        $this->cedula = $cedula;
       
        $this->iban = $iban;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->estado = $estado;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setTipoIdentificacion($tipoIdentificacion)
    {
        $this->tipoIdentificacion = $tipoIdentificacion;
    }

    public function getTipoIdentificacion()
    {
        return $this->tipoIdentificacion;
    }

    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }

    public function getCedula()
    {
        return $this->cedula;
    }

    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    public function setIban($iban)
    {
        $this->iban = $iban;
    }

    public function getIban()
    {
        return $this->iban;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    
}
