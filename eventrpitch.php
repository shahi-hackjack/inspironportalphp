<?php

require_once "config.php";



    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
     $EventName = mysqli_real_escape_string($conn,$request->EventName);
     $TeamSize=mysqli_real_escape_string($conn,$request->TeamSize);
     $EventDescription=mysqli_real_escape_string($conn,$request->EventDescription);
         $EventOrganiser1=mysqli_real_escape_string($conn,$request->EventOrganiser1);
          $EventContact1=mysqli_real_escape_string($conn,$request->EventContact1);
           $EventOrganiser2=mysqli_real_escape_string($conn,$request->EventOrganiser2);
          $EventContact2=mysqli_real_escape_string($conn,$request->EventContact2);
         $EventOrganiser3=mysqli_real_escape_string($conn,$request->EventOrganiser3);
          $EventContact3=mysqli_real_escape_string($conn,$request->EventContact3);
          $eid=mysqli_real_escape_string($conn,$request->eid);

   





$sql = "UPDATE Event SET EventName='$EventName',TeamSize='$TeamSize',EventDescription='$EventDescription',EventOrganiser1='$EventOrganiser1',EventContact1='$EventContact1',EventOrganiser2='$EventOrganiser2',EventContact2='$EventContact2',EventOrganiser3='$EventOrganiser3',EventContact3='$EventContact3' WHERE Email='$eid'"; 

if($conn->query($sql)===TRUE)
{
	echo json_encode("TABLE updated successfully");
}
else{
	header("HTTP/1.0 404 Not Found");
	exit;
	//echo json_encode("Error IN insertion" . $conn->error) ;
}







?>