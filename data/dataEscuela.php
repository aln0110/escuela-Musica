<?php
include 'data.php';
include '../domain/escuelaMusica.php';

class  escuelaData extends Data
{

    public function insertEscuela($EscuelaMusica)
    {


        $sql = "INSERT INTO tbescuelamusica (tbescuelamusicanombre, tbescuelamusicacedulajuridica, tbescuelamusicacorreo, tbescuelamusicatelefono, tbescuelamusicaestado) VALUES
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
            $escuela = new EscuelaMusica($row["tbescuelamusicaid"], $row["tbescuelamusicanombre"], $row["tbescuelamusicacedulajuridica"], $row["tbescuelamusicacorreo"], $row["tbescuelamusicatelefono"], $row["tbescuelamusicaestado"]);
            array_push($escuelas, $escuela);
        }

        return $escuelas;
    }

    public function getEscuela($tbescuelamusicaid)
    {
        $sql = "SELECT * FROM tbescuelamusica WHERE tbescuelamusicaid = $tbescuelamusicaid";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        while ($row = $result->fetch_assoc()) {
            $escuela = new EscuelaMusica($row["tbescuelamusicaid"], $row["tbescuelamusicanombre"], $row["tbescuelamusicacedulajuridica"], $row["tbescuelamusicacorreo"], $row["tbescuelamusicatelefono"], $row["tbescuelamusicaestado"]);
        }
        return $escuela;
    }

    public function updateEscuela($escuelaMusica)
    {
        $sql = "UPDATE tbescuelamusica SET tbescuelamusicanombre = '" . $escuelaMusica->getNombre() . "', tbescuelamusicacedulajuridica = '" . $escuelaMusica->getCedulaJuridica() . "', tbescuelamusicacorreo = '" . $escuelaMusica->getCorreo() . "', tbescuelamusicatelefono = '" . $escuelaMusica->getTelefono() . "', tbescuelamusicaestado = '" . $escuelaMusica->getEstado() . "' WHERE tbescuelamusicaid = " . $escuelaMusica->getIdEscuelaMusica();
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function deleteEscuela($tbescuelamusicaid)
    {
        $sql = "DELETE FROM tbescuelamusica WHERE tbescuelamusicaid = $tbescuelamusicaid";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function  logicalDelte($tbescuelamusicaid){
        $sql = "UPDATE tbescuelamusica SET tbescuelamusicaestado = 'False' WHERE tbescuelamusicaid = $tbescuelamusicaid";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function sameCedula($cedula) {
        $sql = "SELECT * FROM tbescuelamusica WHERE tbescuelamusicacedulajuridica = '$cedula'";
        $result = $this->conn->query($sql);
        $exists = $result->num_rows > 0;
        mysqli_close($this->conn);
        return $exists;
    }

    public function sameName($name) {
        $sql = "SELECT * FROM tbescuelamusica WHERE tbescuelamusicanombre = '$name'";
        $result = $this->conn->query($sql);
        $exists = $result->num_rows > 0;
       // mysqli_close($this->conn);
        return $exists;
    }


}
