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

$sql="SELECT * from admission";
$result=mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Admission Form</title>
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
    <h1 class="btn btn-dark">ADMISSION</h1>
    <table>
<tr>
    <th style="padding:20px; font-size:15px;">Name</th>
    <th style="padding:20px; font-size:15px;">Email</th>
    <th style="padding:20px; font-size:15px;">Phone</th>
    <th style="padding:20px; font-size:15px;">Message</th>
    

</tr>




<?php

while($info=$result -> fetch_assoc()){


?>
<tr>
<td class="tabletd" style="padding:20px;"><?php    
echo"{$info['name']}"?></td>
<td class="tabletd"style="padding:20px;"> <?php    
echo"{$info['email']}"?></td>
<td class="tabletd"style="padding:20px;"><?php    
echo"{$info['phone']}"?></td>
<td class="tabletd" style="padding:20px;"> <?php    
echo"{$info['message']}"?></td>
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