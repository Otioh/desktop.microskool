<?php

session_start();
include_once('database.php');

$email=$_GET['email'];














$sql = "select * from users where email='$email'";
$result =  mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$rows = mysqli_fetch_assoc($result);
$myDepartment=$rows['department'];
$myLevel=$rows['level'];
$myMatric=$rows['code'];


        $sql = "select * from courses where code='$myMatric' && level='$myLevel'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0){
  
            
        }else{

            $delete = "DELETE FROM `courses` WHERE `courses`.`code` ='$myMatric'"; 

            if (mysqli_query($conn, $delete)) {
               
                $sql = "select * from allcourse where department='$myDepartment' && level='$myLevel'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck > 0){
                        while( $rowz = mysqli_fetch_assoc($result)){
                        $nCode=$rowz['code'];
                        $nTitle=$rowz['title'];
                        $nDepartment=$rowz['department'];
                        $nFaculty=$rowz['faculty'];
                        $nLevel=$rowz['level'];
                        
                        $sql = "INSERT into courses (id, code, title, coursecode, department, faculty, level) VALUES (null, '$myMatric', '$nTitle', '$nCode', '$nDepartment', '$nFaculty', '$nLevel')";
                         
                        if(mysqli_query($conn, $sql)){
            
                        }
                    }

        }

        if($myLevel=="100"){

            $sql = "select * from allcourse where department='GSS' && level='$myLevel'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
                while( $rowz = mysqli_fetch_assoc($result)){
                $nCode=$rowz['code'];
                $nTitle=$rowz['title'];
                $nDepartment=$rowz['department'];
                $nFaculty=$rowz['faculty'];
                $nLevel=$rowz['level'];
                
                $sql = "INSERT into courses (id, code, title, coursecode, department, faculty, level) VALUES (null, '$myMatric', '$nTitle', '$nCode', '$nDepartment', '$nFaculty', '$nLevel')";
                 
                if(mysqli_query($conn, $sql)){
    
                }
            }

}

        }

    }
}


echo '{"fullname":"'.$rows['fullname'].'","department":"'.$rows['department'].'", "email":"'.$rows['email'].'", "faculty":"'.$rows['faculty'].'", "code":"'.$rows['code'].'", "level":"'.$rows['level'].'", "image":"'.$rows['image'].'", "dob":"'.$rows['dob'].'", "mob":"'.$rows['mob'].'", "yob":"'.$rows['yob'].'", "phone":"'.$rows['phone'].'"}';








?>




