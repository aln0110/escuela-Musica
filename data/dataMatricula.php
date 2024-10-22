<?php
include_once 'data.php';
include_once '../domain/matricula.php';

class dataMatricula extends Data {


    public function insertMatricula($matricula) {
        $sql = "INSERT INTO tbmatricula (tbmatriculaestudiante, tbmatriculaprofesor, tbmatriculacurso, tbmatriculafecha) VALUES
            ('" . $matricula->getIdEstudiante() . "', '" . $matricula->getIdProfesor() . "', '" . $matricula->getIdCurso() . "', '" . $matricula->getFecha() . "')";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }


    public function getMatriculas() {
        $sql = "SELECT * FROM tbmatricula";
        $result = $this->conn->query($sql);
        $matriculas = [];

        while ($row = $result->fetch_assoc()) {
            $matricula = new Matricula($row['tbmatriculaid'], $row['tbmatriculaestudiante'], $row['tbmatriculaprofesor'], $row['tbmatriculacurso'], $row['tbmatriculafecha']);
            array_push($matriculas, $matricula);
        }

        mysqli_close($this->conn);
        return $matriculas;
    }

    public function getMatricula($idMatricula) {
        $sql = "SELECT * FROM tbmatricula WHERE tbmatriculaid = $idMatricula";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        $matricula = null;

        if ($row = $result->fetch_assoc()) {
            $matricula = new Matricula($row['tbmatriculaid'], $row['tbmatriculaestudiante'], $row['tbmatriculaprofesor'], $row['tbmatriculacurso'], $row['tbmatriculafecha']);
        }

        return $matricula;
    }


    public function updateMatricula($matricula) {
        $sql = "UPDATE tbmatricula SET 
                tbmatriculaestudiante = '" . $matricula->getIdEstudiante() . "',
                tbmatriculaprofesor = '" . $matricula->getIdProfesor() . "',
                tbmatriculacurso = '" . $matricula->getIdCurso() . "',
                tbmatriculafecha = '" . $matricula->getFecha() . "' 
            WHERE tbmatriculaid = " . $matricula->getId();
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }


    public function logicalDeleteMatricula($idMatricula) {
        $sql = "UPDATE tbmatricula SET tbmatriculaactivo = 0 WHERE tbmatriculaid = $idMatricula";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }
}
?>
