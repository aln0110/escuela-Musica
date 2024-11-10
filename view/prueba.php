<?php

include_once '../business/matriculaBusiness.php';
include_once '../domain/cursoDetalles.php';

$idEstudiante = 1;  

$matricualBusiness = new matriculaBusiness();
$cursosDetalles = $matricualBusiness->getCursoByEstudiante($idEstudiante);

if (empty($cursosDetalles)) {
    echo "No se encontraron cursos para el estudiante con ID $idEstudiante.<br>";
} else {
    echo "Cursos del estudiante: <br><br>";
    foreach ($cursosDetalles as $curso) {
        echo "ID: " . $curso->getIdCurso() . "<br>";
        echo "Curso: " . $curso->getNombreCurso() . "<br>";
        echo "Siglas: " . $curso->getSiglasCurso() . "<br>";
        echo "Grupo: " . $curso->getCursoGrupo() . "<br>";
        echo "Ciclo: " . $curso->getCicloNombre() . "<br>";
        echo "Profesor: " . $curso->getNombreProfesor() . " " . $curso->getApellidoProfesor() . "<br>";
        echo "Estado Activo: " . ($curso->isActivo() ? "Sí" : "No") . "<br><br>";
    }
}

echo "<br><br><a href='../index.php'>Volver</a>";
?>
