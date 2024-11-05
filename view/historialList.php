<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/css/table.css">
    <title>Document</title>
</head>

<body>
    <div>
        <table>
            <thead>
                <th>ID</th>
                <th>Curso</th>
                <th>Siglas</th>
                <th>Grupo</th>
                <th>Ciclo</th>
                <th>Profesor</th>
                <th>Nota</th>
                <th>Activo</th>

            </thead>
            <tbody>
                <?php
                include_once '../business/matriculaBusiness.php';
                include_once '../domain/cursoDetalles.php';
                include_once '../business/estduianteBusiness.php';

                include_Once '../business/matriculaDetalleBusiness.php';
                include_once '../domain/detallesMatricula.php';


                $estudianteBusiness = new EstudianteBusiness();
                $cedulaEst = $_GET['cedulaEstudiante'];


                if ($estudianteBusiness->estudianteExistsByCedula($cedulaEst) != true) {
                    echo "<script>
                            alert('Este estudainte no existe');
                             window.location.href = '../view/matriculaView.php';
                         </script>";
                    exit();
                } else {

                    $idEstudiante = $estudianteBusiness->getEstudianteIdByCedula($cedulaEst);

                    $matricualBusiness = new matriculaBusiness();
                    $cursosDetalles = $matricualBusiness->getCursoByEstudiante($idEstudiante);

                    $matricualDetalleBusiness = new matriculaDetalleBusiness();
                    $matriculasDetalles = $matricualDetalleBusiness->getMatriculaDetalleByEstudent($idEstudiante);


                    if (empty($matriculasDetalles)) {
                        echo "No se encontraron cursos para el estudiante con ID $idEstudiante.<br>";
                    } else {
                        if (!empty($matriculasDetalles)) {
                            echo "Cursos del estudiante: " . $matriculasDetalles[0]->getNombreEstudiante() . " " . $matriculasDetalles[0]->getApellidoEstudiante() . "<br>";
                        }
                        foreach ($matriculasDetalles as $matriculas) {

                                echo "<tr>";
                                echo "<td>" . $matriculas->getId() . "</td>";
                                echo "<td>" . $matriculas->getNombreCurso() . "</td>";
                                echo "<td>" . $matriculas->getSiglasCurso() . "</td>";
                                echo "<td>" . $matriculas->getCursoGrupo() . "</td>";
                                echo "<td>" . $matriculas->getCicloNombre() . "</td>";
                                echo "<td>" . $matriculas->getNombreProfesor() . " " . $matriculas->getApellidoProfesor() . "</td>";
                                echo "<td>" . $matriculas->getNota() . "</td>";
                                echo "<td>" . ($matriculas->isActivo() ? "Sí" : "No") . "</td>";
                                echo "</tr>";


                        }
                    }
                }


                ?>

            </tbody>
        </table>


    </div>
    <a href="../view/historialView.php">Volver</a>


</body>

</html>