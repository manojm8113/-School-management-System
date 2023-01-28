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
if(isset($_POST['add_student'])){

$username=$_POST['name'];
$user_email=$_POST['email'];
$user_phone=$_POST['phone'];
$user_password=$_POST['password'];
$usertype="student";

$check ="SELECT * FROM user WHERE username='$username'";
$check_user=mysqli_query($data,$check);
$row_count=mysqli_num_rows($check_user);

if($row_count==1){
    echo "<script type='text/javascript'> alert('UserName is Alreday Exist.Try Another one')  </script>";
}
else{


$sql="INSERT INTO user(username,email,phone,usertype,password) VALUES('$username','$user_email','$user_phone','$usertype','$user_password') ";
$result=mysqli_query($data,$sql);

if($result){
    echo "<script type='text/javascript'> alert('Data Success Fully Inserted')  </script>";
}
else{
    echo "upload faild";
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Add Student</title>
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
    <button class="btn btn-dark">ADD STUDENT</button>
    <div class="divdeg">
<form action="#" method="POST">
<div>
    <label class="addlabel">Username</label>
    <input type="text" name="name">
</div>
<div>
    <label class="addlabel">Email</label>
    <input type="email" name="email">
</div>
<div>
    <label class="addlabel">Phone</label>
    <input type="number" name="phone">
</div>
<div>
    <label class="addlabel">Password</label>
    <input type="text" name="password">
</div>
<div>
    
    <input type="Submit"class="btn btn-warning" name="add_student" value="Add Student">
</div>

</form>


    </div>

</center>
</div>


        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>   
</body>
</html>