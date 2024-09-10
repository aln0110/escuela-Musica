<?php
include  'partituraBusiness.php';

if(isset($_POST['create'])){
    
    if (isset($_POST['nombre']) && isset($_POST['instrumento']) && isset($_FILES['pdf']) && isset($_POST['estado'])) {

        $nombre = $_POST['nombre'];
        $instrumento = $_POST['instrumento'];
        $pdf = $_FILES['pdf'];
        $estado = $_POST['estado'] === 'true' ? 1 : 0;


        
        if (strlen($nombre) > 0 && strlen($instrumento) > 0 && strlen($nombre) > 0 && strlen($estado) > 0) {
             
            $partitura = new Partitura(0, $nombre, $instrumento, $pdf, $estado);
            $partituraBusiness = new PartituraBusiness();
            $result = $partituraBusiness->insertPartitura($partitura);

            if ($result) {
                header("location: ../view/partiruaView.php?success=inserted");
            } else {
                header("location: ../view/partiruaView.php?error=dbError");
            }
        } else {
            header("location: ../view/partiruaView.php?error=emptyField");
        }


    } else {

        header("location: ../view/partiruaView.php?error=missingFields");
    }
    
}else if(isset($_POST['update'])) {

    // Check if all required POST fields are set
    if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['instrumento']) && isset($_POST['estado'])) {

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $instrumento = $_POST['instrumento'];
        $estado = $_POST['estado'] === 'true' ? 1 : 0;


        $pdfContent = null;

        $partituraBusiness = new PartituraBusiness();

        $partitura = $partituraBusiness->getPartitura($id);

        if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
            $pdfFile = $_FILES['pdf'];
            $pdfContent = file_get_contents($pdfFile['tmp_name']);
        } else {

            $pdfContent = $partitura->getPdfPartitura();
        }

        if (strlen($id) > 0 && strlen($nombre) > 0 && strlen($instrumento) > 0 && strlen($estado) > 0) {

            $partitura = new Partitura($id, $nombre, $instrumento, $pdfContent, $estado);
            $result = $partituraBusiness->updatePartitura($partitura);

            if ($result) {
                header("location: ../view/partiruaView.php?success=updated");
            } else {
                header("location: ../view/partiruaView.php?error=dbError");
            }
        } else {
            header("location: ../view/partiruaView.php?error=emptyField");
        }

    } else {
        header("location: ../view/partiruaView.php?error=missingFields");
    }
}
 else if (isset($_POST['delete'])){
    $idPartitura = $_POST['id'];
    if (strlen($idPartitura) > 0) {

        $partituraBusiness = new PartituraBusiness();
        $result = $partituraBusiness->logicalDelete($idPartitura);

        if ($result) {
            header("location: ../view/partiruaView.php?success=deleted");
        } else {
            header("location: ../view/partiruaView.php?error=dbError");
        }
    } else {
        header("location: ../view/partiruaView.php?error=missingFields");
    }   
}   else if (isset($_POST['download'])) {
    $idPartitura = $_GET['id'];
    $partituraBusiness = new PartituraBusiness();
    $partitura = $partituraBusiness->getPartitura($idPartitura);

    if ($partitura) {
        $pdfContent = $partitura->getPdfPartitura(); 
        $fileName = $partitura->getNombrePartitura() . '.pdf'; 


        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Content-Length: ' . strlen($pdfContent));

        echo $pdfContent;
        exit;
    } else {
        echo "Partitura not found.";
    }
}



?>