<?php 

$servername = "localhost";
$username = "root";
$password = "";
//
// Create connection
$conn = mysqli_connect($servername, $username, $password,"inspiron2k16");

// Check connection
if (!$conn) {
    echo json_encode(die("Connection failed: " . mysqli_connect_error())) ;
}

else 
	//echo json_encode("connection established ");
?>