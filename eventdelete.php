<?php


require_once 'config.php';

 $data = json_decode(file_get_contents("php://input"));
$eid = $data->dt;

$sql = "DELETE FROM Event WHERE Email='$eid'";

if ($conn->query($sql) === TRUE) {
    echo json_encode("Record deleted successfully");
} else {
    echo json_encode("Error deleting record: " . $conn->error);
}

$sql = "DELETE FROM userko WHERE Email='$eid'";
if ($conn->query($sql) === TRUE) {
    echo json_encode("Record deleted successfully");
} else {
    echo json_encode("Error deleting record: " . $conn->error);
}
















?>