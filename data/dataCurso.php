<?php
include_once "data.php";
include_once "../domain/curso.php";

class dataCurso extends Data {

    public function insertCurso($curso) {
        $sql = "INSERT INTO tbCurso (tbcursonombre, tbcursosigla, tbcursorequisito, tbcursocorrequisito, tbcursocreditos, tbcursoactivo) VALUES 
        ('" . $curso->getNombre() . "', '" . $curso->getSiglas() . "', '" . $curso->getRequisito() . "', '" . $curso->getCorequisito() . "', '" . $curso->getCreditos() . "', '" . $curso->getEstado() . "')";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function getCursos() {
        $sql = "SELECT * FROM tbCurso";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        $cursos = [];
        while ($row = $result->fetch_assoc()) {
            $curso = new curso($row["tbcursoid"], $row["tbcursonombre"], $row["tbcursosigla"], $row["tbcursorequisito"], $row["tbcursocorrequisito"], $row["tbcursocreditos"], $row["tbcursoactivo"]);
            array_push($cursos, $curso);
        }
        return $cursos;
    }

    public function getCurso($idCurso) {
        $sql = "SELECT * FROM tbCurso WHERE tbcursoid = $idCurso";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        $curso = null;
        while ($row = $result->fetch_assoc()) {
            $curso = new curso($row["tbcursoid"], $row["tbcursonombre"], $row["tbcursosigla"], $row["tbcursorequisito"], $row["tbcursocorrequisito"], $row["tbcursocreditos"], $row["tbcursoactivo"]);
        }
        return $curso;
    }

    public function updateCurso($curso) {
        $sql = "UPDATE tbCurso SET tbcursonombre = '" . $curso->getNombre() . "', tbcursosigla = '" . $curso->getSiglas() . "', tbcursorequisito = '" . $curso->getRequisito() . "', tbcursocorrequisito = '" . $curso->getCorequisito() . "', tbcursocreditos = '" . $curso->getCreditos() . "', tbcursoactivo = '" . $curso->getEstado() . "' WHERE tbcursoid = " . $curso->getId();
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function deleteCurso($idCurso) {
        $sql = "DELETE FROM tbCurso WHERE tbcursoid = $idCurso";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function logicalDeleteCurso($idCurso) {
        $sql = "UPDATE tbCurso SET tbcursoactivo = 0 WHERE tbcursoid = $idCurso";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }
}
?>
