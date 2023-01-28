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
    
    if($_GET['teacher_id']){
        $t_id=($_GET['teacher_id']);
    $sql="SELECT * from teacher WHERE id='$t_id'";
    $result=mysqli_query($data,$sql);
    $info=$result->fetch_assoc();
    }
if(isset($_POST['updateteacher'])){
    $id=$_POST['id'];
    $tname=$_POST['name'];
    $tdes=$_POST['description'];
    $file=$_FILES['image']['name'];
    $dst="./image/".$file;
    $dst_db="image".$file;
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);
    if($file){
        $sql2="UPDATE teacher SET name='$tname', description='$tdes',image='$dst_db' WHERE id='$id'";
       
    }
    else{
        $sql2="UPDATE teacher SET name='$tname', description='$tdes' WHERE id='$id'";
       
    }
    $result2=mysqli_query($data,$sql2);
if($result2){
    header ("location:viewteacher.php");
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
    <button class="btn btn-dark">Update Teacher Data</button>

    <div class="divdeg">

    <form action="#" method="POST"enctype="multypart/form-data">
        <input type="text" name="id" value="<?php echo "{$info['id']}"   ?>"hidden>
<div>
    <label Class="uplabel">TeacherName</label>
    <input type="text" name="name" value="<?php echo "{$info['name']}"   ?>">
</div>
<div>
    <label Class="uplabel">AboutTeacher</label>
    <textarea name="description" rows="4"> <?php echo "{$info['description']}"   ?></textarea>
</div>
<div>
    <label>Teacher old Image</label>
    <img height="100px"width="100px"src="<?php echo "{$info['image']}"   ?>">
</div>
<div>
    <label>Teacher New Image</label>
    <input type="file" name="image">
</div>
<div>
    <input class="btn btn-success" type="submit" name="updateteacher" value="Update">
</div>

    </form>
</div>
</center>
</div>


        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>   
</body>
</html>