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
//-----------------end connection---------------------
//INSERT INTO `users` (`ID`, `User_name`, `Name`, `password`, `email`, `birthDate`, `phone`, `leave_location`, `average`, `grad_year`) VALUES (NULL, 'jhgk', 'jkh', 'hnkjv', 'lkjdshzcz', 'lhkdsakjb', 'jdkhh', 'kjsach', '76', 'lkj');

//-----------------add data-----------------------


   $us=$_POST['username'];
   $name_stu=$_POST['stud_name'];
  $pho_no=$_POST['phone_num'];
  $location=$_POST['living_loc'];
  $gra_year=$_POST['grad_year'];
  $avg_mark=$_POST['avarege'];
  $user_name=$_POST['username'];
  $email=$_POST['mail'];
   $passwd=$_POST['pass'];
  $data=NULL;
  $last_sure_to_insert=$_POST['sure'];

  
  $data=NULL;
  $insert="insert into users values(NULL,'$user_name','$name_stu','$passwd','$email','$pho_no','$location','$avg_mark','$gra_year')";


  $stms_check= $conn->prepare("SELECT * FROM users WHERE email =  '$email'");
  $stms_check->execute();
  $result_check=$stms_check->get_result();
  if($result_check){
   
    while($row=$result_check->fetch_assoc()){
      $data[]=$row;
    }
   // echo json_encode($data);
    if($data==NULL){
      
      //$resu->execute();
      
        //echo json_encode("null");
           $email_check=$conn->prepare("SELECT * FROM users WHERE User_name =  '$us'");
           $email_check->execute();
           $res_check_email=$email_check->get_result();
           if($res_check_email){
            while($row_e=$res_check_email->fetch_assoc()){
              $data_em[]=$row_e;
            }
            if($data_em==NULL){
              if($last_sure_to_insert=="yes"){

                $resu= mysqli_query($conn,$insert);
                exit();
              }
              else{
                    echo json_encode("null");
              }
             

              
              
            }
            else{
              echo json_encode("unavailable_us");
              exit();
            }
           }
           
     }
      else{
       echo json_encode("unavailable_em");
       exit();
      }
     }
    
   



?>