<?php
include 'data.php';
include '../domain/instrumento.php';

class dataInstrumento extends Data {

    public function insertInstrumento($instrumento) {
        $sql = "INSERT INTO tbinstrumento (tbinstrumentotipo, tbinstrumentoinstrumento, tbinstrumentomarca, tbinstrumentocodigo, tbinstrumentoserie, tbinstrumentouso, tbinstrumentoactivo) VALUES 
        ('" . $instrumento->getTipo() . "', '" . $instrumento->getInstrumento() . "', '" . $instrumento->getMarca() . "', '" . $instrumento->getCodigo() . "', 
        '" . $instrumento->getSerie() . "', " . ($instrumento->getUso() ? '1' : '0') . ", " . ($instrumento->getActivo() ? '1' : '0') . ")";

        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function getInstrumentos() {
        $sql = "SELECT * FROM tbinstrumento";
        $result = $this->conn->query($sql);
        
        $instrumentos = [];
        while ($row = $result->fetch_assoc()) {
            $instrumento = new Instrumento(
                $row['tbinstrumentoid'], 
                $row['tbinstrumentotipo'], 
                $row['tbinstrumentoinstrumento'], 
                $row['tbinstrumentomarca'], 
                $row['tbinstrumentocodigo'], 
                $row['tbinstrumentoserie'], 
                $row['tbinstrumentouso'] == '1', 
                $row['tbinstrumentoactivo'] == '1'
            );
            array_push($instrumentos, $instrumento);
        }
        mysqli_close($this->conn);
        return $instrumentos;
    }

    public function getInstrumento($id) {
        $sql = "SELECT * FROM tbinstrumento WHERE tbinstrumentoid = $id";
        $result = $this->conn->query($sql);

        if ($row = $result->fetch_assoc()) {
            $instrumento = new Instrumento(
                $row['tbinstrumentoid'], 
                $row['tbinstrumentotipo'], 
                $row['tbinstrumentoinstrumento'], 
                $row['tbinstrumentomarca'], 
                $row['tbinstrumentocodigo'], 
                $row['tbinstrumentoserie'], 
                $row['tbinstrumentouso'] == '1', 
                $row['tbinstrumentoactivo'] == '1'
            );
            mysqli_close($this->conn);
            return $instrumento;
        }
        mysqli_close($this->conn);
        return null;
    }

    public function updateInstrumento($instrumento) {
        $sql = "UPDATE tbinstrumento SET tbinstrumentotipo = '" . $instrumento->getTipo() . "', tbinstrumentoinstrumento = '" . $instrumento->getInstrumento() . "', 
        tbinstrumentomarca = '" . $instrumento->getMarca() . "',  tbinstrumentocodigo = '" . $instrumento->getCodigo() . "', tbinstrumentoserie = '" . $instrumento->getSerie() . "', 
        tbinstrumentouso = " . ($instrumento->getUso() ? '1' : '0') . ", tbinstrumentoactivo = " . ($instrumento->getActivo() ? '1' : '0') . " 
        WHERE tbinstrumentoid = " . $instrumento->getId();

        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function deleteInstrumento($id) {
        $sql = "DELETE FROM tbinstrumento WHERE tbinstrumentoid = $id";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function logicalDeleteInstrumento($id) {
        $sql = "UPDATE tbinstrumento SET tbinstrumentoactivo = '0' WHERE tbinstrumentoid = $id";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function uso($id) {
        $sql = "UPDATE tbinstrumento SET tbinstrumentouso = '0' WHERE tbinstrumentoid = $id";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }
}

?>
