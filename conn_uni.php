<?php

$host ="localhost";
$user="root";
$pass="";
$db="university_quide_db";


$conn=mysqli_connect($host,$user,"",$db);

$stms= $conn->prepare("SELECT * FROM univercity");
$stms->execute();
$result=$stms->get_result();

//$numm=mysqli_num_rows($result);


    while($row=$result->fetch_assoc()){
        $data[]=$row;
     
       
      }
    
     echo json_encode($data);
      //print_r($data);
    



?>