<?php
include 'data.php';
include '../domain/junta.php';

class dataJunta extends Data {

    public function insertJunta($junta)
    {
        $sql = "INSERT INTO tbjunta (tbjuntanombre, tbjuntacedula, tbjuntapuesto, tbjuntafechainicio, tbjuntafechafinal, tbjuntaactivo) VALUES
       ('" . $junta->getNombrejunta() . "', '" . $junta->getCedulajunta() . "', '" . $junta->getJuntapuesto() . "', '" . $junta->getFechainiciojunta() . "', '" . $junta->getFechafinaljunta() . "', '" . $junta->getJuntaactivo() . "')";

       $result = $this->conn->query($sql);
       mysqli_close($this->conn);
       return $result;
    }

    public function getJuntas()
    {
        $sql = "SELECT * FROM tbjunta";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
         $juntas = [];
        while ($row = $result->fetch_assoc()) {
            $junta = new Junta($row['idjunta'], $row['tbjuntanombre'], $row['tbjuntacedula'], $row['tbjuntapuesto'], $row['tbjuntafechainicio'], $row['tbjuntafechafinal'], $row['tbjuntaactivo']);
            array_push($juntas, $junta);
        }
        return $juntas;
    }

    public function getJunta($idjunta)
    {
        $sql = "SELECT * FROM tbjunta WHERE tbjuntaid = $idjunta";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        while ($row = $result->fetch_assoc()) {
            $junta = new Junta($row['idjunta'], $row['tbjuntanombre'], $row['tbjuntacedula'], $row['tbjuntapuesto'], $row['tbjuntafechainicio'], $row['tbjuntafechafinal'], $row['tbjuntaactivo']);
        }

        return $junta;
    }

    public function updateJunta($junta)
    {
        $sql = "UPDATE tbjunta SET tbjuntanombre = '" . $junta->getNombrejunta() . "', tbjuntacedula = '" . $junta->getCedulajunta() . "', tbjuntapuesto = '" . $junta->getJuntapuesto() . "', tbjuntafechainicio = '" . $junta->getFechainiciojunta() . "', tbjuntafechafinal = '" . $junta->getFechafinaljunta() . "', tbjuntaactivo = '" . $junta->getJuntaactivo() . "' WHERE tbjuntaid = " . $junta->getIdjunta();
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $junta;
    }

    public function deleteJunta($idjunta)
    {
        $sql = "DELETE FROM tbjunta WHERE tbjuntaid = $idjunta";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function logicalDelte($idjunta){
        $sql = "UPDATE tbjunta SET tbjuntaactivo = 'False' WHERE tbjuntaid = $idjunta";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }
}
?>
