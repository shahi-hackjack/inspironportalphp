<?php

require_once 'config.php';
$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    
     $Email=mysqli_real_escape_string($conn,$request->Email);
    
     $Password=mysqli_real_escape_string($conn,$request->Password);


    $sql = "SELECT * FROM userko WHERE Email='$Email' and Password='$Password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        echo json_encode($result);
         
         
      }else {
        // $error = "Your Login Name or Password is invalid";
         //echo json_encode($error);
         header("HTTP/1.0 404 Not Found");//dis set error 404 to angular
        
  exit;

      }




?>