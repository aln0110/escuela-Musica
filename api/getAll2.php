<?php
include '../data/dataEscuela.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT");
header("Access-Control-Allow-Headers: Content-Type, Authorization");



if (!$conn) {
    http_response_code(500); 
    echo json_encode(['error' => 'Failed to connect to the database.']);
    exit;
}


$sql = "SELECT * FROM tbescuelamusica";
$result = $conn->query($sql);

$data = [];

if ($result) {
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    header('Content-Type: application/json');

    echo json_encode($data);
} else {

    http_response_code(500); 
    echo json_encode(['error' => 'Failed to execute query.']);
}

$conn->close();
?>