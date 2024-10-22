<?php
include_once "data.php";
include_once "../domain/profesor.php";

class dataProfesor extends Data{

    public function insertProfesor($profesor){
        $sql = "INSERT INTO tbprofesor (tbprofesornombre, tbprofesorapellidos, tbprofesortipoidentificacion, tbprofesorcedula, tbprofesordireccion, tbprofesortelefo, tbprofesorcorreo, tbprofesoriban, tbprofesoractivo) VALUES 
        ('" . $profesor->getNombre() . "', '" . $profesor->getApellido() . "', '" . $profesor->getTipoIdentificacion() . "', '" . $profesor->getCedula() . "', '" . $profesor->getDireccion() . "', '" . $profesor->getTelefono() . "', '" . $profesor->getCorreo() . "', '" . $profesor->getIban() . "', '" . $profesor->getEstado() . "')";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function getProfesores(){
        $sql = "SELECT * FROM tbprofesor";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        $profesores = [];
        while ($row = $result->fetch_assoc()) {
            $profesor = new Profesor($row["tbprofesorid"], $row["tbprofesornombre"], $row["tbprofesorapellidos"], $row["tbprofesordireccion"], $row["tbprofesortipoidentificacion"], $row["tbprofesorcedula"], $row["tbprofesoriban"], $row["tbprofesortelefo"], $row["tbprofesorcorreo"], $row["tbprofesoractivo"]);
            array_push($profesores, $profesor);
        }
        return $profesores;
    }

    public function getProfesor($idProfesor){
        $sql = "SELECT * FROM tbprofesor WHERE tbprofesorid = $idProfesor";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        while ($row = $result->fetch_assoc()) {
            $profesor = new Profesor($row["tbprofesorid"], $row["tbprofesornombre"], $row["tbprofesorapellidos"], $row["tbprofesordireccion"], $row["tbprofesortipoidentificacion"], $row["tbprofesorcedula"], $row["tbprofesoriban"], $row["tbprofesortelefo"], $row["tbprofesorcorreo"], $row["tbprofesoractivo"]);
        }
        return $profesor;
    }

    public function updateProfesor($profesor){
        $sql = "UPDATE tbprofesor SET tbprofesornombre = '" . $profesor->getNombre() . "', tbprofesorapellidos = '" . $profesor->getApellido() . "', tbprofesortipoidentificacion = '" . $profesor->getTipoIdentificacion() . "', tbprofesorcedula = '" . $profesor->getCedula() . "', tbprofesordireccion = '" . $profesor->getDireccion() . "', tbprofesortelefo = '" . $profesor->getTelefono() . "', tbprofesorcorreo = '" . $profesor->getCorreo() . "', tbprofesoriban = '" . $profesor->getIban() . "', tbprofesoractivo = '" . $profesor->getEstado() . "' WHERE tbprofesorid = " . $profesor->getId();
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function deleteProfesor($idProfesor){
        $sql = "DELETE FROM tbprofesor WHERE tbprofesorid = $idProfesor";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function logicalDeleteProfesor($idProfesor){
        $sql = "UPDATE tbprofesor SET tbprofesoractivo = 0 WHERE tbprofesorid = $idProfesor";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function profesorExistsByCedula($cedula) {

        $sql = "SELECT * FROM tbprofesor WHERE tbprofesorcedula = '$cedula'";
        $result = $this->conn->query($sql);
        

        if ($result->num_rows > 0) {
           // mysqli_close($this->conn);
            return true;
        } else {
          //  mysqli_close($this->conn);
            return false;
        }
    }

    public function getProfesorIdByCedula($cedula) {
  
        $sql = "SELECT tbprofesorid FROM tbprofesor WHERE tbprofesorcedula = '$cedula'";
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            mysqli_close($this->conn);
            return $row['tbprofesorid'];
        } else {
            mysqli_close($this->conn);
            return null;  
        }
    }
    

}
?>
