<?php
include'conn.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $userName=$_POST['username'];
    $email=$_POST['email'];
   $password=$_POST['pass'];
    $sql="INSERT INTO user1 (userName,email,password,masjidname,address,city,zipcode,state,addresslink,forladies) VALUES
    ('".$_POST['username']."',
    '".$_POST['email']."',
    '".$_POST['pass']."',
    '".$_POST['masjidname']."',
    '".$_POST['address']."',
    '".$_POST['city']."',
    '".$_POST['zipcode']."',
    '".$_POST['state']."',
    '".$_POST['addresslink']."',
    '".$_POST['forladies']."')";
    $result=mysqli_query($conn,$sql) or die (mysqli_error($conn));
    echo"<script>window.location.href='successfull.php';</script>";
    //header('Location:successfull.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-04.jpg);">
					<span class="login100-form-title-1">
						Sign Up
					</span>
				</div>
                                <form class="login100-form validate-form" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Email/Mobile no. is required">
						<span class="label-input100">Email/Mobile no.</span>
						<input class="input100" type="text" name="email" placeholder="Enter email/mobile no." required>
						<span class="focus-input100"></span>
					</div>
					
					
					

				<form class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username" id="req" onKeyUp="checkname();" required>
						<span id="name_status"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password" required>
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="Masjid name is required">
						<span class="label-input100">Masjid name</span>
						<input class="input100" type="text" name="masjidname" placeholder="Masjid name" required>
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="Address is required">
						<span class="label-input100">Masjid Address</span>
						<input class="input100" type="text" name="address" placeholder="Address" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="City is required">
						<span class="label-input100">City</span>
						<input class="input100" type="text" name="city" placeholder="City" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Zipcode is required">
						<span class="label-input100">Zipcode</span>
						<input class="input100" type="text" name="zipcode" placeholder="Zipcode" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="State is required">
						<span class="label-input100">State</span>
						<input class="input100" type="text" name="state" placeholder="State" required>
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="Map address link is required">
						<span class="label-input100">Masjid Address maps link</span>
						<input class="input100" type="text" name="addresslink" placeholder="Masjid Address maps link" required>
						<span class="focus-input100"></span>
					</div>	
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="Field is required">
						<span class="label-input100">Space for Masturaat</span>
						<input  type="radio" name="forladies" value=Yes placeholder="Yes" required> Yes
						<input  type="radio" name="forladies" value=No placeholder="No" required> No
					</div>	
					

					

					<div class="container-login100-form-btn">
						<input type="submit" id="sub" class="login100-form-btn" value="Sign Up">
						</div>
						&nbsp;&nbsp;
						<div class="container-login100-form-btn">
						<button type="button" class="login100-form-btn" onclick="window.location.href='login.php'">Already Signed up?</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<script type="text/javascript">
      function checkname()
{
 var name=document.getElementById( "req" ).value;
 if(name)
 {
  $.ajax({
  type: 'POST',
  url: 'checkdata.php',
  data: {
   user_name:name,
  },
  success: function (response) {
   $( '#name_status' ).html(response);
   if(response == '<h6 style="color:red;">User Name Already Exist</h6>'){
   $("#sub").click(function(event){
    event.preventDefault();
});
 }
 if(response == ''){
  $('#sub').unbind('click');
 }
  }
  });
 }
}
 
    </script>
</body>
</html>
