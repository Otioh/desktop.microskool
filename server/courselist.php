<?php

include_once('database.php');
$sql = "select * from allcourse ";
$result =  mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if($count>0){

while(
$rows = mysqli_fetch_assoc($result)){
$id=$rows['code'];
$topic=$rows['title'];
echo'
<option value="'.$id.'">
'.$topic.'
</option>
';}}


?>