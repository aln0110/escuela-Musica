<?php 
include '../data/dataEscuela.php';

$sql = "SELECT * FROM tbescuelamusica";
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