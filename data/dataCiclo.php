<?php
include 'data.php';
include '../domain/ciclo.php';

class dataCiclo extends Data{
    public function insertCiclo($ciclo){
        $sql = "INSERT INTO tbciclo (tbciclonombre, tbciclodescripcion, tbciclotipo, tbciclofechainicio, tbciclofechafin, tbcicloestado) VALUES
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
            $ciclo = new Ciclo($row['tbcicloid'], $row['tbciclonombre'], $row['tbciclodescripcion'], $row['tbciclotipo'], $row['tbciclofechainicio'], $row['tbciclofechafin'], $row['tbcicloestado']);
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
            $ciclo = new Ciclo($row['tbcicloid'], $row['tbciclonombre'], $row['tbciclodescripcion'], $row['tbciclotipo'], $row['tbciclofechainicio'], $row['tbciclofechafin'], $row['tbcicloestado']);
        }
        return $ciclo;
    }

    public function updateCiclo($ciclo){
        $sql = "UPDATE tbciclo SET tbciclonombre = '" . $ciclo->getNombreCiclo() . "', tbciclodescripcion = '" . $ciclo->getDescripcionCiclo() . "', tbciclotipo = '" . $ciclo->getTipoCiclo() . "', tbciclofechainicio = '" . $ciclo->getFechaInicioCiclo() . "', tbciclofechafin = '" . $ciclo->getFechaFinCiclo() . "', tbcicloestado = '" . $ciclo->getEstadoCiclo() . "' WHERE tbcicloid = " . $ciclo->getIdCiclo();
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function logicalDeleteCiclo($idCiclo){
        $sql = "UPDATE tbciclo SET tbcicloestado = '0' WHERE tbcicloid = $idCiclo";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }
    

}



?>