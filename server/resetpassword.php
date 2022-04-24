<?php
include_once('database.php');

    $email = $_GET['email'];
        
        $newpassword = $_GET['newpassword'];
        $oldpassword = $_GET['oldpassword'];
       
       

        $sql = "select * from users where email='$email'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
      
            $row = mysqli_fetch_assoc($result);
            
            $mypassword=$row['password'];
           if($mypassword==$newpassword){
            echo"exist";
           }elseif($mypassword!=$oldpassword){
            echo"wrong";
           }else{
            $sql = "UPDATE users SET password='$newpassword' WHERE email='$email'";
             
            if(mysqli_query($conn, $sql)){
echo"success";

            }else{
                echo"failed";
               
            }
 

           }
     
          
        
?>