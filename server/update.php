<?php
include_once('database.php');

    $email = $_GET['email'];
        
        $email2 = $_GET['email2'];
        $faculty = $_GET['faculty'];
        $department = $_GET['department'];
         $level = $_GET['level'];
         $matric = $_GET['matric'];
         $phone = $_GET['phone'];
       
       

       
            $sql = "UPDATE users SET email='$email2', faculty='$faculty', department='$department', level='$level', code='$matric', phone='$phone' WHERE email='$email'";
             
            if(mysqli_query($conn, $sql)){
echo"success";

            }else{
                echo"failed";
               
            }
 

           
     
          
        
?>