<?php
include_once('database.php');
$email=$_POST['email'];



//upload.php
if($_FILES["file"]["name"] != '')
{
 $test = explode('.', $_FILES["file"]["name"]);
 $ext = end($test);
 $name = rand(100, 999) . '.' . $ext;
 $location = 'images/' . $name;  
 move_uploaded_file($_FILES["file"]["tmp_name"], $location);

$locationimg='http://192.168.43.30/desktop.microskool/server/'.$location;
$sql="UPDATE `users` SET image='$locationimg' WHERE email='$email'";
if(mysqli_query($conn, $sql)){
 echo '<img src="'.$locationimg.'" height="100px" width="100px" class="img-thumbnail" /><h3>Successful</h3> ';
}else{

}
}else{
    echo "No Image Found";
}
?>