<?php

///////////////دالة الخطاء الغير متوقع
error_reporting(0);
////////////////////////////////




//-----------------connection---------------------
$host ="localhost";
$user="root";
$pass="";
$db="university_quide_db";


$conn=mysqli_connect($host,$user,"",$db);

  
     if($_POST['user']){
       if($_POST['pass']){
        $us=$_POST['user'];
        $passwd=$_POST['pass'];
        $stms= $conn->prepare("SELECT * FROM users WHERE User_name =  '$us' AND  password =  '$passwd'");
        $stms->execute();
        $result=$stms->get_result();
        
        if($result){
          while($row=$result->fetch_assoc()){
            $data[]=$row;
          }
          //print_r($data);
          echo json_encode($data);
          exit();
        }
         else if(!$result){
           echo json_encode("null");
         }

       }
     }

   

       
    
   






    



?>