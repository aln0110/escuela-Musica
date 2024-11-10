<?php
include '../data/dataEscuela.php';
$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$nombre = $data['nombre'];
$cedulaJurdica = $data['cedulaJurdica'];
$correo = $data['correo'];
$telefono = $data['telefono'];
$propietario = $data['propietario'];
$estado = $data['estado'];

$sql = "UPDATE tbescuelamusica SET nombre = '$nombre', cedulajuridica = '$cedulaJurdica', correo = '$correo', telefono = '$telefono', propietario = '$propietario', estado = $estado WHERE id = $id";


if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Record created successfully"]);
} else {
    echo json_encode(["message" => "Error: " . $sql . "<br>" . $conn->error]);
}


$conn->close();
