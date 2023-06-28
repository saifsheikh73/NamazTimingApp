<?php
include("conn.php");

if(isset($_POST['username']))
{
  $username = $_POST['username'];
  $sql = "SELECT username FROM user1 WHERE username='$username'";
  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  
  if(mysqli_num_rows($res) > 0)
  {
    echo '<h6 style="color:red;">User Name Already Exists</h6>';
  }
}
?>
