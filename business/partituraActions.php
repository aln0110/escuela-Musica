<?php
include  'partituraBusiness.php';

if(isset($_POST['create'])){
    
    if (isset($_POST['nombre']) && isset($_POST['instrumento']) && isset($_FILES['pdf']) && isset($_POST['estado'])) {

        $nombre = $_POST['nombre'];
        $instrumento = $_POST['instrumento'];
        $pdf = $_FILES['pdf'];
        $estado = $_POST['estado'] === 'true' ? 1 : 0;


        echo "Nombre: " . $nombre . PHP_EOL;
        echo "Instrumento: " . $instrumento . PHP_EOL;
        echo "PDF: " . print_r($pdf, true) . PHP_EOL;
        echo "Estado: " . $estado . PHP_EOL;
        

        
     /*
        if ($pdf['error'] === UPLOAD_ERR_OK) {
            $pdfName = $pdf['name'];
        } else {
            header("location: ../view/partituraView.php?error=fileUploadError");
            exit;
        }
        */
        
        if (strlen($nombre) > 0 && strlen($instrumento) > 0 && strlen($nombre) > 0 && strlen($estado) > 0) {
             
            $partitura = new Partitura(0, $nombre, $instrumento, $pdf, $estado);
            $partituraBusiness = new PartituraBusiness();
            $result = $partituraBusiness->insertPartitura($partitura);

            if ($result) {
                header("location: ../view/partituraView.php?success=inserted");
            } else {
                header("location: ../view/partituraView.php?error=dbError");
            }
        } else {
            header("location: ../view/partituraView.php?error=emptyField");
        }


    } else {

        header("location: ../view/partituraView.php?error=missingFields");
    }
    
}



?>