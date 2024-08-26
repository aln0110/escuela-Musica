<?php

include "cicloBusiness.php";

if(isset($_POST['create'])){
    
    if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['tipo']) && isset($_POST['fechaInicio']) && isset($_POST['fechaFin']) && isset($_POST['estado'])) {

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $tipo = $_POST['tipo'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
        $estado = $_POST['estado'] === 'true' ? 1 : 0;

        
        if (strlen($nombre) > 0 && strlen($fechaInicio) > 0 && strlen($fechaFin) > 0 && strlen($estado) > 0 && strlen($descripcion) > 0 && strlen($tipo) > 0) {
             
            $ciclo = new Ciclo(0, $nombre, $descripcion, $tipo, $fechaInicio, $fechaFin, $fechaFin, $estado);
            $cicloBusiness = new CicloBusiness();
            $result = $cicloBusiness->insertCiclo($ciclo);

            if ($result) {
                header("location: ../view/cicloView.php?success=inserted");
            } else {
                header("location: ../view/cicloView.php?error=dbError");
            }
        } else {
            header("location: ../view/cicloView.php?error=emptyField");
        }

    } else {

        header("location: ../view/cicloView.php?error=missingFields");
    }
}

?>