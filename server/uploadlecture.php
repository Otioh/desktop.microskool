<?php
include_once('database.php');
$email=$_POST['email'];

$topic =$_POST['topic'];

$date=date('d/m/y h:i:s');
$venue="Online";
$course=$_POST['code'];
$summary=$_POST['summary'];

$sql = "select * from users where email='$email'";
$result =  mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$rows = mysqli_fetch_assoc($result);
$fullname=$rows['fullname'];

$sql = "select * from allcourse where code='$course'";
$result =  mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$rows = mysqli_fetch_assoc($result);
$faculty=$rows['faculty'];
$department=$rows['department'];
$level=$rows['level'];
$title=$rows['title'];

$id=mt_rand(0,9).mt_rand(0,9).mt_rand(0,9);
//upload.php
if($_FILES["file"]["name"] != '')
{
 $test = explode('.', $_FILES["file"]["name"]);
 $ext = end($test);
 $name = rand(100, 999) . '.' . $ext;
 $location = 'videos/' . $name;  
 move_uploaded_file($_FILES["file"]["tmp_name"], $location);

$locationimg='http://192.168.43.30/desktop.microskool/server/'.$location;
$sql="INSERT INTO `lectures` (`topic`, `mp3`, `faculty`, `department`, `date`, `venue`, `author`, `title`, `coursecode`, `level`, `id`, `summary`, `likes`) VALUES ('$topic', '$locationimg', '$faculty', '$department', '$date', '$venue', '$fullname', '$title', '$course', '$level', '$id', '$summary', '0');";
if(mysqli_query($conn, $sql)){
 echo '
Uploaded and submitted for review

';
}else{
echo"Failed";
}
}else{
    echo "No Video Found";
}
?>