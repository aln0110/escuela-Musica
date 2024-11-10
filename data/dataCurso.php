<?php
include_once "data.php";
include_once "../domain/curso.php";

class dataCurso extends Data {

    public function insertCurso($curso) {
        $sql = "INSERT INTO tbCurso (tbcursonombre, tbcursosigla, tbcursorequisito, tbcursocorrequisito, tbcursocreditos, tbcursoinihora, tbcursofinhora, tbcursoactivo, tbcursogrupo, tbcursoidciclo, tbcursoidprofesor) VALUES 
        ('" . $curso->getNombre() . "', '" . $curso->getSiglas() . "', '" . $curso->getRequisito() . "', '" . $curso->getCorequisito() . "', '" . $curso->getCreditos() . "', '" . $curso->getIniHora() . "', '" . $curso->getFinHora() . "', '" . $curso->getEstado() . "', '" . $curso->getGrupo() . "', '" . $curso->getIdCiclo() . "', '" . $curso->getIdProfesor() . "')";
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
            $curso = new curso($row["tbcursoid"], $row["tbcursonombre"], $row["tbcursosigla"], $row["tbcursorequisito"], $row["tbcursocorrequisito"], $row["tbcursocreditos"], $row["tbcursoinihora"], $row["tbcursofinhora"], $row["tbcursoactivo"]);
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
            $curso = new curso($row["tbcursoid"], $row["tbcursonombre"], $row["tbcursosigla"], $row["tbcursorequisito"], $row["tbcursocorrequisito"], $row["tbcursocreditos"], $row["tbcursoinihora"], $row["tbcursofinhora"], $row["tbcursoactivo"]);
        }
        return $curso;
    }

    public function getCursosActivo() {
        $sql = "SELECT * FROM tbCurso where tbcursoactivo = 1";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        $cursos = [];
        while ($row = $result->fetch_assoc()) {
            $curso = new curso($row["tbcursoid"], $row["tbcursonombre"], $row["tbcursosigla"], $row["tbcursorequisito"], $row["tbcursocorrequisito"], $row["tbcursocreditos"], $row["tbcursoinihora"], $row["tbcursofinhora"], $row["tbcursoactivo"]);
            array_push($cursos, $curso);
        }
        return $cursos;
    }

    public function updateCurso($curso) {
        $sql = "UPDATE tbCurso SET tbcursonombre = '" . $curso->getNombre() . "', tbcursosigla = '" . $curso->getSiglas() . "', tbcursorequisito = '" . $curso->getRequisito() . "', tbcursocorrequisito = '" . $curso->getCorequisito() . "', tbcursocreditos = '" . $curso->getCreditos() . "', tbcursoinihora = '" . $curso->getIniHora() . "', tbcursofinhora = '" . $curso->getFinHora() . "', tbcursoactivo = '" . $curso->getEstado() . "', tbcursoGrupo = '" . $curso->getGrupo() . "', tbcursoIdCiclo = '" . $curso->getIdCiclo() . "', tbcursoIdProfesor = '" . $curso->getIdProfesor() . "' WHERE tbcursoid = " . $curso->getId();
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

    public function getCursoIdBySigla($sigla) {
        
        $sql = "SELECT tbcursoid FROM tbCurso WHERE tbcursosigla = '$sigla'";
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
          //  mysqli_close($this->conn);
            return $row['tbcursoid'];  
        } else {
          //  mysqli_close($this->conn);
            return null;  
        }
    }

    public function cursoExistsBySigla($sigla) {
        
        $sql = "SELECT tbcursoid FROM tbCurso WHERE tbcursosigla = '$sigla'";
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $cursoId = $row['tbcursoid'];  
         //   mysqli_close($this->conn);
            return ['exists' => true, 'id' => $cursoId];  
        } else {
            //mysqli_close($this->conn);
            return ['exists' => false, 'id' => null];  
        }
    }
    
    
}
?>
