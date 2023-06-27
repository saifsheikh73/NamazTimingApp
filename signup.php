<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'allcssjs.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $userName=$_POST['username'];
    $email=$_POST['email'];
   $password=$_POST['pass'];
    $sql="INSERT INTO user1 (userName,email,email2,mobileno,mobileno2,password,masjidname,address,city,zipcode,state,addresslink,forladies) VALUES
    ('".$_POST['username']."',
    '".$_POST['email']."',
    '".$_POST['email2']."',
    '".$_POST['mobileno']."',
    '".$_POST['mobileno2']."',
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
					<div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
						<span class="label-input100">Primary Email</span>
						<input class="input100" type="text" name="email" placeholder="Enter primary email" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Mobile no. is required">
						<span class="label-input100">Primary Mobile no.</span>
						<input class="input100" type="text" name="mobileno" placeholder="Enter primary mobile no." required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Secondary Email (Optional)</span>
						<input class="input100" type="text" name="email2" placeholder="Enter secondary email" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Secondary Mobile no. (Optional)</span>
						<input class="input100" type="text" name="mobileno2" placeholder="Enter secondary mobile no.">
						<span class="focus-input100"></span>
					</div>
					
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
						<input class="input100" type="text" name="forladies" placeholder="Yes/No" required>
						<!--<input  type="radio" name="forladies" value=Yes placeholder="Yes" required> Yes
						<input  type="radio" name="forladies" value=No placeholder="No" required> No-->
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
