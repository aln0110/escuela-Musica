<?php
include 'data.php';
include '../domain/partitura.php';
class dataPartitura extends Data
{

    public function insertPartitura($partitura)
    {
        $pdfContent = file_get_contents($partitura->getPdfPartitura()['tmp_name']);
        $pdfContentEscaped = mysqli_real_escape_string($this->conn, $pdfContent);

        $sql = "INSERT INTO tbpartitura (tbpartituranombre, tbpartiturainstrumento, tbpartiturapdf, tbpartituraestado) VALUES
            ('" . $partitura->getNombrePartitura() . "', '" . $partitura->getInstrumentoPartitura() . "'
            , '" . $pdfContentEscaped . "', '" . $partitura->getEstadoPartitura() . "')";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function getPartituras()
    {
        $sql = "SELECT * FROM tbpartitura";
        $result = $this->conn->query($sql);
        $partituras = [];

        while ($row = $result->fetch_assoc()) {
            
            $partitura = new Partitura($row['tbpartituraid'], $row['tbpartituranombre'], $row['tbpartiturainstrumento'], $row['tbpartiturapdf'], $row['tbpartituraestado']);
            array_push($partituras, $partitura);
        }

        mysqli_close($this->conn);
        return $partituras;
    }

    public function getPartitura($idPartitura)
    {
        $sql = "SELECT * FROM tbpartitura WHERE tbpartituraid = $idPartitura";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        while ($row = $result->fetch_assoc()) {
            $partitura = new Partitura($row['tbpartituraid'], $row['tbpartituranombre'], $row['tbpartiturainstrumento'], $row['tbpartiturapdf'], $row['tbpartituraestado']);
        }
        return $partitura;
    }

    public function getPartiturasByInstrumento($instrumento)
    {
        $sql = "SELECT * FROM tbpartitura WHERE tbpartiturainstrumento = '$instrumento'";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        $partituras = [];
        while ($row = $result->fetch_assoc()) {
            $partitura = new Partitura($row['tbpartituraid'], $row['tbpartituranombre'], $row['tbpartiturainstrumento'], $row['tbpartiturapdf'], $row['tbpartituraestado']);
            array_push($partituras, $partitura);
        }
        return $partituras;
    }

    public function updatePartitura($partitura)
    {   $pdfContent = file_get_contents($partitura->getPdfPartitura()['tmp_name']);
        $pdfContentEscaped = mysqli_real_escape_string($this->conn, $pdfContent);

        $sql = "UPDATE tbpartitura SET tbpartituranombre = '" . $partitura->getNombrePartitura() . "', tbpartiturainstrumento = '" . $partitura->getInstrumentoPartitura() . "'
        , tbpartiturapdf = '" . $partitura->getPdfPartitura() . "', tbpartituraestado = '" . $partitura->getEstadoPartitura() . "' WHERE tbpartituraid = " . $partitura->getIdPartitura();
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function deletePartitura($idPartitura)
    {
        $sql = "DELETE FROM tbpartitura WHERE tbpartituraid = $idPartitura";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function  logicalDeletePartitura($idPartitura)
    {
        $sql = "UPDATE tbpartitura SET tbpartituraestado = 0 WHERE tbpartituraid = $idPartitura";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }
}
?>