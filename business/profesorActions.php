<?php
include "profesorBusiness.php";

if (isset($_POST['create'])) {
    $profesorBusiness = new ProfesorBusiness();
   if ($profesorBusiness->profesorExistsByCedula($_POST['cedula'])) {
        echo "<script>
            alert('Esa cedula ya existe');
            window.location.href = '../view/profesorView.php';
          </script>";
        exit();
   } else {
    if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['tipoIdentificacion']) 
    && isset($_POST['cedula']) && isset($_POST['correo']) && isset($_POST['telefono']) 
    && isset($_POST['direccion']) && isset($_POST['iban'])) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipoIdentificacion = $_POST['tipoIdentificacion'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $iban = $_POST['iban'];


    if (strlen($nombre) > 0 && strlen($apellido) > 0 && strlen($tipoIdentificacion) > 0 
        && strlen($cedula) > 0 && strlen($correo) > 0 && strlen($telefono) > 0 
        && strlen($direccion) > 0 && strlen($iban) > 0) {


        $profesor = new Profesor(0, $nombre, $apellido, $direccion, $tipoIdentificacion, $cedula, $iban, $telefono, $correo, 1);

        $result = $profesorBusiness->insertProfesor($profesor);

        if ($result) {
            header("Location: ../view/profesorView.php?success=inserted");
        } else {
            header("Location: ../view/profesorView.php?error=dbError");
        }
    } else {
        header("Location: ../view/profesorView.php?error=emptyField");
    }
} else {
    header("Location: ../view/profesorView.php?error=missingFields");
}
   }
   
} elseif (isset($_POST['update'])) {
    if (isset($_POST['idProfesor']) && isset($_POST['nombre']) && isset($_POST['apellido']) 
        && isset($_POST['tipoIdentificacion']) && isset($_POST['cedula']) && isset($_POST['correo']) 
        && isset($_POST['telefono']) && isset($_POST['direccion']) && isset($_POST['iban'])) {

        $idProfesor = $_POST['idProfesor'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $tipoIdentificacion = $_POST['tipoIdentificacion'];
        $cedula = $_POST['cedula'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $iban = $_POST['iban'];


        if (strlen($idProfesor) > 0 && strlen($nombre) > 0 && strlen($apellido) > 0 
            && strlen($tipoIdentificacion) > 0 && strlen($cedula) > 0 && strlen($correo) > 0 
            && strlen($telefono) > 0 && strlen($direccion) > 0 && strlen($iban) > 0) {


            $profesor = new Profesor($idProfesor, $nombre, $apellido, $direccion, $tipoIdentificacion, $cedula, $iban, $telefono, $correo, 1);
            $profesorBusiness = new ProfesorBusiness();
            $result = $profesorBusiness->updateProfesor($profesor);

            if ($result) {
                header("Location: ../view/profesorView.php?success=updated");
            } else {
                header("Location: ../view/profesorView.php?error=dbError");
            }
        } else {
            header("Location: ../view/profesorView.php?error=emptyField");
        }
    } else {
        header("Location: ../view/profesorView.php?error=missingFields");
    }
} elseif (isset($_POST['delete'])) {
    $idProfesor = $_POST['idProfesor'];

    if (strlen($idProfesor) > 0) {
        $profesorBusiness = new ProfesorBusiness();
        $result = $profesorBusiness->logicalDelete($idProfesor); 

        if ($result) {
            header("Location: ../view/profesorView.php?success=deleted");
        } else {
            header("Location: ../view/profesorView.php?error=dbError");
        }
    } else {
        header("Location: ../view/profesorView.php?error=missingFields");
    }
}
?>
