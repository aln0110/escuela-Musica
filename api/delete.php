<?php
include '../data/dataEscuela.php';


$id = isset($_GET['id']) ? intval($_GET['id']) : 0;


if ($id > 0) {
    $sql = "DELETE FROM tbescuelamusica WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Record deleted successfully"]);
    } else {
        echo json_encode(["message" => "Error: " . $conn->error]);
    }
} else {
    echo json_encode(["message" => "Error: Invalid ID provided"]);
}

$conn->close();
?>
