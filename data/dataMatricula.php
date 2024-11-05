<?php
include_once 'data.php';
include_once '../domain/matricula.php';
include_once '../domain/detallesMatricula.php';
include_once '../domain/cursoDetalles.php';

class dataMatricula extends Data
{


    public function insertMatricula($matricula)
    {
        $sql = "INSERT INTO tbmatricula (tbmatriculaestudiante, tbmatriculacurso, tbmatriculafecha, tbmatriculaactivo) VALUES
            ('" . $matricula->getIdEstudiante() . "', '" . $matricula->getIdCurso() . "', '" . $matricula->getFecha() . "', '" . $matricula->getActivo() . "')";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }


    public function getMatriculas()
    {
        $sql = "SELECT * FROM tbmatricula";
        $result = $this->conn->query($sql);
        $matriculas = [];

        while ($row = $result->fetch_assoc()) {
            $matricula = new Matricula($row['tbmatriculaid'], $row['tbmatriculaestudiante'], $row['tbmatriculacurso'], $row['tbmatriculafecha'], $row['tbmatriculaactivo']);
            array_push($matriculas, $matricula);
        }

        mysqli_close($this->conn);
        return $matriculas;
    }

    public function getMatricula($idMatricula)
    {
        $sql = "SELECT * FROM tbmatricula WHERE tbmatriculaid = $idMatricula";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        $matricula = null;

        if ($row = $result->fetch_assoc()) {
            $matricula = new Matricula($row['tbmatriculaid'], $row['tbmatriculaestudiante'], $row['tbmatriculacurso'], $row['tbmatriculafecha'], $row['tbmatriculaactivo']);
        }

        return $matricula;
    }


    public function updateMatricula($matricula)
    {
        $sql = "UPDATE tbmatricula SET 
                tbmatriculaestudiante = '" . $matricula->getIdEstudiante() . "', tbmatriculacurso = '" . $matricula->getIdCurso() . "',
                tbmatriculafecha = '" . $matricula->getFecha() . "' 
            WHERE tbmatriculaid = " . $matricula->getId();
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }


    public function logicalDeleteMatricula($idMatricula)
    {
        $sql = "UPDATE tbmatricula SET tbmatriculaactivo = 0 WHERE tbmatriculaid = $idMatricula";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }




public function getCursoByEstudiante($idEstudiante) {
    $sql = "SELECT 
                m.tbmatriculaid,   
                c.tbcursonombre, 
                c.tbcursosigla, 
                c.tbcursogrupo,
                p.tbprofesornombre, 
                p.tbprofesorapellidos, 
                ci.tbciclonombre,
                m.tbmatriculaactivo 
            FROM tbmatricula m
            JOIN tbcurso c ON m.tbmatriculacurso = c.tbcursoid
            JOIN tbprofesor p ON c.tbcursoidprofesor = p.tbprofesorid
            JOIN tbciclo ci ON c.tbcursoidciclo = ci.tbcicloid
            WHERE m.tbmatriculaestudiante = $idEstudiante";

    $result = $this->conn->query($sql);

    $cursoDetalles = []; 
    while ($row = $result->fetch_assoc()) {
        $cursoDetalles[] = new CursoDetalles( 
            $row['tbmatriculaid'],  
            $row['tbcursonombre'], 
            $row['tbcursosigla'], 
            $row['tbcursogrupo'], 
            $row['tbprofesornombre'], 
            $row['tbprofesorapellidos'], 
            $row['tbciclonombre'], 
            $row['tbmatriculaactivo']  
        );
    }

    mysqli_close($this->conn);
    return $cursoDetalles;  
}






}
