<?php
include "../business/instrumentoBusiness.php"; 

$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
$instrumentoBusiness = new InstrumentoBusiness();
$instrumentos = $instrumentoBusiness->getInstrumentos();


$options = "";

foreach ($instrumentos as $instrumento) {

    if ($instrumento->getTipo() === $categoria) {
        $options .= "<option value='" . $instrumento->getInstrumento() . "'>" . $instrumento->getInstrumento() . "</option>";
    }
}

if ($options === "") {
    $options = "<option value=''>No hay instrumentos disponibles</option>";
}

echo $options; 
?>
