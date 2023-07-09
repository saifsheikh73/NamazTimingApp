<?php
include("conn.php");

if(isset($_POST['email']))
{
  $email = $_POST['email'];
  $sql = "SELECT email FROM user2 WHERE email='$email'";
  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  
  if(mysqli_num_rows($res) > 0)
  {
    echo '<h6 style="color:red;">Email Already Exists</h6>';
  }
}
?>
