<?php
include 'data.php';
include '../domain/junta.php';

class dataJunta extends Data {

    public function insertJunta($junta)
    {
        $sql = "INSERT INTO tbjunta (tbjuntanombre, tbjuntaindentificacion, tbjuntacedula, tbjuntapuesto, tbjuntafechainicio, tbjuntafechafinal, tbjuntaactivo, tbjuntatelefono, tbjuntacorreo) VALUES
           ('" . $junta->getNombrejunta() . "', '" . $junta->getIdentificacionjunta() . "', '" . $junta->getCedulajunta() . "', '" . $junta->getJuntapuesto() . "'
           , '" . $junta->getFechainiciojunta() . "', '" . $junta->getFechafinaljunta() . "', '" . $junta->getJuntaactivo() . "', '" . $junta->getTelefono() . "', '" . $junta->getCorreo() . "')";

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
            $junta = new Junta($row['tbjuntaid'], $row['tbjuntanombre'], $row['tbjuntacedula'], $row['tbjuntapuesto'], $row['tbjuntafechainicio'], $row['tbjuntafechafinal'], $row['tbjuntaactivo'], $row['tbjuntaindentificacion'], $row['tbjuntatelefono'], $row['tbjuntacorreo']);
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
            $junta = new Junta($row['tbjuntaid'], $row['tbjuntanombre'], $row['tbjuntacedula'], $row['tbjuntapuesto'], $row['tbjuntafechainicio'], $row['tbjuntafechafinal'], $row['tbjuntaactivo'], $row['tbjuntaactivo'], $row['tbjuntaindentificacion'], $row['tbjuntatelefono'], $row['tbjuntacorreo']);
        }

        return $junta;
    }

    public function updateJunta($junta)
    {
        $sql = "UPDATE tbjunta SET tbjuntanombre = '" . $junta->getNombrejunta() . "', tbjuntaindentificacion = '" . $junta->getIdentificacionjunta() . "'
        , tbjuntacedula = '" . $junta->getCedulajunta() . "', tbjuntapuesto = '" . $junta->getJuntapuesto() . "'
        , tbjuntafechainicio = '" . $junta->getFechainiciojunta() . "', tbjuntafechafinal = '" . $junta->getFechafinaljunta() . "'
        , tbjuntaactivo = '" . $junta->getJuntaactivo() . "', tbjuntatelefono = '" . $junta->getTelefono() . "', tbjuntacorreo = '" . $junta->getCorreo() . "' WHERE tbjuntaid = " . $junta->getIdjunta();
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
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
