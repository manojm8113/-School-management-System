<?php
session_start();
if(!isset($_SESSION['username']))

header("location:login.php");
elseif($_SESSION['usertype']=='admin'){
    header("location:login.php");
}
$host="localhost";
$user="root";
$password="";
$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);
$name=$_SESSION['username'];
$sql="SELECT * from user WHERE username='$name'";
$result=mysqli_query($data,$sql);
$info=mysqli_fetch_assoc($result);
if(isset($_POST['updateprofile'])){
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $sql="UPDATE user SET email='$email',phone='$phone',password='$password'WHERE username='$name'";
    $result2=mysqli_query($data,$sql);
    if($result2){
        header('location:studentprofile.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student dashbord</title>
    <?php

include 'studentcss.php';
?>

</style>

</head>
<body>
    <?php

    include 'stdudentsidebar.php';
    ?>
<div class="adcontent">
    <center>
        <button class="btn btn-dark">Update Profile</button>
    <form action="#" method="POST">
        <div class="divdeg2">
        <div>
            <label class="addlabel2">Email</label>
            <input type="emai" name="email" value="<?php echo "{$info['email']}"?>">
        
        </div>
        <div>
            <label class="addlabel2">Phone</label>
            <input type="int" name="phone" value="<?php echo "{$info['phone']}"?>">
        
        </div>
        <div>
            <label class="addlabel2">Password</label>
            <input type="text" name="password"value="<?php echo "{$info['password']}"    ?>">
        
        </div>
        <div>
            <input class="btn btn-dark" type="submit" name="updateprofile" value="Update">
        </div>
        </div>
    </form>
    </center>
</div>



        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>   
</body>
</html>