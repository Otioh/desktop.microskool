<?php

include_once('database.php');





echo'

<article id="points" class="group">
    <div class="two_third first">
              
        <h style="margin-bottom: 20px;font-weight: bold;font-size: x-large;color: rgb(83, 83, 170);">
            Lecture Summaries
            
              </h><br><br>
      
      <ul class="nospace group">


';
$sql = "select * from lectures ";
$result =  mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if($count>0){

while(
$rows = mysqli_fetch_assoc($result)){
$id=$rows['id'];
$topic=$rows['topic'];
$video=$rows['mp3'];
$date=$rows['date'];
$author=$rows['author'];
$title=$rows['title'];
$coursecode=$rows['coursecode'];
$summary=$rows['summary'];
$likes=$rows['likes'];
echo'

        <li  style="cursor: pointer;" onclick=document.getElementById("'.$id.'").showModal()><button class="btn inverse" style="float:right;border:none;"><i class="fas fa-thumbs-up"></i> '.$likes.'</button> <span><i class="fas fa-video"></i></span><strong>'.$topic.'</strong><br><h style="font-size:8pt;">'.$coursecode.' || '.$title.'</h></li>
      
    <dialog id="'.$id.'" style="width:50%;">
    <h style="color: rgb(83, 83, 170);font-family: monospace;font-weight: bold;font-size: 15pt;">   '.$topic.'</h>
    <hr/><h style="color: gray;font-family: monospace;font-size: 9pt;"> 
    '.$coursecode.' || '.$title.' || '.$author.' || '.$date.'</h>
    
    
 
    <hr/>

    
    <video  src="'.$video.'" controls style="width:100%;">
    <source src="'.$video.'" type="video/mp4">
 </video>

<hr/>

    '.$summary.'
    
    
    <hr/>
    <button class="btn inverse" onclick=document.getElementById("'.$id.'").close()>x</button>
    </dialog>
';}}
        
echo'
      </ul>




</div>
    </div>
    <div class="one_third last" style="padding:15px;"> 

  <br>
    <button class="btn" onclick="OpenNewLecture()"><i class="fas fa-edit" ></i>  New Lecture</button>
    
    <br><br>
  Learn deeper by creating a Lecture Summary on a topic you are very conversant with in any Course of your choice, share ideas with other Microskool users
    <br><br>
    <h5 class="heading">Steps to Upload a Lecture Summary</h5>
    <strong>1. Choose a topic (favourite) from any course </strong><br>
    <strong>2. Make a Lecture Video on the Topic you chose </strong><br>
    <strong>3. Do a writeup as a summary on the same topic </strong><br>
    <strong>4. Click on New Lecture button above to upload </strong><br>
    <strong>5. Get paid for every 100 Likes your summary receives </strong><br>
    
    
    </div>

    <dialog id="newlect" style="width:40%;">
    <h style="color: rgb(83, 83, 170);font-family: monospace;font-weight: bold;font-size: 15pt;">   New Lecture Summary</h>
   
<hr/>
<button class="btn inverse" style="float: right;margin-right: 20%;" onclick=Open("editcourse*CreateNewCourse");><i class="fas fa-edit"></i></button>
<input list="browser" placeholder="Course Code" style="padding: 10px;margin:5px;width:60%;" id="code">
<datalist id="browser">
';
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

echo'
</datalist>
<input placeholder="Topic" style="padding: 10px;margin:5px;width:60%;" id="topic">



<textarea placeholder="Summary" style="padding: 10px;margin:5px;width:60%;min-height:200px;" id="summary"></textarea>
<br>
Select video file:
<input  type="file" id="file" name="file" style="padding: 10px;margin:5px;"><br>
<button class="btn" style="float:right;" onclick="UploadLecture()"><i class="fas fa-upload"></i> Upload</button><br>

    <hr/>
    <button class="btn inverse" onclick=document.getElementById("newlect").close()>x</button>
    </dialog>

    






</article>




';
        ?>