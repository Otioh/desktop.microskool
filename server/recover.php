<?php
include_once('database.php');

    $email = $_GET['email'];
        
        $matric = $_GET['matric'];
        $phone = $_GET['phone'];
       
       

        $sql = "select * from users where email='$email' && phone='$phone' && code='$matric'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
      if($resultCheck>0){

      
            $row = mysqli_fetch_assoc($result);
            
            $mypassword=$row['password'];
            echo'Your Password:  <br> <h style="font-weight:bold;font-size:15pt;">'.preg_replace("/(?!^).(?!$)/", "*", $mypassword).'</h> <br><img src="'.$row['image'].'" width="100" style="width:200px;">';
     
        }else{
echo"Wrong Account Details";

        }     
        
?>