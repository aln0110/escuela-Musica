<?php
include "estduianteBusiness.php";

if (isset($_POST['create'])) {
    $estudianteBusiness = new EstudianteBusiness();
    if ($estudianteBusiness->estudianteExistsByCedula($_POST['cedula'])) {
        echo "<script>
            alert('Esa cedula ya existe');
            window.location.href = '../view/estudianteView.php';
          </script>";
        exit();
    } else {
        if (
            isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono'])
            && isset($_POST['correo']) && isset($_POST['direccion']) && isset($_POST['tipoIdentificacion'])
            && isset($_POST['cedula']) && isset($_POST['fechaNacimiento'])
        ) {

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $direccion = $_POST['direccion'];
            $tipoIdentificacion = $_POST['tipoIdentificacion'];
            $cedula = $_POST['cedula'];
            $fechaNacimiento = $_POST['fechaNacimiento'];

            if (
                strlen($nombre) > 0 && strlen($apellido) > 0 && strlen($telefono) > 0
                && strlen($correo) > 0 && strlen($direccion) > 0 && strlen($cedula) > 0
                && strlen($fechaNacimiento) > 0
            ) {

                $estudiante = new Estudiante(0, $nombre, $apellido, $telefono, $correo, $direccion, $tipoIdentificacion, $fechaNacimiento, $cedula, 1);

                $result = $estudianteBusiness->insertEstudiante($estudiante);

                if ($result) {
                    header("Location: ../view/estudianteView.php?success=inserted");
                } else {
                    header("Location: ../view/estudianteView.php?error=dbError");
                }
            } else {
                header("Location: ../view/estudianteView.php?error=emptyField");
            }
        } else {
            header("Location: ../view/estudianteView.php?error=missingFields");
        }
    }
} elseif (isset($_POST['update'])) {
    if (
        isset($_POST['idEstudiante']) && isset($_POST['nombre']) && isset($_POST['apellido'])
        && isset($_POST['telefono']) && isset($_POST['correo']) && isset($_POST['direccion'])
        && isset($_POST['tipoIdentificacion']) && isset($_POST['cedula']) && isset($_POST['fechaNacimiento'])
    ) {

        $idEstudiante = $_POST['idEstudiante'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        $tipoIdentificacion = $_POST['tipoIdentificacion'];
        $cedula = $_POST['cedula'];
        $fechaNacimiento = $_POST['fechaNacimiento'];

        if (
            strlen($idEstudiante) > 0 && strlen($nombre) > 0 && strlen($apellido) > 0
            && strlen($telefono) > 0 && strlen($correo) > 0 && strlen($direccion) > 0
            && strlen($cedula) > 0 && strlen($fechaNacimiento) > 0
        ) {

            $estudiante = new Estudiante($idEstudiante,  $nombre, $apellido, $telefono, $correo, $direccion, $tipoIdentificacion, $fechaNacimiento, $cedula, 1);
            $estudianteBusiness = new EstudianteBusiness();
            $result = $estudianteBusiness->updateEstudiante($estudiante);

            if ($result) {
                header("Location: ../view/estudianteView.php?success=updated");
            } else {
                header("Location: ../view/estudianteView.php?error=dbError");
            }
        } else {
            header("Location: ../view/estudianteView.php?error=emptyField");
        }
    } else {
        header("Location: ../view/estudianteView.php?error=missingFields");
    }
} elseif (isset($_POST['delete'])) {
    $idEstudiante = $_POST['idEstudiante'];

    if (strlen($idEstudiante) > 0) {
        $estudianteBusiness = new EstudianteBusiness();
        $result = $estudianteBusiness->logicalDelteEstudiante($idEstudiante);

        if ($result) {
            header("Location: ../view/estudianteView.php?success=deleted");
        } else {
            header("Location: ../view/estudianteView.php?error=dbError");
        }
    } else {
        header("Location: ../view/estudianteView.php?error=missingFields");
    }
}
