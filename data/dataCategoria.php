<?php
include_once 'data.php';
include '../domain/categoria.php';

class dataCategoria extends Data{

    public function insertCategoria($categoria){
        $sql = "INSERT INTO tbcategoria (tbcategorianombre, tbcategoriaestado) VALUES 
            ('" . $categoria->getNombre() . "', '" . $categoria->getEstado() . "')";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }


    public function getCategorias(){
        $sql = "SELECT * FROM tbcategoria";
        $result = $this->conn->query($sql);
        $categorias = [];

        while ($row = $result->fetch_assoc()) {
            $categoria = new Categoria($row['tbcategoriaid'], $row['tbcategorianombre'], $row['tbcategoriaestado']);
            array_push($categorias, $categoria);
        }

        mysqli_close($this->conn);
        return $categorias;
    }

    public function getCategoria($idCategoria){
        $sql = "SELECT * FROM tbcategoria WHERE tbcategoriaid = $idCategoria";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        while ($row = $result->fetch_assoc()) {
            $categoria = new Categoria($row['tbcategoriaid'], $row['tbcategorianombre'], $row['tbcategoriaestado']);
        }
        return $categoria;
    }


    public function updateCategoria($categoria){
        $sql = "UPDATE tbcategoria SET tbcategorianombre = '" . $categoria->getNombre() . "', tbcategoriaestado = '" . $categoria->getEstado() . "' 
            WHERE tbcategoriaid = " . $categoria->getId();
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }


    public function logicalDeleteCategoria($idCategoria){
        $sql = "UPDATE tbcategoria SET tbcategoriaestado = '0' WHERE tbcategoriaid = $idCategoria";
        $result = $this->conn->query($sql);
        mysqli_close($this->conn);
        return $result;
    }
}
?>
