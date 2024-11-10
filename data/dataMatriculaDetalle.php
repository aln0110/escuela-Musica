<?php
include_once 'data.php';
include_once '../domain/detallesMatricula.php';

class dataMatriculaDetalles extends Data
{


    public function getMatriculaDetalleByEstudent($id)
    {
        $sql = "SELECT 
    d.tbmatriculadetalleid,
    d.tbmatriculadetallenota,
    d.tbmatriculadetalleestado,
    m.tbmatriculaid,
    m.tbmatriculaactivo,
    e.tbEstudianteNombre,
    e.tbEstudianteApellido,
    c.tbcursonombre,
    c.tbcursosigla,
    c.tbcursogrupo,
    p.tbprofesornombre,
    p.tbprofesorapellidos,
    ci.tbciclonombre
FROM  tbmatriculadetalle d
JOIN  tbmatricula m ON d.tbmatriculadetallematriculaid = m.tbmatriculaid
JOIN  tbestudiante e ON m.tbmatriculaestudiante = e.tbestudianteid
JOIN  tbcurso c ON m.tbmatriculacurso = c.tbcursoid
JOIN  tbprofesor p ON c.tbcursoidprofesor = p.tbprofesorid
JOIN  tbciclo ci ON c.tbcursoidciclo = ci.tbcicloid
WHERE  m.tbmatriculaestudiante = $id AND d.tbmatriculadetalleestado =1;  ";

        $result = $this->conn->query($sql);

        $matriculaDetalles = [];
        while ($row = $result->fetch_assoc()) {
            $matriculaDetalles[] = new matriculaDetalles(
                $row['tbmatriculadetalleid'],
                $row['tbcursonombre'],
                $row['tbcursosigla'],
                $row['tbcursogrupo'],
                $row['tbEstudianteNombre'],
                $row['tbEstudianteApellido'],
                $row['tbprofesornombre'],
                $row['tbprofesorapellidos'],
                $row['tbciclonombre'],
                $row['tbmatriculadetallenota'],
                $row['tbmatriculadetalleestado'],

            );
        }

        mysqli_close($this->conn);
        return $matriculaDetalles;

    }

    public function uptadeteNota($id, $nota)
    {
        $sql = "UPDATE tbmatriculadetalle SET tbmatriculadetallenota = $nota WHERE tbmatriculadetalleid = $id";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function logicalDelete($id)
    {
        $sql = "UPDATE tbmatriculadetalle SET tbmatriculadetalleestado = 0 WHERE tbmatriculadetalleid = $id";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }   

}
