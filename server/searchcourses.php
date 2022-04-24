<?php


include_once('database.php');

$sql = "select * from allcourse";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0);{
    while($row = mysqli_fetch_assoc($result)){
        $code=$row['code'];
        $title=$row['title'];
        $level=$row['level'];
        $department=$row['department'];
        $faculty=$row['faculty'];
echo'
      
<li><span><i class="fas fa-book"></i></span><strong>'.$code.'</strong><br>'.$title.'<br>'.$level.' Level<br>'.$faculty.' Faculty<br>'.$department.' Department</li>

        ';
    }}


 
?>
