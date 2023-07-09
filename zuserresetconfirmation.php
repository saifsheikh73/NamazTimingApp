<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'allcssjs.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Password Reset Confirmation</title>
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-04.jpg);">
					<span class="login100-form-title-1">
                    Your password has been successfully reset
					</span>
				</div>

				<form class="login100-form1" method="POST">
                

                <div class="container-login100-form-btn1">
					<button type="button" class="login100-form-btn custom-btn" onclick="window.location.href='login.php'">Login</button>
                </div>  
						
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>

