<?php
include_once('database.php');

   
        
        $code = $_GET['code'];
       $faculty=$_GET['faculty'];
       $department=$_GET['department'];
       $title=$_GET['title'];
       $level=$_GET['level'];

       

    
     
          
        

      $sql = "INSERT into allcourse (id, code, title, level, department, faculty) VALUES (null, '$code', '$title', '$level', '$department', '$faculty')";
             
                if(mysqli_query($conn, $sql)){
echo"success";

                }else{
                    echo"fail";
                   
                }
           
    

?>