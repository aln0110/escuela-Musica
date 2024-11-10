<?php
include_once "matriculaBusiness.php";
include_once "estduianteBusiness.php";
include_once "profesorBusiness.php";
include_once "cursoBusiness.php";


if (isset($_POST['create'])) {
    $estudianteBusiness = new EstudianteBusiness();
    $profesorBusiness = new ProfesorBusiness();
    $cursoBusiness = new CursoBusiness();

    $cedulaEst = $_POST['cedulaEst'];
    
    $siglaCurso = $_POST['sigla'];

    $siglaCurso2 = $_POST['sigla2'];

    if ($_POST['sigla2']==true) {

        if (isset($_POST['cedulaEst'])  && isset($_POST['sigla2'])) {
    
            $idEstudiante = $estudianteBusiness->getEstudianteIdByCedula($cedulaEst);
          
            $idCurso = $cursoBusiness->getCursoIdBySigla($siglaCurso2);

            if ($idEstudiante  && $idCurso) {
                $fechaMatricula = date("Y-m-d");
                $matricula = new Matricula(0, $idEstudiante,  $idCurso, $fechaMatricula, 1);

                $matriculaBusiness = new MatriculaBusiness();
                $result = $matriculaBusiness->insertMatricula($matricula);

                if ($result) {
                    header("Location: ../view/matriculaView.php?success=inserted");
                } else {
                    header("Location: ../view/matriculaView.php?error=dbError");
                }
            } else {
                header("Location: ../view/matriculaView.php?error=invalidData");
            }
        } else {
            header("Location: ../view/matriculaView.php?error=missingFields");
        }
        
    } else {
        if ($estudianteBusiness->estudianteExistsByCedula($cedulaEst) != true) {

            echo "<script>
                alert('Este estudainte no existe');
                window.location.href = '../view/matriculaView.php';
              </script>";
            exit();
        } else {
    
            if ($cursoBusiness->cursoExistsBySigla($siglaCurso) != true) {
                echo "<script>
                alert('Este curso no existe');
                window.location.href = '../view/matriculaView.php';
                </script>";
                exit();
            } else {
                if (isset($_POST['cedulaEst'])  && isset($_POST['sigla'])) {
    
                    $idEstudiante = $estudianteBusiness->getEstudianteIdByCedula($cedulaEst);
                  
                    $idCurso = $cursoBusiness->getCursoIdBySigla($siglaCurso);
    
                    if ($idEstudiante  && $idCurso) {
                        $fechaMatricula = date("Y-m-d");
                        $matricula = new Matricula(0, $idEstudiante,  $idCurso, $fechaMatricula, 1);
    
                        $matriculaBusiness = new MatriculaBusiness();
                        $result = $matriculaBusiness->insertMatricula($matricula);
    
                        if ($result) {
                            header("Location: ../view/matriculaView.php?success=inserted");
                        } else {
                            header("Location: ../view/matriculaView.php?error=dbError");
                        }
                    } else {
                        header("Location: ../view/matriculaView.php?error=invalidData");
                    }
                } else {
                    header("Location: ../view/matriculaView.php?error=missingFields");
                }
            }
        }
    }
    


} elseif (isset($_POST['delete'])) {
    $matriculaBusiness = new MatriculaBusiness();
    $idMatricula = $_POST['idMatricula'];
    $result = $matriculaBusiness->logicalDelete($idMatricula);
    if ($result) {
        header("Location: ../view/matriculaView.php?success=deleted");
    } else {
        header("Location: ../view/matriculaView.php?error=dbError");
    }
}
