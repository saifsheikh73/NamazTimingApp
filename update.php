<?php
include 'conn.php';
$location=$_POST['location'];
date_default_timezone_set("Asia/Kolkata");
$time = date("Y-m-d h:i:s");
$sql="UPDATE user1 SET location='".$location."',time='".$time."' WHERE id ='".$_SESSION['id']."'";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
?>