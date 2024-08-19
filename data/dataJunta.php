<?php
include 'data.php';
include '../domain/junta.php';

class dataJunta extends Data {

    public function insertJunta($junta)
    {
        $sql = "INSERT INTO tbjunta (nombrejunta, cedulajunta, juntapuesto, fechainiciojunta, fechafinaljunta, juntaactivo) VALUES
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
            $junta = new Junta($row['idjunta'], $row['nombrejunta'], $row['cedulajunta'], $row['juntapuesto'], $row['fechainiciojunta'], $row['fechafinaljunta'], $row['juntaactivo']);
            array_push($juntas, $junta);
        }
        return $juntas;
    }

    public function getJunta($idjunta)
    {
        $sql = "SELECT * FROM tbjunta WHERE idjunta = $idjunta";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        while ($row = $result->fetch_assoc()) {
            $junta = new Junta($row['idjunta'], $row['nombrejunta'], $row['cedulajunta'], $row['juntapuesto'], $row['fechainiciojunta'], $row['fechafinaljunta'], $row['juntaactivo']);
        }

        return $junta;
    }

    public function updateJunta($junta)
    {
        $sql = "UPDATE tbjunta SET nombrejunta = '" . $junta->getNombrejunta() . "', cedulajunta = '" . $junta->getCedulajunta() . "', juntapuesto = '" . $junta->getJuntapuesto() . "', fechainiciojunta = '" . $junta->getFechainiciojunta() . "', fechafinaljunta = '" . $junta->getFechafinaljunta() . "', juntaactivo = '" . $junta->getJuntaactivo() . "' WHERE idjunta = " . $junta->getIdjunta();
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $junta;
    }

    public function deleteJunta($idjunta)
    {
        $sql = "DELETE FROM tbjunta WHERE idjunta = $idjunta";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function logicalDelte($idjunta){
        $sql = "UPDATE tbjunta SET juntaactivo = 'False' WHERE idjunta = $idjunta";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }
}


?>