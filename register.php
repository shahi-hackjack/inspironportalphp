<?php 

require_once 'config.php';

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
     $Name = mysqli_real_escape_string($conn,$request->Name);
     $Email=mysqli_real_escape_string($conn,$request->Email);
     $Phoneno=mysqli_real_escape_string($conn,$request->Phoneno);;
     $Password=mysqli_real_escape_string($conn,$request->Password);



    $sql = "INSERT INTO userko(Name,Email,Phoneno,Password)
VALUES ('$Name','$Email','$Phoneno','$Password')";


if($conn->query($sql)===TRUE)
{
	echo json_encode("TABLE inserted data successfully");
}
else{
	header("HTTP/1.0 404 Not Found");
	exit;
	//echo json_encode("Error IN insertion" . $conn->error) ;
}

   $sql = "INSERT INTO Event(Email)
VALUES ('$Email')";


if($conn->query($sql)===TRUE)
{
	echo json_encode("TABLE inserted in eventtable data successfully");
}
else{
	header("HTTP/1.0 404 Not Found");
	exit;
	//echo json_encode("Error IN insertion" . $conn->error) ;
}

    




/*
$foo="phpscriptwww";

echo json_encode($foo);
*/



?>