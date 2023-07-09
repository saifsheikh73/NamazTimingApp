<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'allcssjs.php';

// Fetch user data from the database
$sql = "SELECT * FROM user2 WHERE id = '".$_SESSION['id']."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$userName=$row['username'];
$email=$row['email'];
$password=$row['password'];
$mobileno=$row['mobileno'];
$city = $row['city'];
$zipcode = $row['zipcode'];

if($_SERVER['REQUEST_METHOD']=='POST'){
    
	$userName=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$mobileno=$_POST['mobileno'];
	$city = $_POST['city'];
	$zipcode = $_POST['zipcode'];
    

	$sql="UPDATE user2 SET username ='". $userName."', email ='". $email."', password ='". $password."', mobileno ='". $mobileno."', city ='". $city."', zipcode ='". $zipcode."' WHERE id ='".$_SESSION['id']."'";
    
    
    $result=mysqli_query($conn,$sql) or die (mysqli_error($conn));


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Masjid Details</title>
</head>
<body>
<!--===============================================================================================-->
<!--Languager translator code-->
<div id="google_translate_element"></div>
 
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement(
                {pageLanguage: 'en'},
                'google_translate_element'
            );
        }
    </script>
 
    <script type="text/javascript"
            src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
<!--===============================================================================================-->

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-04.jpg);">
					<span class="login100-form-title-1">
					Edit <?php echo $_SESSION['username']; ?> Details
					</span>
				</div>
                                <form class="login100-form validate-form" method="POST">
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
						<span class="label-input100">Name</span>
						<input class="input100" type="text" name="username" placeholder="Enter your name" value="<?php echo $username; ?>" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
						<span class="label-input100">Email id</span>
						<input class="input100" type="text" name="username" placeholder="Enter you email id" id="req" onKeyUp="checkname();" value="<?php echo $email; ?>" required>
						<span id="name_status"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Mobile no. is required">
						<span class="label-input100">Mobile no.</span>
						<input class="input100" type="number" name="mobileno" placeholder="Enter mobile no." value="<?php echo $mobileno; ?>" required>
						<span class="focus-input100"></span>
					</div>
					
				
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username" id="req" onKeyUp="checkname();" value="<?php echo $userName; ?>" required>
						<span id="name_status"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="text" name="password" placeholder="Enter password" value="<?php echo $password; ?>" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="City is required">
						<span class="label-input100">City</span>
						<input class="input100" type="text" name="city" placeholder="City" value="<?php echo $city; ?>" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Zipcode is required">
						<span class="label-input100">Zipcode</span>
						<input class="input100" type="number" name="zipcode" placeholder="Zipcode" value="<?php echo $zipcode; ?>" required>
						<span class="focus-input100"></span>
					</div>
					

					

					<div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn" value="Update">
                    </div>
                    &nbsp;
					<div class="container-login100-form-btn">
						<button type="button" class="login100-form-btn" onclick="window.location.href='zuserlogin.php'">Edit Namaz Time</button>
					</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <div class="container-login100-form-btn">
                        <input type="button" class="login100-form-btn" name="logout" onclick="window.location.href='zuserlogout.php'" value="Logout">
                    </div>
				</form>
			</div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
  function checkname() {
    var name = document.getElementById("req").value;
    if (name) {
      $.ajax({
        type: 'POST',
        url: 'zusercheckusername.php',
        data: {
          username: name,
        },
        success: function(response) {
          $('#name_status').html(response);
          if (response === '<h6 style="color:red;">User Name Already Exists</h6>') {
            // Disable the submit button
            $("#sub").prop("disabled", true);
          } else {
            // Enable the submit button
            $("#sub").prop("disabled", false);
          }
        }
      });
    }
  }

  $(document).ready(function() {
    // Call the checkname function when the page loads
    checkname();
  });

  $("#form").submit(function(event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Call the checkname function to perform username validation
    checkname();

    // Submit the form if the submit button is enabled
    if (!$("#sub").prop("disabled")) {
      $(this).unbind('submit').submit();
    } else {
      // Scroll to the username input field
      $('html, body').animate({
        scrollTop: $('#req').offset().top
      }, 500);
    }
  });
</script>
</body>
</html>
