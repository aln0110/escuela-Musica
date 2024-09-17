<?php
include 'data.php';
include '../domain/instrumentos.php';

class dataInstrumentos extends Data{
    

    public function insertInstrumento($instrumento){
        $sql = "INSERT INTO tbinstrumentos (tbinstrumentosnombre, tbinstrumentoscategoria, tbinstrumentosestado) VALUES 
            ('" . $instrumento->getNombre() . "', '" . $instrumento->getCategoria() . "', '" . $instrumento->getEstado() . "')";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }


    public function getInstrumentos(){
        $sql = "SELECT * FROM tbinstrumentos";
        $result = $this->conn->query($sql);
        $instrumentos = [];

        while ($row = $result->fetch_assoc()) {
            $instrumento = new Instrumentos($row['tbinstrumentosid'], $row['tbinstrumentosnombre'], $row['tbinstrumentoscategoria'], $row['tbinstrumentosestado']);
            array_push($instrumentos, $instrumento);
        }

        mysqli_close($this->conn);
        return $instrumentos;
    }


    public function getInstrumento($idInstrumento){
        $sql = "SELECT * FROM tbinstrumentos WHERE tbinstrumentosid = $idInstrumento";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        while ($row = $result->fetch_assoc()) {
            $instrumento = new Instrumentos($row['tbinstrumentosid'], $row['tbinstrumentosnombre'], $row['tbinstrumentoscategoria'], $row['tbinstrumentosestado']);
        }
        return $instrumento;
    }


    public function updateInstrumento($instrumento){
        $sql = "UPDATE tbinstrumentos SET tbinstrumentosnombre = '" . $instrumento->getNombre() . "', tbinstrumentoscategoria = '" . $instrumento->getCategoria() . "', tbinstrumentosestado = '" . $instrumento->getEstado() . "' 
            WHERE tbinstrumentosid = " . $instrumento->getId();
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }


    public function logicalDeleteInstrumento($idInstrumento){
        $sql = "UPDATE tbinstrumentos SET tbinstrumentosestado = '0' WHERE tbinstrumentosid = $idInstrumento";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }
}
?>
