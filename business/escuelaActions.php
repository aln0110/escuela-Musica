<?php
include 'escuelaBusiness.php';

if (isset($_POST['create'])) {
    $escuelaBusiness = new EscuelaBusiness();
    if($escuelaBusiness->sameName($_POST['nombre'])==1){

        echo "<script>
            alert('Este nombre ya existe');
            window.location.href = '../view/escuelaView.php';
          </script>";
    exit();
        
    
    }else{
        if (isset($_POST['nombre']) && isset($_POST['cedulaJuridica']) && isset($_POST['correo']) && isset($_POST['telefono']) ) {
        
            $nombre = $_POST['nombre'];
            $cedulaJuridica = $_POST['cedulaJuridica'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $estado = true;
    
            if (strlen($nombre) > 0 && strlen($cedulaJuridica) > 0 && strlen($correo) > 0 
                && strlen($telefono) > 0 && strlen($estado) > 0) {
                
                $escuelaMusica = new EscuelaMusica(0, $nombre, $cedulaJuridica, $correo, $telefono, $estado);
               
                $result = $escuelaBusiness->insertEscuela($escuelaMusica);
    
                if ($result) {
                    header("Location: ../view/escuelaView.php?success=inserted");
                } else {
                    header("Location: ../view/escuelaView.php?error=dbError");
                }
            } else {
                header("Location: ../view/escuelaView.php?error=emptyField");
            }
        } else {
            header("Location: ../view/escuelaView.php?error=missingFields");
        }

    }
} else if (isset($_POST['update'])) {

    if (isset($_POST['idEscuelaMusica']) && isset($_POST['nombre']) && isset($_POST['cedulaJuridica']) && isset($_POST['correo']) 
        && isset($_POST['telefono']) ) {
        
        $idEscuelaMusica = $_POST['idEscuelaMusica'];
        $nombre = $_POST['nombre'];
        $cedulaJuridica = $_POST['cedulaJuridica'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $estado = $_POST['estado'];

        if (strlen($idEscuelaMusica) > 0 && strlen($nombre) > 0 && strlen($cedulaJuridica) > 0 && strlen($correo) > 0 
            && strlen($telefono) > 0 && strlen($estado) > 0) {
            
            $escuelaMusica = new EscuelaMusica($idEscuelaMusica, $nombre, $cedulaJuridica, $correo, $telefono, $estado);
            $escuelaBusiness = new EscuelaBusiness();
            $result = $escuelaBusiness->updateEscuela($escuelaMusica);

            if ($result) {
                header("Location: ../view/escuelaView.php?success=updated");
            } else {
                header("Location: ../view/escuelaView.php?error=dbError");
            }
        } else {
            header("Location: ../view/escuelaView.php?error=emptyField");
        }
    } else {
        header("Location: ../view/escuelaView.php?error=missingFields");
    }
} else if (isset($_POST['delete'])) {

    if (isset($_POST['idEscuelaMusica'])) {
        $idEscuelaMusica = $_POST['idEscuelaMusica'];

        if (strlen($idEscuelaMusica) > 0) {
            $escuelaBusiness = new EscuelaBusiness();
            $result = $escuelaBusiness->logicalDelete($idEscuelaMusica);

            if ($result) {
                header("Location: ../view/escuelaView.php?success=deleted");
                exit();
            } else {
                header("Location: ../view/escuelaView.php?error=dbError");
                exit();
            }
        } else {
            header("Location: ../view/escuelaView.php?error=emptyField");
            exit();
        }
    } else {
        header("Location: ../view/escuelaView.php?error=missingFields");
        exit();
    }
}
?>
