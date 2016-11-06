<?php

require_once 'config.php';



$sql="select * from Event "; 

$data = array();
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}
} else {
	echo json_encode ("0 results");
}
echo json_encode($data);



?>