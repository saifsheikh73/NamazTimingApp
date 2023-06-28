<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'allcssjs.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
$sql="SELECT * from user1 WHERE username='".$_POST['username']."' AND password ='".$_POST['pass']."'" ;
$result=mysqli_query($conn,$sql) or die (mydqli_error($conn));
if(mysqli_num_rows($result) > 0){
$fetchData=mysqli_fetch_assoc($result);
$_SESSION['id']=$fetchData['id'];
$_SESSION['username']=$fetchData['username'];
echo"<script>window.location.href='loginsuccessfull.php';</script>";
//header('Location:view_users.php');
}
else
{
    echo'<script>alert("Username or Password is incorrect.")</script>';
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-04.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>

				<form class="login100-form validate-form" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password" required>
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="remember" type="checkbox" name="remember">
							<label class="label-checkbox100" for="remember">
								Remember me
							</label>
						</div>

						<div>
							<a href="resetpasswordtoken.php" class="txt1">
								Forgot Username or Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="Login"> 
						</div>
						&nbsp;&nbsp;
						<div class="container-login100-form-btn">
						<button type="button" class="login100-form-btn" onclick="window.location.href='signup.php'">Sign up ?</button>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

</body>
</html>
