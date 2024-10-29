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
                <th>Activo</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php
                include_once '../business/matriculaBusiness.php';
                include_once '../domain/cursoDetalles.php';
                include_once '../business/estduianteBusiness.php';
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

                    if (empty($cursosDetalles)) {
                        echo "No se encontraron cursos para el estudiante con ID $idEstudiante.<br>";
                    } else {
                        echo "Cursos del estudiante: <br><br>";
                        foreach ($cursosDetalles as $curso) {
                            echo "<tr>";
                            echo "<td>" . $curso->getIdCurso() . "</td>";
                            echo "<td>" . $curso->getNombreCurso() . "</td>";
                            echo "<td>" . $curso->getSiglasCurso() . "</td>";
                            echo "<td>" . $curso->getCursoGrupo() . "</td>";
                            echo "<td>" . $curso->getCicloNombre() . "</td>";
                            echo "<td>" . $curso->getNombreProfesor() . " " . $curso->getApellidoProfesor() . "</td>";
                            echo "<td>" . ($curso->isActivo() ? "Sí" : "No") . "</td>";
                            echo "<td>";
                            echo "<form method='post' action='../business/matriculaActions.php' style='display:inline;'> ";
                            echo "<input type='hidden' name='idMatricula' value='" . $curso->getIdCurso() . "'>";
                            echo "<input type='submit' value='Eliminar' name='delete'>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                }


                ?>

            </tbody>
        </table>


    </div>
    <a href="../view/matriculaView.php">Volver</a>


</body>

</html>