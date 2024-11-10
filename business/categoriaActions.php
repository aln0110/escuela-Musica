<?php
include "categoriaBusiness.php";

if (isset($_POST['create'])) {
    $categoriaBusiness = new categoriaBusiness();
    if ($categoriaBusiness->categoriaExist($_POST['nombre'])) {
        echo "<script>
    alert('Esta categoria ya existe');
    window.location.href = '../view/categoriaView.php';
  </script>";
        exit();
    } else {
        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $estado = 1;

            if (strlen($nombre) > 0) {
                $categoria = new Categoria(0, $nombre, $estado);

                $result = $categoriaBusiness->insertCategoria($categoria);

                if ($result) {
                    header("location: ../view/categoriaView.php?success=inserted");
                } else {
                    header("location: ../view/categoriaView.php?error=dbError");
                }
            } else {
                header("location: ../view/categoriaView.php?error=emptyField");
            }
        } else {
            header("location: ../view/categoriaView.php?error=missingInfo");
        }
    }
} else if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $estado = $_POST['estado'];

    if (isset($id) && isset($nombre) && isset($estado)) {
        if (strlen($nombre) > 0) {

            $categoria = new Categoria($id, $nombre, $estado);
            $categoriaBusiness = new categoriaBusiness();
            $result = $categoriaBusiness->updateCategoria($categoria);

            if ($result) {
                header("location: ../view/categoriaView.php?success=updated");
            } else {
                header("location: ../view/categoriaView.php?error=dbError");
            }
        } else {
            header("location: ../view/categoriaView.php?error=emptyField");
        }
    } else {
        header("location: ../view/categoriaView.php?error=missingInfo");
    }
} else if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    if (isset($id)) {

        $categoriaBusiness = new categoriaBusiness();
        $result = $categoriaBusiness->logicalDeleteCategoria($id);

        if ($result) {
            header("location: ../view/categoriaView.php?success=deleted");
        } else {
            header("location: ../view/categoriaView.php?error=dbError");
        }
    } else {
        header("location: ../view/categoriaView.php?error=missingInfo");
    }
}
