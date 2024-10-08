<?php
include '../business/escuelaBusiness.php';

$escuelaBusiness = new EscuelaBusiness();

$resultados = $escuelaBusiness->sameName("John Doee");
echo $resultados;

?>