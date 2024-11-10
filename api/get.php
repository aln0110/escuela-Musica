<?php
include '../data/dataEscuela.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM tbescuelamusica WHERE id=$id"; 
$result = $conn->query($sql);
$data = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

$conn->close();

?>