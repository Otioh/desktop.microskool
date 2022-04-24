<?php
include_once('database.php');

    $fname = $_GET['firstname'];
        $fname = strip_tags($fname);
        $fname = htmlspecialchars($fname);
    

        $oname = $_GET['middlename'];
        $oname = strip_tags($oname);
        $oname = htmlspecialchars($oname);

        $sname = $_GET['surname'];
        $sname = strip_tags($sname);
        $sname = htmlspecialchars($sname);

        $fullname = $fname." ".$oname." ".$sname;
        

        $department = $_GET['department'];
        $department = strip_tags($department);
        $department = htmlspecialchars($department);
       
        $faculty = $_GET['faculty'];
        $faculty = strip_tags($faculty);
        $faculty = htmlspecialchars($faculty);
$date=date('d/m/y');

    
        $password = $_GET['password'];
        $password = strip_tags($password);
        $password = htmlspecialchars($password);
    
    
    $email = $_GET['email'];
        $email = strip_tags($email);
        $email = htmlspecialchars($email);
     
        
       
    $status="Active";
        $code= $_GET['reg'];
    $image="img/pro2.jpg";
        $sub="Active";
    $cgpa="Not Calculated";
    $sql_u = "SELECT * FROM users WHERE code='$code'";
    $res_u = mysqli_query($conn, $sql_u);

    $sql_e = "SELECT * FROM users WHERE email='$email'";
    $res_e = mysqli_query($conn, $sql_e);
if(mysqli_num_rows($res_e) > 0){
     echo'Sorry... email already taken, Recover Account'; 	
    }elseif(mysqli_num_rows($res_u) > 0) {
        echo'Sorry... Account already exist with this Matric/JAMB/CES Number'; 
    }else{
      $sql = "INSERT into users (firstname, surname, middlename, fullname, email, code, faculty, department, password, status, cgpa, image, created_at) VALUES ('$fname', '$sname', '$oname','$fullname', '$email', '$code',  '$faculty', '$department', '$password', '$sub', '$cgpa', '$image', '$date')";
             
                if(mysqli_query($conn, $sql)){
echo' Account Created Successfully! ';
                }else{
    
                    echo'          Account Creation Failed, Please Try Again ';
                }
               
    }   

?>