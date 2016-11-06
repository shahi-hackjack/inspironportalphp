<?php

require_once 'config.php';


 $data = json_decode(file_get_contents("php://input"));
$eid = $data->dt;
error_reporting(E_ALL);
  ini_set('display_errors', '1');
$sql="select * from Event WHERE Email='$eid'"; 


$result=mysqli_query($conn,$sql);

if (!$result) {
    die(mysqli_error($conn));
}
$data = array();
//var_dump($result);
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}
} else {
	echo json_encode ("0 results".$eid);
}
echo json_encode($data);









?>