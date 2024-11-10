<?php
class instrumento {
    private $id;
    private $tipo;
    private $instrumento;
    private $marca;
    private $codigo;
    private $serie;
    private $uso;
    private $activo;

    public function __construct($id=null, $tipo="", $instrumento="", $marca="", $codigo="", $serie="", $uso="", $activo="") {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->instrumento = $instrumento;
        $this->marca = $marca;
        $this->codigo = $codigo;
        $this->serie = $serie;
        $this->uso = $uso;
        $this->activo = $activo;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getInstrumento() {
        return $this->instrumento;
    }

    public function setInstrumento($instrumento) {
        $this->instrumento = $instrumento;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getSerie() {
        return $this->serie;
    }

    public function setSerie($serie) {
        $this->serie = $serie;
    }

    public function getUso() {
        return $this->uso;
    }

    public function setUso($uso) {
        $this->uso = $uso;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }
    public function getMarca() {
        return $this->marca;
    }
    public function setMarca($marca) {
        $this->marca = $marca;
    }
}



?>