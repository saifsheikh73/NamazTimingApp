<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//////////////////////////////
include 'conn.php';
include 'allcssjs.php';

/* Code not needed
if($_SERVER['REQUEST_METHOD']=='POST'){
	$sql1="SELECT * from user1 WHERE username='".$_POST['username']."' AND password ='".$_POST['member_password']."'" ;
	$result1=mysqli_query($conn,$sql1) or die (mydqli_error($conn));
	if(mysqli_num_rows($result1) > 0){
	$fetchData=mysqli_fetch_assoc($result1);
	$_SESSION['id']=$fetchData['id'];
	$_SESSION['username']=$fetchData['username'];
	}*/
//session_start();
if(isset($_SESSION["email"]))
{
 header("location:view_users6.php");
}
//$conn = mysqli_connect("localhost", "root", "", "id20710658_db");  
if(isset($_POST["login"]))   
{  
	$sql1="SELECT * from user2 WHERE email='".$_POST['email']."' AND password ='".$_POST['member_password']."'" ;
	$result1=mysqli_query($conn,$sql1) or die (mydqli_error($conn));
	if(mysqli_num_rows($result1) > 0){
		$fetchData=mysqli_fetch_assoc($result1);
		$_SESSION['id']=$fetchData['id'];
		$_SESSION['username']=$fetchData['username'];
		$_SESSION['city']=$fetchData['city'];
		$_SESSION['zipcode']=$fetchData['zipcode'];
		}
 if(!empty($_POST["email"]) && !empty($_POST["member_password"]))
 {
  $name = mysqli_real_escape_string($conn, $_POST["email"]);
  //$password = md5(mysqli_real_escape_string($conn, $_POST["member_password"]));
  $sql = "Select * from user2 where email ='".$_POST['email']."' AND password ='".$_POST['member_password']."'" ;
  $result = mysqli_query($conn,$sql);  
  $user = mysqli_fetch_array($result);  
  if($user)   
  {  
   if(!empty($_POST["remember"]))   
   {  
    setcookie ("member_login",$name,time()+ (10 * 365 * 24 * 60 * 60));  
    //setcookie ("member_password",$password,time()+ (10 * 365 * 24 * 60 * 60));
    $_SESSION["username"] = $name;
   }  
   else  
   {  
    if(isset($_COOKIE["member_login"]))   
    {  
     setcookie ("member_login","");  
    }  
    if(isset($_COOKIE["member_password"]))   
    {  
     setcookie ("member_password","");  
    }  
   }  
   header("location:view_users6.php"); 
  }  
  else  
  {  
   //$message = "Invalid Login";  
   echo "<script>alert('Invalid username or password.');</script>";
  } 
 }
 else
 {
  $message = "Both are Required Fields";
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

				<form class="login100-form validate-form" method="POST" id="frmLogin">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Enter email" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="member_password" placeholder="Enter password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" required>
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="remember" type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> /> 
							<label class="label-checkbox100" for="remember">
								Remember me
							</label>
						</div>

						<div>
							<a href="zuserresetpasswordtoken.php" class="txt1">
								Forgot Username<br>or Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" name="login" value="Login"> 
						</div>
						&nbsp;&nbsp;
						<div class="container-login100-form-btn">
						<button type="button" class="login100-form-btn" onclick="window.location.href='zusersignup.php'">Sign up ?</button>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

</body>
</html>
