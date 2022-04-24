<?php
include_once('database.php');

    $matric = $_GET['matric'];
        
        $code = $_GET['code'];
       
       

        $sql = "select * from allcourse where code='$code'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0){
            $row = mysqli_fetch_assoc($result);
            
            $title=$row['title'];
            $department=$row['department'];
            $faculty=$row['faculty'];
     
          
        

      $sql = "INSERT into courses (id, code, title, coursecode, department, faculty) VALUES (null, '$matric', '$title', '$code', '$department', '$faculty')";
             
                if(mysqli_query($conn, $sql)){
echo"success";

                }else{
                    echo"fail";
                   
                }
            }else{
                echo"create";
            }
    

?>