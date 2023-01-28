<?php
session_start();
if(!isset($_SESSION['username'])){

header("location:login.php");
}
elseif($_SESSION['usertype']=='student'){
    header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <?php

include 'admincss.php';

?>
</head>
<body>
<?php
include 'adminsidebar.php';



?>

<div class="adcontent">
    <h1 class="btn btn-dark">Admin Dashboard</h1>
    <p>This is the admindashboard to use to mange the school/college......<br>The admin can accesses to "Add teacher , View teacher/Update/Delete , Add student , View student/Update/Delete........!<br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
</div>


        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>   
</body>
</html>