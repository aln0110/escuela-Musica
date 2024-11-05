<?php
include_once "matriculaDetalleBusiness.php";

if (isset($_POST['save'])) {

    if (isset($_POST['id']) && isset($_POST['nota'])) {
        $idMatricula = $_POST['id'];
        $nota = $_POST['nota'];


        if (strlen($idMatricula) > 0 && strlen($nota) > 0) {
            $matriculaDetalleBusiness = new matriculaDetalleBusiness();
            $result = $matriculaDetalleBusiness->updateNota($idMatricula, $nota);

            if ($result) {
                header("Location: ../view/notaEdit.php?success=updated");
                exit(); 
            } else {
                header("Location: ../view/notaEdit.php?error=dbError");
                exit(); 
            }
        } else {

            header("Location: ../view/notaEdit.php?error=emptyField");
            exit();
        }
    } else {

        header("Location: ../view/notaEdit.php?error=missingFields");
        exit();
    }
}  else {


}
?>
