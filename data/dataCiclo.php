<?php
include 'data.php';
include '../domain/ciclo.php';

class dataCiclo extends Data{
    public function insertCiclo($ciclo){
        $sql = "INSERT INTO tbciclo (tbciclonombre, tbciclodescripcion, tbciclotipo, tbcicloinicio, tbciclofin, tbcicloactivo) VALUES
            ('" . $ciclo->getNombreCiclo() . "', '" . $ciclo->getDescripcionCiclo() . "', '" . $ciclo->getTipoCiclo() . "', '" . $ciclo->getFechaInicioCiclo() . "', '" . $ciclo->getFechaFinCiclo() . "', '" . $ciclo->getEstadoCiclo() . "')";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function getCiclos(){
        $sql = "SELECT * FROM tbciclo";
        $result = $this->conn->query($sql);
        $ciclos = [];

        while ($row = $result->fetch_assoc()) {
            $ciclo = new Ciclo($row['tbcicloid'], $row['tbciclonombre'], $row['tbciclodescripcion'], $row['tbciclotipo'], $row['tbcicloinicio'], $row['tbciclofin'], $row['tbcicloactivo']);
            array_push($ciclos, $ciclo);
        }

        mysqli_close($this->conn);
        return $ciclos;
    }

    public function getCiclo($idCiclo){
        $sql = "SELECT * FROM tbciclo WHERE tbcicloid = $idCiclo";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        while ($row = $result->fetch_assoc()) {
            $ciclo = new Ciclo($row['tbcicloid'], $row['tbciclonombre'], $row['tbciclodescripcion'], $row['tbciclotipo'], $row['tbcicloinicio'], $row['tbciclofin'], $row['tbcicloactivo']);
        }
        return $ciclo;
    }

    public function updateCiclo($ciclo){
        $sql = "UPDATE tbciclo SET tbciclonombre = '" . $ciclo->getNombreCiclo() . "', tbciclodescripcion = '" . $ciclo->getDescripcionCiclo() . "', tbciclotipo = '" . $ciclo->getTipoCiclo() . "', tbcicloinicio = '" . $ciclo->getFechaInicioCiclo() . "', tbciclofin = '" . $ciclo->getFechaFinCiclo() . "', tbcicloactivo = '" . $ciclo->getEstadoCiclo() . "' WHERE tbcicloid = " . $ciclo->getIdCiclo();
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function logicalDeleteCiclo($idCiclo){
        $sql = "UPDATE tbciclo SET tbcicloactivo = '0' WHERE tbcicloid = $idCiclo";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }


}



?>