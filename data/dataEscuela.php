<?php
include 'data.php';
include '../domain/escuelaMusica.php';

class  escuelaData extends Data
{

    public function insertEscuela($EscuelaMusica)
    {


        $sql = "INSERT INTO tbescuelamusica (nombreescuelamusica, cedulajuridicaescuelamusica, correoescuelamusica, telefonoescuelamusica, estadoescuelamusica) VALUES
       ('" . $EscuelaMusica->getNombre() . "', '" . $EscuelaMusica->getCedulaJuridica() . "', '" . $EscuelaMusica->getCorreo() . "', '" . $EscuelaMusica->getTelefono() . "', '" . $EscuelaMusica->getEstado() . "')";

        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function getEscuelas()
    {
        $sql = "SELECT * FROM tbescuelamusica";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        $escuelas = [];
        while ($row = $result->fetch_assoc()) {
            $escuela = new EscuelaMusica($row["idescuelamusica"], $row["nombreescuelamusica"], $row["cedulajuridicaescuelamusica"], $row["correoescuelamusica"], $row["telefonoescuelamusica"], $row["estadoescuelamusica"]);
            array_push($escuelas, $escuela);
        }

        return $escuelas;
    }

    public function getEscuela($idEscuelaMusica)
    {
        $sql = "SELECT * FROM tbescuelamusica WHERE idescuelamusica = $idEscuelaMusica";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        while ($row = $result->fetch_assoc()) {
            $escuela = new EscuelaMusica($row["idescuelamusica"], $row["nombreescuelamusica"], $row["cedulajuridicaescuelamusica"], $row["correoescuelamusica"], $row["telefonoescuelamusica"], $row["estadoescuelamusica"]);
        }
        return $escuela;
    }

    public function updateEscuela($escuelaMusica)
    {
        $sql = "UPDATE tbescuelamusica SET nombreescuelamusica = '" . $escuelaMusica->getNombre() . "', cedulajuridicaescuelamusica = '" . $escuelaMusica->getCedulaJuridica() . "', correoescuelamusica = '" . $escuelaMusica->getCorreo() . "', telefonoescuelamusica = '" . $escuelaMusica->getTelefono() . "', estadoescuelamusica = '" . $escuelaMusica->getEstado() . "' WHERE idescuelamusica = " . $escuelaMusica->getIdEscuelaMusica();
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function deleteEscuela($idEscuelaMusica)
    {
        $sql = "DELETE FROM tbescuelamusica WHERE idescuelamusica = $idEscuelaMusica";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function  logicalDelte($idEscuelaMusica){
        $sql = "UPDATE tbescuelamusica SET estadoescuelamusica = 'False' WHERE idescuelamusica = $idEscuelaMusica";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }


}
