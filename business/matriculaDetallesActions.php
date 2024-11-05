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
                header("Location: /index.php?success=updated");
                exit(); 
            } else {
                header("Location: /index.php?error=dbError");
                exit(); 
            }
        } else {

            header("Location: /index.php?error=emptyField");
            exit();
        }
    } else {

        header("Location: /index.php?error=missingFields");
        exit();
    }
}  elseif(isset($_POST['delete'])) {
    if (isset($_POST['id'])) {
        $idMatricula = $_POST['id'];

        if (strlen($idMatricula) > 0) {
            $matriculaDetalleBusiness = new matriculaDetalleBusiness();
            $result = $matriculaDetalleBusiness->logicalDelete($idMatricula);

            if ($result) {
                header("Location: /index.php?success=deleted");
                exit(); 
            } else {
                header("Location: /index.php?error=dbError");
                exit(); 
            }
        } else {

            header("Location: /index.php?error=emptyField");
            exit();
        }
    } else {

        header("Location: /index.php?error=missingFields");
        exit();
    }
} else {
    header("Location: /index.php");
    exit();


}
?>
