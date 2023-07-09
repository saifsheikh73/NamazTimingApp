<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'allcssjs.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up Successfull</title>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-04.jpg);">
					<span class="login100-form-title-1">
						Sign Up Successfull
					</span>
				
			
					
					<div class="wrap-container-login100-form-btn">
						<button type="button" class="login100-form-btn" style="position:relative;left:0px;" onclick="redirect()">Login</button> 
						
					</div>
				</form>
			</div>
		</div>
	</div>
	
<script type="text/javascript">
	function redirect(){
		window.location.href="zuserlogin.php";
	}
</script>
</body>
</html>
