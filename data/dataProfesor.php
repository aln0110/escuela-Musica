<?php
include_once "data.php";
include_once "../domain/profesor.php";

class dataProfesor extends Data{

    public function insertProfesor($profesor){
        $sql = "INSERT INTO tbProfesor (tbProfesorNombre, tbProfesorApellidos, tbProfesorTipoIdentificacion, tbProfesorCedula, tbProfesorDireccion, tbProfesorTelefono, tbProfesorCorreo, tbProfesorIban, tbProfesorActivo) VALUES 
        ('" . $profesor->getNombre() . "', '" . $profesor->getApellido() . "', '" . $profesor->getTipoIdentificacion() . "', '" . $profesor->getCedula() . "', '" . $profesor->getDireccion() . "', '" . $profesor->getTelefono() . "', '" . $profesor->getCorreo() . "', '" . $profesor->getIban() . "', '" . $profesor->getEstado() . "')";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function getProfesores(){
        $sql = "SELECT * FROM tbProfesor";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        $profesores = [];
        while ($row = $result->fetch_assoc()) {
            $profesor = new Profesor($row["tbProfesorID"], $row["tbProfesorNombre"], $row["tbProfesorApellidos"], $row["tbProfesorDireccion"], $row["tbProfesorTipoIdentificacion"], $row["tbProfesorCedula"], $row["tbProfesorFechaNacimiento"], $row["tbProfesorIban"], $row["tbProfesorTelefono"], $row["tbProfesorCorreo"], $row["tbProfesorActivo"]);
            array_push($profesores, $profesor);
        }
        return $profesores;
    }

    public function getProfesor($idProfesor){
        $sql = "SELECT * FROM tbProfesor WHERE tbProfesorID = $idProfesor";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        while ($row = $result->fetch_assoc()) {
            $profesor = new Profesor($row["tbProfesorID"], $row["tbProfesorNombre"], $row["tbProfesorApellidos"], $row["tbProfesorDireccion"], $row["tbProfesorTipoIdentificacion"], $row["tbProfesorCedula"], $row["tbProfesorFechaNacimiento"], $row["tbProfesorIban"], $row["tbProfesorTelefono"], $row["tbProfesorCorreo"], $row["tbProfesorActivo"]);
        }
        return $profesor;
    }

    public function updateProfesor($profesor){
        $sql = "UPDATE tbProfesor SET tbProfesorNombre = '" . $profesor->getNombre() . "', tbProfesorApellidos = '" . $profesor->getApellido() . "', tbProfesorTipoIdentificacion = '" . $profesor->getTipoIdentificacion() . "', tbProfesorCedula = '" . $profesor->getCedula() . "', tbProfesorDireccion = '" . $profesor->getDireccion() . "', tbProfesorTelefono = '" . $profesor->getTelefono() . "', tbProfesorCorreo = '" . $profesor->getCorreo() . "', tbProfesorIban = '" . $profesor->getIban() . "', tbProfesorActivo = '" . $profesor->getEstado() . "' WHERE tbProfesorID = " . $profesor->getId();
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function deleteProfesor($idProfesor){
        $sql = "DELETE FROM tbProfesor WHERE tbProfesorID = $idProfesor";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function logicalDeleteProfesor($idProfesor){
        $sql = "UPDATE tbProfesor SET tbProfesorActivo = 0 WHERE tbProfesorID = $idProfesor";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

}
?>
