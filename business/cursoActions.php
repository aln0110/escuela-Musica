<?php
include "cursoBusiness.php";
include_once "profesorBusiness.php";

if (isset($_POST['create'])) {
    $profesorBusiness = new ProfesorBusiness();
    $profesor = $_POST['profesor'];

    if($profesorBusiness->profesorExistsByCedula($profesor)!=true){
        echo "<script>
            alert('Este profesor no existe');
            window.location.href = '../view/cursoView.php';
          </script>";
        exit();
    }else{
        if (isset($_POST['nombre']) && isset($_POST['siglas']) && isset($_POST['requisito']) && 
        isset($_POST['corequisito']) && isset($_POST['creditos']) && isset($_POST['horaInicio']) &&isset($_POST['horaFin'])   &&isset($_POST['profesor'])  &&isset($_POST['ciclo']) &&isset($_POST['grupo'])) {

        $nombre = $_POST['nombre'];
        $siglas = $_POST['siglas'];
        $requisito = $_POST['requisito'];
        $corequisito = $_POST['corequisito'];
        $creditos = $_POST['creditos'];
        $horaInicio = $_POST['horaInicio'];
        $horaFin = $_POST['horaFin'];
        $ciclo = $_POST['ciclo'];
        $grupo = $_POST['grupo'];


        $idProfesor = $profesorBusiness->getProfesorIdByCedula($profesor);

        

        if (strlen($nombre) > 0 && strlen($siglas) > 0 && strlen($requisito) > 0 
            && strlen($corequisito) > 0 && strlen($creditos) > 0) {


            $curso = new Curso(0, $nombre, $siglas, $requisito, $corequisito, $creditos,  $horaInicio, $horaFin, $grupo, $ciclo, $idProfesor,1);
            $cursoBusiness = new CursoBusiness();
            $result = $cursoBusiness->insertCurso($curso);

            if ($result) {
                header("Location: ../view/cursoView.php?success=inserted");
            } else {
                header("Location: ../view/cursoView.php?error=dbError");
            }
        } else {
            header("Location: ../view/cursoView.php?error=emptyField");
        }
    } else {
        header("Location: ../view/cursoView.php?error=missingFields");
    }
    }

} elseif (isset($_POST['update'])) {
    if (isset($_POST['idCurso']) && isset($_POST['nombre']) && isset($_POST['siglas']) && 
        isset($_POST['requisito']) && isset($_POST['corequisito']) && isset($_POST['creditos'])&& isset($_POST['horaInicio']) &&isset($_POST['horaFin'])) {

        $idCurso = $_POST['idCurso'];
        $nombre = $_POST['nombre'];
        $siglas = $_POST['siglas'];
        $requisito = $_POST['requisito'];
        $corequisito = $_POST['corequisito'];
        $creditos = $_POST['creditos'];
        $horaInicio = $_POST['horaInicio'];
        $horaFin = $_POST['horaFin'];


        if (strlen($idCurso) > 0 && strlen($nombre) > 0 && strlen($siglas) > 0 && 
            strlen($requisito) > 0 && strlen($corequisito) > 0 && strlen($creditos) > 0) {

            $curso = new Curso($idCurso, $nombre, $siglas, $requisito, $corequisito, $creditos, $horaInicio, $horaFin, 1);
            $cursoBusiness = new CursoBusiness();
            $result = $cursoBusiness->updateCurso($curso);

            if ($result) {
                header("Location: ../view/cursoView.php?success=updated");
            } else {
                header("Location: ../view/cursoView.php?error=dbError");
            }
        } else {
            header("Location: ../view/cursoView.php?error=emptyField");
        }
    } else {
        header("Location: ../view/cursoView.php?error=missingFields");
    }
} elseif (isset($_POST['delete'])) {
    $idCurso = $_POST['idCurso'];

    if (strlen($idCurso) > 0) {
        $cursoBusiness = new CursoBusiness();
        $result = $cursoBusiness->logicalDelete($idCurso); 

        if ($result) {
            header("Location: ../view/cursoView.php?success=deleted");
        } else {
            header("Location: ../view/cursoView.php?error=dbError");
        }
    } else {
        header("Location: ../view/cursoView.php?error=missingFields");
    }
}
?>
