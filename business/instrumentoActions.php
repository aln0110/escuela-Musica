<?php

include "instrumentoBusiness.php";


$instrumentoBusiness = new instrumentoBusiness();


if (isset($_POST['create'])) {
    
    if (isset($_POST['tipo']) && isset($_POST['instrumento']) && isset($_POST['codigo']) && isset($_POST['serie'])  && isset($_POST['marca'])) {
        
 
        $tipo = $_POST['tipo'];
        $instrumentoName = $_POST['instrumento'];
        $marca = $_POST['marca'];
        $codigo = $_POST['codigo'];
        $serie = $_POST['serie'];
        $uso = true;
        $activo = true;


        if (strlen($tipo) > 0 && strlen($instrumentoName) > 0 && strlen($codigo) > 0 && strlen($serie) > 0) {
            

            $instrumento = new instrumento(0, $tipo, $instrumentoName, $marca, $codigo, $serie, $uso, $activo);
            

            $result = $instrumentoBusiness->insertInstrumento($instrumento);

 
            if ($result) {
                header("location: ../view/instrumentoView.php?success=inserted");
            } else {
                header("location: ../view/instrumentoView.php?error=dbError");
            }
        } else {
            header("location: ../view/instrumentoView.php?error=emptyField");
        }

    } else {
        header("location: ../view/instrumentoView.php?error=missingFields");
    }

} else if (isset($_POST['delete'])) {
    
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $result = $instrumentoBusiness->logicalDelete($id);
        
 
        if ($result) {
            header("location: ../view/instrumentoView.php?success=deleted");
        } else {
            header("location: ../view/instrumentoView.php?error=dbError");
        }
    } else {
        header("location: ../view/instrumentoView.php?error=missingFields");
    }

} else if (isset($_POST['update'])) {
    
    if (isset($_POST['id']) && isset($_POST['tipo']) && isset($_POST['instrumento']) && isset($_POST['codigo']) && isset($_POST['serie']) ) {
        $id = $_POST['id'];
        $tipo = $_POST['tipo'];
        $instrumentoName = $_POST['instrumento'];
        $codigo = $_POST['codigo'];
        $serie = $_POST['serie'];
        $uso = $_POST['uso'] === '1' ? 1 : 0;
        $activo = $_POST['activo'] === '1' ? 1 : 0;

        if (strlen($id) > 0 && strlen($tipo) > 0 && strlen($instrumentoName) > 0 && strlen($codigo) > 0 && strlen($serie) > 0) {
            

            $instrumento = new instrumento($id, $tipo, $instrumentoName, $marca, $codigo, $serie, $uso, $activo);
            

            $result = $instrumentoBusiness->updateInstrumento($instrumento);

 
            if ($result) {
                header("location: ../view/instrumentoView.php?success=updated");
            } else {
                header("location: ../view/instrumentoView.php?error=dbError");
            }
        } else {
            header("location: ../view/instrumentoView.php?error=emptyField");
        }

    } else {
        header("location: ../view/instrumentoView.php?error=missingFields");
    }

} else {
    header("location: ../view/instrumentoView.php?error=error");
}

?>
