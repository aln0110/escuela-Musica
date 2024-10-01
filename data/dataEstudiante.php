<?php
include_once "data.php";
include_once "domain/Estudiante.php";

class dataEstudiante extends Data{
    public function insertEstudiante($estudiante){
        $sql = "INSERT INTO tbEstudiante (tbEstudianteNombre, tbEstudianteApellido, tbEstudianteTelefono, tbEstudianteCorreo, tbEstudianteDireccion, tbEstudianteTipoIdentificacion, tbEstudianteFechaNacimiento, tbEstudianteCedula, tbEstudianteEstado) VALUES
        ('" . $estudiante->getNombre() . "', '" . $estudiante->getApellido() . "', '" . $estudiante->getTelefono() . "', '" . $estudiante->getCorreo() . "', '" . $estudiante->getDireccion() . "', '" . $estudiante->getTipoIdentificacion() . "', '" . $estudiante->getFechaNacimiento() . "', '" . $estudiante->getCedula() . "', '" . $estudiante->getEstado() . "')";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function getEstudiantes(){
        $sql = "SELECT * FROM tbEstudiante";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        $estudiantes = [];
        while ($row = $result->fetch_assoc()) {
            $estudiante = new Estudiante($row["tbEstudianteId"], $row["tbEstudianteNombre"], $row["tbEstudianteApellido"], $row["tbEstudianteTelefono"], $row["tbEstudianteCorreo"], $row["tbEstudianteDireccion"], $row["tbEstudianteTipoIdentificacion"], $row["tbEstudianteFechaNacimiento"], $row["tbEstudianteCedula"], $row["tbEstudianteEstado"]);
            array_push($estudiantes, $estudiante);
        }
        return $estudiantes;
    }

    public function getEstudiante($idEstudiante){
        $sql = "SELECT * FROM tbEstudiante WHERE tbEstudianteId = $idEstudiante";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        while ($row = $result->fetch_assoc()) {
            $estudiante = new Estudiante($row["tbEstudianteId"], $row["tbEstudianteNombre"], $row["tbEstudianteApellido"], $row["tbEstudianteTelefono"], $row["tbEstudianteCorreo"], $row["tbEstudianteDireccion"], $row["tbEstudianteTipoIdentificacion"], $row["tbEstudianteFechaNacimiento"], $row["tbEstudianteCedula"], $row["tbEstudianteEstado"]);
        }
        return $estudiante;
    }

    public function updateEstudiante($estudiante){
        $sql = "UPDATE tbEstudiante SET tbEstudianteNombre = '" . $estudiante->getNombre() . "', tbEstudianteApellido = '" . $estudiante->getApellido() . "', tbEstudianteTelefono = '" . $estudiante->getTelefono() . "', tbEstudianteCorreo = '" . $estudiante->getCorreo() . "', tbEstudianteDireccion = '" . $estudiante->getDireccion() . "', tbEstudianteTipoIdentificacion = '" . $estudiante->getTipoIdentificacion() . "', tbEstudianteFechaNacimiento = '" . $estudiante->getFechaNacimiento() . "', tbEstudianteCedula = '" . $estudiante->getCedula() . "', tbEstudianteEstado = '" . $estudiante->getEstado() . "' WHERE tbEstudianteId = " . $estudiante->getIdEstudiante();
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function deleteEstudiante($idEstudiante){
        $sql = "DELETE FROM tbEstudiante WHERE tbEstudianteId = $idEstudiante";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function logicalDelteEstudiante($idEstudiante){
        $sql = "UPDATE tbEstudiante SET tbEstudianteEstado = 0 WHERE tbEstudianteId = $idEstudiante";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

}



?>