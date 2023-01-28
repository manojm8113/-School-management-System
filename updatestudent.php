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
    $id=$_GET['student_id'];
    
    $sql="SELECT * from user WHERE id='$id'";
    $result=mysqli_query($data,$sql);
    $info=$result->fetch_assoc();
if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];

    $query="UPDATE user SET username='$name, email='$email',phone='$phone',password='$password' WHERE id='$id'";
$result2=mysqli_query($data,$query);
if($result2){
    header ("location:viewstudent.php");
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

<style>
    label{
        display: inline-block;
        width: 100px;
        text-align: right;
        padding: 10px;
        padding-bottom: 10px;
    }
    .divdig{
        background-color: aqua;
        width: 400px;
        padding-bottom: 70px;
        padding-top: 70px;
    }
</style>
</head>
<body>
<?php
include 'adminsidebar.php';



?>

<div class="adcontent">
    <center>
    <button class="btn btn-dark">Update Student</button>

    <div class="divdeg">

    <form action="#" method="POST">
<div>
    <label>Username</label>
    <input type="text" name="name" value="<?php echo "{$info['username']}"; ?>">
</div>
<div>
    <label>Email</label>
    <input type="email" name="email" value="<?php echo "{$info['email']}"; ?>">
</div>
<div>
    <label>Phone</label>
    <input type="int" name="phone" value="<?php echo "{$info['phone']}"; ?>" >
</div>
<div>
    <label>Password</label>
    <input type="text" name="password" value="<?php echo "{$info['password']}"; ?>">
</div>
<div>
    <input class="btn btn-success" type="submit" name="update" value="Update">
</div>

    </form>
</div>
</center>
</div>


        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>   
</body>
</html>