<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);   

session_start();
if(isset($_SESSION["admin_name"]))
{
 header("location:Remembermetest/home.php");
}
$connect = mysqli_connect("localhost", "root", "", "id20710658_db");  
if(isset($_POST["login"]))   
{  
 if(!empty($_POST["member_name"]) && !empty($_POST["member_password"]))
 {
  $name = mysqli_real_escape_string($connect, $_POST["member_name"]);
  $password = md5(mysqli_real_escape_string($connect, $_POST["member_password"]));
  $sql = "Select * from admin_login where admin_name = '" . $name . "' and admin_password = '" . $password . "'";  
  $result = mysqli_query($connect,$sql);  
  $user = mysqli_fetch_array($result);  
  if($user)   
  {  
   if(!empty($_POST["remember"]))   
   {  
    setcookie ("member_login",$name,time()+ (10 * 365 * 24 * 60 * 60));  
    setcookie ("member_password",$password,time()+ (10 * 365 * 24 * 60 * 60));
    $_SESSION["admin_name"] = $name;
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
   header("location:Remembermetest/home.php"); 
  }  
  else  
  {  
   $message = "Invalid Login";  
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
	<title>Login cookie</title>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>

				<form class="login100-form validate-form" method="POST"  id="frmLogin">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="member_name" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="member_password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="form-group">  
     <input type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />  
     <label for="remember-me">Remember me</label>  
    </div>  

						<div>
							<a href="resetpasswordremembercookie.php" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
                    <div><input type="submit" name="login" value="Login" class="btn btn-success"></span></div>  
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
