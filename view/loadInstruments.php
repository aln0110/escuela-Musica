<?php
include "../business/instrumentosBusiness.php";

$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
$instrumentosBusiness = new instrumentosBusiness();
$estado =1; 
$instrumentos = $instrumentosBusiness->getInstrumentosByEstado(1);


$options = "";

foreach ($instrumentos as $instrumento) {


   
        if ($instrumento->getCategoria() === $categoria) {
            $options .= "<option value='" . $instrumento->getNombre() . "'>" . $instrumento->getNombre() . "</option>";
        }
    
}

if ($options === "") {
    $options = "<option value=''>No hay instrumentos disponibles</option>";
}

echo $options;
