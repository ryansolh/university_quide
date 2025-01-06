<?php
error_reporting(0);

$host ="localhost";
$user="root";
$pass="";
$db="university_quide_db";


$conn=mysqli_connect($host,$user,"",$db);



if($_POST["ID"]){
$id_u=$_POST["ID"];





$stms= $conn->prepare("SELECT * FROM univercity WHERE Uni_ID = $id_u");
$stms->execute();
$result=$stms->get_result();

//$numm=mysqli_num_rows($result);


    while($row=$result->fetch_assoc()){
        $data[]=$row;
      }
      //print_r($data);
      echo json_encode($data);

}
else{
  echo json_encode("nooooooooooooooooooooooooo");
}
      //print_r($data);
    



?>