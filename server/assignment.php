<?php


include_once('database.php');

$sql = "select * from assignments";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0);{
    while($row = mysqli_fetch_assoc($result)){
        $course=$row['course'];
        $questions=$row['questions'];
        $date=$row['deadline'];
        $id=$row['id'];
        $image=$row['image'];
        $lecturer=$row['lecturer'];
echo'
<li onclick=document.getElementById("'.$id.'").showModal()><span><i class="fas fa-book"></i></span><strong>'.$course.'</strong><br>'.$questions.'<br><i class="fas fa-user"> '.$lecturer.'</i><br><strong>'.$date.'</strong> </li>

<dialog id="'.$id.'" style="width:60%;">
<h style="color: rgb(83, 83, 170);font-family: monospace;font-weight: bold;">'.$course.'</h><hr/>
<img   src="'.$image.'">


<hr/>
<button class="btn inverse" onclick=document.getElementById("'.$id.'").close()>X</button>
 </dialog>
        ';
    }}


 
?>
