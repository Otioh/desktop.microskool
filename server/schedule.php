<?php


include_once('database.php');

$email=$_GET['email'];

$sql = "select * from users where email='$email'";
$result =  mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$rows = mysqli_fetch_assoc($result);
$fullname=$rows['fullname'];
$department=$rows['department'];

echo'
<tr>
    <td>
    Monday
    </td>
    

';

$sql = "select * from timetable where department='$department' && day='Monday'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0);{
    while($row = mysqli_fetch_assoc($result)){
        $course=$row['course'];
        $time_in=$row['time_in'];
        $time_out=$row['time_out'];
        $venue=$row['venue'];
echo'
<td>'.$course.'<br>'.$time_in.' - '.$time_out.'<br>'.$venue.'</td>
        ';
    }}
echo'</tr>';

 

echo'
<tr>
    <td>
    Tuesday
    </td>
    

';

$sql = "select * from timetable where department='$department' && day='Tuesday'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0);{
    while($row = mysqli_fetch_assoc($result)){
        $course=$row['course'];
        $time_in=$row['time_in'];
        $time_out=$row['time_out'];
        $venue=$row['venue'];
echo'
<td>'.$course.'<br>'.$time_in.' - '.$time_out.'<br>'.$venue.'</td>
        ';
    }}
echo'</tr>';


echo'
<tr>
    <td>
    Wednesday
    </td>
    

';

$sql = "select * from timetable where department='$department' && day='Wednesday'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0);{
    while($row = mysqli_fetch_assoc($result)){
        $course=$row['course'];
        $time_in=$row['time_in'];
        $time_out=$row['time_out'];
        $venue=$row['venue'];
echo'
<td>'.$course.'<br>'.$time_in.' - '.$time_out.'<br>'.$venue.'</td>
        ';
    }}
echo'</tr>';


echo'
<tr>
    <td>
    Thursday
    </td>
    

';

$sql = "select * from timetable where department='$department' && day='Thursday'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0);{
    while($row = mysqli_fetch_assoc($result)){
        $course=$row['course'];
        $time_in=$row['time_in'];
        $time_out=$row['time_out'];
        $venue=$row['venue'];
echo'
<td>'.$course.'<br>'.$time_in.' - '.$time_out.'<br>'.$venue.'</td>
        ';
    }}
echo'</tr>';


echo'
<tr>
    <td>
    Friday
    </td>
    

';

$sql = "select * from timetable where department='$department' && day='Friday'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0);{
    while($row = mysqli_fetch_assoc($result)){
        $course=$row['course'];
        $time_in=$row['time_in'];
        $time_out=$row['time_out'];
        $venue=$row['venue'];
echo'
<td>'.$course.'<br>'.$time_in.' - '.$time_out.'<br>'.$venue.'</td>
        ';
    }}
echo'</tr>';


echo'
<tr>
    <td>
    Saturday
    </td>
    

';

$sql = "select * from timetable where department='$department' && day='Saturday'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0);{
    while($row = mysqli_fetch_assoc($result)){
        $course=$row['course'];
        $time_in=$row['time_in'];
        $time_out=$row['time_out'];
        $venue=$row['venue'];
echo'
<td>'.$course.'<br>'.$time_in.' - '.$time_out.'<br>'.$venue.'</td>
        ';
    }}
echo'</tr>';

?>
