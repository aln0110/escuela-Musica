<?php
include "juntaBusiness.php";

if (isset($_POST['create'])) {
    if (isset($_POST['nombrejunta']) && isset($_POST['cedulajunta']) && isset($_POST['juntapuesto']) 
        && isset($_POST['fechaIniciojunta']) && isset($_POST['fechaFinjunta'])  && isset($_POST['correo'])&& isset($_POST['telefono']) && isset($_POST['tipoIdentificacion'])) {
        
        $nombrejunta = $_POST['nombrejunta'];
        $indentificacionjunta = $_POST['tipoIdentificacion'];
        $cedulajunta = $_POST['cedulajunta'];
        $juntapuesto = $_POST['juntapuesto'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $fechainiciojunta = $_POST['fechaIniciojunta'];
        $fechafinaljunta = $_POST['fechaFinjunta'];
        $juntaactivo = true;
        

        if (strlen($nombrejunta) > 0 && strlen($cedulajunta) > 0 && strlen($juntapuesto) > 0 
            && strlen($fechainiciojunta) > 0 && strlen($fechafinaljunta) > 0) {
            
            $junta = new Junta(0, $nombrejunta, $cedulajunta, $juntapuesto, $fechainiciojunta, $fechafinaljunta, $juntaactivo, $indentificacionjunta, $correo, $telefono);
            $juntaBusiness = new JuntaBusiness();
            $result = $juntaBusiness->insertJunta($junta);

            if ($result) {
                header("Location: ../view/juntaView.php?success=inserted");
            } else {
                header("Location: ../view/juntaView.php?error=dbError");
            }
        } else {
            header("Location: ../view/juntaView.php?error=emptyField");
        }
    } else {
        header("Location: ../view/juntaView.php?error=missingFields");
    }
}
 else if (isset($_POST['update'])) {
    if (isset($_POST['idjunta']) && isset($_POST['nombrejunta']) && isset($_POST['cedulajunta']) && isset($_POST['juntapuesto']) 
        && isset($_POST['fechainiciojunta']) && isset($_POST['fechafinaljunta']) && isset($_POST['juntaactivo']) && isset($_POST['correo'])&& isset($_POST['telefono']) && isset($_POST['tipoIdentificacion'])) {
        
        $idjunta = $_POST['idjunta'];
        $nombrejunta = $_POST['nombrejunta'];
        $indentificacionjunta = $_POST['tipoIdentificacion'];
        $cedulajunta = $_POST['cedulajunta'];
        $juntapuesto = $_POST['juntapuesto'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $fechainiciojunta = $_POST['fechainiciojunta'];
        $fechafinaljunta = $_POST['fechafinaljunta'];
        $juntaactivo = $_POST['juntaactivo'] === 'true' ? 1 : 0;

        if (strlen($idjunta) > 0 && strlen($nombrejunta) > 0 && strlen($cedulajunta) > 0 && strlen($juntapuesto) > 0 
            && strlen($fechainiciojunta) > 0 && strlen($fechafinaljunta) > 0) {
            
            $junta = new Junta($idjunta, $nombrejunta, $cedulajunta, $juntapuesto, $fechainiciojunta, $fechafinaljunta, $juntaactivo, $indentificacionjunta, $correo, $telefono);
            $juntaBusiness = new JuntaBusiness();
            $result = $juntaBusiness->updateJunta($junta);

            if ($result) {
                header("Location: ../view/juntaView.php?success=updated");
            } else {
                header("Location: ../view/juntaView.php?error=dbError");
            }
        } else {
            header("Location: ../view/juntaView.php?error=emptyField");
        }
    } else {
        header("Location: ../view/juntaView.php?error=missingFields");
    }
} else if (isset($_POST['delete'])) {
    $idjunta = $_POST['idjunta'];

    if (strlen($idjunta) > 0) {
        $juntaBusiness = new JuntaBusiness();
        $result = $juntaBusiness->logicalDelete($idjunta);

        if ($result) {
            header("Location: ../view/juntaView.php?success=deleted");
        } else {
            header("Location: ../view/juntaView.php?error=dbError");
        }
    } else {
        header("Location: ../view/juntaView.php?error=missingFields");
    }
}
?>