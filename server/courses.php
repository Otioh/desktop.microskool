

<?php

include_once('database.php');
$myLevel=$_GET['level'];
$myFaculty=$_GET['faculty'];
$myMatric=$_GET['matric'];

echo '

<article id="points" class="group">
    <div class="one_third first" style="padding:20px;">
      <h6 class="heading">Edit Course Outline</h6>
        <ul class="nospace group">

        <input list="browsers" id="ccode" placeholder="Search Course">
        <br>
        <button class="btn" onclick=Add(document.getElementById("ccode").value)><i class="fas fa-save"></i> Add </button>
       <button class="btn inverse" onclick="newCourseDialog();"><i class="fas fa-edit"></i>Create</button>
        <datalist id="browsers">

';
$sql = "select * from allcourse where level='$myLevel' && faculty='$myFaculty'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0);{
    while($row = mysqli_fetch_assoc($result)){
        $code=$row['code'];
        $title=$row['title'];
        $level=$row['level'];
echo'
        <option value="'.$code.'"> '.$level.' '.$title.'
   
        ';


    }
}

$sql = "select * from allcourse ";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0);{
    while($row = mysqli_fetch_assoc($result)){
        $code=$row['code'];
        $title=$row['title'];
        $level=$row['level'];
echo'
        <option value="'.$code.'"> '.$level.' '.$title.'
   
        ';


    }
}

        echo'

   </datalist>
    </div>
    <div class="two_third last">';
    
    $sql = "select * from courses where code='$myMatric'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0);{
        while($row = mysqli_fetch_assoc($result)){
            $code=$row['coursecode'];
            $title=$row['title'];
         
    echo'
            <li style="background:whitesmoke;border-radius:5px;cursor:pointer;"><span>!</span>'.$code.' -- '.$title.' </li>
       
            ';
    
    
        }
    }
    
    echo'
    </div>

  </article>
';


  ?>
  
  <dialog id="newcourse" style="padding: 20px;">
    <h style="color: rgb(83, 83, 170);font-family: monospace;font-weight: bold;">Create New Course</h><hr/>
   <input type="text" class="btmspace-15" id="c_code" placeholder="Course Code">
   <input class="btmspace-15" id="c_title" placeholder="Course Title">
   <select type="text" class="btmspace-15" id="c_faculty" placeholder="Faculty" >
<option>Faculty</option>
<optgroup id="faculties">

</optgroup>
</select>
<select type="text" class="btmspace-15" id="c_department" placeholder="Faculty">
<option>Department</option>
<optgroup id="departments">

</optgroup>
</select>
<select type="text" class="btmspace-15" id="c_level" placeholder="Faculty">
<option>Level</option>
<option value="100">100</option>
<option value="200">200</option>
<option value="300">300</option>
<option value="400">400</option>
<option value="500">500</option>

</select>
   <button onclick="SaveCourse()" class="btn"><i class="fas fa-save"></i> Save</button>
   <button onclick="document.getElementById('newcourse').close();" class="btn inverse"><i class="fa-stop"></i>Cancel</button>
    <br>
     </dialog>