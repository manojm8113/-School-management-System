<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){

header("location:login.php");
}
elseif($_SESSION['usertype']=='student'){
    header("location:login.php");
}
$host="localhost";
$user="root";
$password="";
$db="schoolproject";
$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * from teacher";
$result=mysqli_query($data,$sql);

if($_GET['teacher_id']){
    $t_id=$_GET['teacher_id'];
    $sql2="DELETE FROM teacher WHERE id='$t_id'";
    $result2=mysqli_query($data,$sql2);
    if ($result2){
        header('location:viewteacher.php');
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>admin dashbord</title>
    <?php

include 'admincss.php';


?>
</head>
<body>
<?php
include 'adminsidebar.php';



?>

<div class="adcontent">
<center>
<button class="btn btn-dark">VIEW ALL TEACHERS</button>
    <table>
<tr>
    <th class="tableth">Teacher Name</th>
    <th class="tableth">About Teacher</th>
    <th class="tableth">Teacher Image</th>
    <th class="tableth">Delete</th>
    <th class="tableth">Update</th>

</tr>
<?php
while($info=$result->fetch_assoc()){



?>
<tr>
    
<td class="tabletds"><?php echo"{$info['name']}"   ?></td>
<td class="tabletds" > <?php echo"{$info['description']}"   ?></td>
<td class="tabletds"><img height="100px" width="150px"src="<?php echo"{$info['image']}"   ?>"></td>
<td class="tabletds"> <?php echo
"<a onClick=\"javascript:return confirm('Are You Sure To Delete');\" class='btn btn-danger'href='viewteacher.php?teacher_id={$info['id']}'>Delete</a>";
 ?></td>
 <td class="tabletd"> <?php echo
"<a class='btn btn-primary'href='updateteacher.php?teacher_id={$info['id']}'>Update</a>";
 ?></td>
</tr>
<?php


}
?>
</table>
</center>
</div>



        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>   
</body>
</html>