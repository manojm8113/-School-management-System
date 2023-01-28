<?php
session_start();
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
if(isset($_POST['addteacher'])){

$tname=$_POST['name'];
$description=$_POST['description'];
$file=$_FILES['image']['name'];
$dst="./image/".$file;
$dst_db="image/".$file;
move_uploaded_file($_FILES['image']['tmp_name'],$dst);
$sql="INSERT INTO teacher(name,description,image)VALUES('$tname','$description','$dst_db')";
$result=mysqli_query($data,$sql);

if($result){
    header('location:addteacher.php');
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
    <button class="btn btn-dark">ADD TEACHER</button>
<div class="divdeg">

<form action="#" method="POST" enctype="multipart/form-data"> 

<div>
    <label class="addlabel">TeacherName:</label>
    <input type="text" name="name">

</div>
<div>
    <label class="addlabel">Description:</label>
    <textarea name="description"></textarea>

</div>
<div>
    <label class="addlabel">Image:</label>
    <input type="file" name="image">

</div>
<div>

    <input class="btn btn-warning"type="submit" name="addteacher" value="Add Teacher">

</div>
</form>
</div>


</center>
</div>


        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>   
</body>
</html>