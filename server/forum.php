<?php


include_once('database.php');

$sql = "select * from forum";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0);{
    while($row = mysqli_fetch_assoc($result)){
        $name=$row['fullname'];
        $message=$row['message'];
        $date=$row['date'];
echo'
<li class="one_third first" style="padding: 10px;width: 70%;box-shadow:none;">
<article>
  <figure><img src="images/demo/348x261.png" alt="" style="width:95%;">
    <figcaption>
      <ul class="nospace meta clear">
        <li><i class="fas fa-user"></i> <a >'.$name.'</a></li>
        <li>
          <time datetime="2045-04-06T08:15+00:00">'.$date.'</time>
        </li>
      </ul>
     
    </figcaption>
  </figure>
  <p>'.$message.'</p>
</article>
</li>

        ';
    }}


 
?>
