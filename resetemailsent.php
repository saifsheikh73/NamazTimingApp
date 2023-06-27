<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'allcssjs.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Email Sent</title>
</head>
<body>
  
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-04.jpg);">
					<span class="login100-form-title-1">
                    Password Reset Email Sent Successfully
					</span>
				</div>
                
 
				<form class="login100-form1">
					
                <div style="text-align: center;">
                    <span>Kindly check your email and click on the link to reset the password.</span>
                </div>
                <br>
                <br>
                <br>
                <br>

				<div class="container-login100-form-btn1">
					<button type="button" class="login100-form-btn custom-btn" onclick="window.location.href='login.php'">Login</button>
                </div>    

					
				</form>
			</div>
		</div>
	</div>

</body>
</html>
