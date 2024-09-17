<?php
include '../business/instrumentosBusiness.php';


if (isset($_POST['create'])) {
    if (isset($_POST['nombreInstrumento']) && isset($_POST['categoriaInstrumento']) ) {
        $nombre = $_POST['nombreInstrumento'];
        $categoria = $_POST['categoriaInstrumento'];
        $estado = 1;

        if (strlen($nombre) > 0 && strlen($categoria) > 0) {
            
            $instrumento = new instrumentos(0, $nombre, $categoria, $estado);
            $instrumentoBusiness = new instrumentosBusiness();
            $result = $instrumentoBusiness->insertInstrumento($instrumento);

            if ($result) {
                header("Location: ../view/instrumentosView.php?success=inserted");
            } else {
                header("Location: ../view/instrumentosView.php?error=dbError");
            }
        } else {
            header("Location: ../view/instrumentosView.php?error=emptyField");
        }
    } else {
        header("Location: ../view/instrumentosView.php?error=missingInfo");
    }
} else if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombreInstrumento'];
    $categoria = $_POST['categoriaInstrumento'];
    $estado = $_POST['estadoInstrumento'];

    if (isset($id) && isset($nombre) && isset($categoria) ) {
        if (strlen($nombre) > 0 && strlen($categoria) > 0) {
           
            $instrumento = new instrumentos($id, $nombre, $categoria, $estado);
            $instrumentoBusiness = new instrumentosBusiness();
            $result = $instrumentoBusiness->updateInstrumento($instrumento);

            if ($result) {
                header("Location: ../view/instrumentosView.php?success=updated");
            } else {
                header("Location: ../view/instrumentosView.php?error=dbError");
            }
        } else {
            header("Location: ../view/instrumentosView.php?error=emptyField");
        }
    } else {
        header("Location: ../view/instrumentosView.php?error=missingInfo");
    }
} else if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    if (isset($id)) {
        $instrumentoBusiness = new instrumentosBusiness();
        $result = $instrumentoBusiness->logicalDeleteInstrumento($id);

        if ($result) {
            header("Location: ../view/instrumentosView.php?success=deleted");
        } else {
            header("Location: ../view/instrumentosView.php?error=dbError");
        }
    } else {
        header("Location: ../view/instrumentosView.php?error=missingInfo");
    }
}
?>
