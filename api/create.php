<?php

include '../data/data.php'; 
include '../domain/escuelaMusica.php';
$data = json_decode(file_get_contents("php://input"), true);

//$escuelaMusica = new EscuelaMusica();
$Data = new Data();
 

$nombre = $data['nombre'];
$cedulaJurdica = $data['cedulaJurdica'];
$correo = $data['correo'];
$telefono = $data['telefono'];
$propietario = $data['propietario'];
$estado = $data['estado'];

/*
$escuelaMusica->setNombre($data['nombre']);
$escuelaMusica->setCedulaJuridica($data['cedulaJurdica']);
$escuelaMusica->setCorreo($data['correo']);
$escuelaMusica->setTelefono($data['telefono']);
$escuelaMusica->setPropietario($data['propietario']);
$escuelaMusica->setEstado($data['estado']);

$nombre = $escuelaMusica->getNombre();
$cedulaJurdica = $escuelaMusica->getCedulaJuridica();
$correo = $escuelaMusica->getCorreo();
$telefono = $escuelaMusica->getTelefono();
$propietario = $escuelaMusica->getPropietario();
$estado = $escuelaMusica->getEstado();


*/



$sql = "INSERT INTO tbescuelamusica (nombre, cedulajuridica, correo, telefono, propietario, estado) VALUES ('$nombre', '$cedulaJurdica', '$correo', '$telefono', '$propietario', $estado)";

   
if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Record created successfully"]); 
} else {
    echo json_encode(["message" => "Error: " . $sql . "<br>" . $conn->error]); 
}


$conn->close();

?>