<?php
$servername = "localhost";
$username = "root";
$password = "";



// Check connection

//Create database

$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {echo "Connected successfully";
}



$sql = "CREATE DATABASE inspiron2k16 ";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn = mysqli_connect($servername, $username, $password,"inspiron2k16");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {echo "Connected successfully";
}


$sql="CREATE TABLE userko (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Name VARCHAR(30) NOT NULL,
Email VARCHAR(30) NOT NULL,
Phoneno VARCHAR(12) NOT NULL,
Password VARCHAR(20)

)";

if($conn->query($sql)=== TRUE)
{
echo "TABLE CREATED successfully";

}
else{
	echo "Error creating table: " . $conn->error;
}

$sql="CREATE TABLE Event(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Email VARCHAR(30) NOT NULL,
EventName VARCHAR(20),
TeamSize VARCHAR(12) NOT NULL,
EventDescription VARCHAR(200),
EventOrganiser1 VARCHAR(20),
EventContact1 VARCHAR(12) NOT NULL,
EventOrganiser2 VARCHAR(20),
EventContact2 VARCHAR(12) NOT NULL,
EventOrganiser3 VARCHAR(20),
EventContact3 VARCHAR(12) NOT NULL,
EntryFee VARCHAR(12) NOT NULL,
Venue VARCHAR(10),
EventDay VARCHAR(12) NOT NULL,
EventTime VARCHAR(10)
)";

if($conn->query($sql)=== TRUE)
{
echo "TABLE CREATED successfully";

}
else{
	echo "Error creating table: " . $conn->error;
}

/*
$sql="ALTER TABLE userm
DROP PRIMARY KEY";

if($conn->query($sql)=== TRUE)
{
echo "TABLE ALTERED successfully";

}
else{
	echo "Error IN ALTERATION " . $conn->error;
}

$sql="ALTER TABLE userm
ADD PRIMARY KEY (Id,Email)";
if($conn->query($sql)=== TRUE)
{
echo "TABLE ALTERED successfully";

}
else{
	echo "Error IN ALTERATION " . $conn->error;
}


*/






?>
