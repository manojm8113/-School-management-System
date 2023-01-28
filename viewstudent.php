<?php
error_reporting(0);
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

$sql="SELECT * from user WHERE usertype='student'";
$result=mysqli_query($data,$sql);
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
    <button class="btn btn-dark">STUDENT DATA</button>
    <?php
if($_SESSION['message']){
    echo $_SESSION['message'];
}
unset($_SESSION['message']);

?>
<table>


<tr>
    <th class="tableth" >Username</th>
    <th class="tableth">Email</th>
    <th class="tableth">Phone</th>
    <th class="tableth">Password</th>
    <th class="tableth">Delete</th>
    <th class="tableth">Update</th>
</tr>
<?php
while($info=$result->fetch_assoc()){




?>
<tr>
    <td class="tabletds"><?php echo"{$info['username']}";
    ?></td>
    <td class="tabletds"><?php echo"{$info['email']}";
    ?></td>
    <td class="tabletds"><?php echo"{$info['phone']}";
    ?></td>
    <td class="tabletds"><?php echo"{$info['password']}";
    ?></td>
    <td class="tabletds"><?php echo"<a class='btn btn-danger' onClick=\"javascript:return confirm('Are You Sure To Delete');\" href='delete.php?student_id={$info['id']}'> Delete </a>";
    ?></td>
    <td class=tabletds><?php echo "<a class='btn btn-info' href='updatestudent.php?student_id={$info['id']}'> Update </a>";
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