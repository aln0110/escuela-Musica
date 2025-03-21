<?php
include_once "data.php";
include_once "../domain/estudiante.php";

class dataEstudiante extends Data{
    public function insertEstudiante($estudiante){
        $sql = "INSERT INTO tbestudiante (tbEstudianteNombre, tbEstudianteApellido, tbEstudiantetelefono, tbEstudiantecorreo, tbEstudiantedireccion, tbEstudiantetipoidentificacion, tbEstudiantefechanacimiento, tbEstudiantecedula, tbEstudianteestado) VALUES
        ('" . $estudiante->getNombre() . "', '" . $estudiante->getApellido() . "', '" . $estudiante->getTelefono() . "', '" . $estudiante->getCorreo() . "', '" . $estudiante->getDireccion() . "', '" . $estudiante->getTipoIdentificacion() . "', '" . $estudiante->getFechaNacimiento() . "', '" . $estudiante->getCedula() . "', '" . $estudiante->getEstado() . "')";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function getEstudiantes(){
        $sql = "SELECT * FROM tbestudiante";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        $estudiantes = [];
        while ($row = $result->fetch_assoc()) {
            $estudiante = new Estudiante($row["tbEstudianteID"], $row["tbEstudianteNombre"], $row["tbEstudianteApellido"], $row["tbEstudiantetelefono"], $row["tbEstudiantecorreo"], $row["tbEstudiantedireccion"], $row["tbEstudiantetipoidentificacion"], $row["tbEstudiantefechanacimiento"], $row["tbEstudiantecedula"], $row["tbEstudianteestado"]);
            array_push($estudiantes, $estudiante);
        }
        return $estudiantes;
    }

    public function getEstudiante($idEstudiante){
        $sql = "SELECT * FROM tbestudiante WHERE tbEstudianteID = $idEstudiante";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        while ($row = $result->fetch_assoc()) {
            $estudiante = new Estudiante($row["tbEstudianteID"], $row["tbEstudianteNombre"], $row["tbEstudianteApellido"], $row["tbEstudiantetelefono"], $row["tbEstudiantecorreo"], $row["tbEstudiantedireccion"], $row["tbEstudiantetipoidentificacion"], $row["tbEstudiantefechanacimiento"], $row["tbEstudiantecedula"], $row["tbEstudianteestado"]);
        }
        return $estudiante;
    }

    public function updateEstudiante($estudiante){
        $sql = "UPDATE tbestudiante SET tbEstudianteNombre = '" . $estudiante->getNombre() . "', tbEstudianteApellido = '" . $estudiante->getApellido() . "', tbEstudiantetelefono = '" . $estudiante->getTelefono() . "', tbEstudiantecorreo = '" . $estudiante->getCorreo() . "', tbEstudiantedireccion = '" . $estudiante->getDireccion() . "', tbEstudiantetipoidentificacion = '" . $estudiante->getTipoIdentificacion() . "', tbEstudiantefechanacimiento = '" . $estudiante->getFechaNacimiento() . "', tbEstudiantecedula = '" . $estudiante->getCedula() . "', tbEstudianteestado = '" . $estudiante->getEstado() . "' WHERE tbEstudianteID = " . $estudiante->getId();
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function deleteEstudiante($idEstudiante){
        $sql = "DELETE FROM tbestudiante WHERE tbEstudianteID = $idEstudiante";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function logicalDelteEstudiante($idEstudiante){
        $sql = "UPDATE tbestudiante SET tbEstudianteestado = 0 WHERE tbEstudianteID = $idEstudiante";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function estudianteExistsByCedula($cedula) {

        $sql = "SELECT * FROM tbestudiante WHERE tbEstudiantecedula = '$cedula'";
        $result = $this->conn->query($sql);
        

        if ($result->num_rows > 0) {
          //  mysqli_close($this->conn);
            return true;
        } else {
          //  mysqli_close($this->conn);
            return false;
        }
    }

    public function getEstudianteIdByCedula($cedula) {

        $sql = "SELECT tbestudianteid FROM tbestudiante WHERE tbEstudiantecedula = '$cedula'";
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            mysqli_close($this->conn);
            return $row['tbestudianteid'];
        } else {
            mysqli_close($this->conn);
            return null;  
        }
    }

    public function cedulaExiste($cedula) {
        $sql = "SELECT * FROM tbestudiante WHERE tbEstudiantecedula = '$cedula'";
        $result = $this->conn->query($sql);
        $exists = $result->num_rows > 0;
        mysqli_close($this->conn);
        return $exists;
    }
    
    

}



?>