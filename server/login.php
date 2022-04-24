<?php
include_once('database.php');


    
        $password = $_GET['password'];
        $password = strip_tags($password);
        $password = htmlspecialchars($password);
    
    
    $email = $_GET['email'];
        $email = strip_tags($email);
        $email = htmlspecialchars($email);
     
        
     

    $sql_e = "SELECT * FROM users WHERE email='$email' && password='$password'";
    $res_e = mysqli_query($conn, $sql_e);
if(mysqli_num_rows($res_e) > 0){
     echo'success'; 	
    }else {
        echo'Wrong Login Details'; 
    }

?>