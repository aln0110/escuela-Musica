<?php
// verPartitura.php
include '../business/partituraBusiness.php';

if (isset($_GET['id'])) {
    $idPartitura = $_GET['id'];
    $partituraBusiness = new PartituraBusiness();
    $partitura = $partituraBusiness->getPartitura($idPartitura);

    if ($partitura) {
        $pdfContent = $partitura->getPdfPartitura(); 
        $fileName = $partitura->getNombrePartitura() . '.pdf'; 


        if ($pdfContent) {

            ob_end_clean();

  
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . $fileName . '"');
            header('Content-Length: ' . strlen($pdfContent));


            echo $pdfContent;
        } else {
            echo "Error: PDF content is empty.";
        }
        exit;
    } else {
        echo "Partitura no encontrada.";
    }
} else {
    echo "ID de partitura no proporcionado.";
}
?>