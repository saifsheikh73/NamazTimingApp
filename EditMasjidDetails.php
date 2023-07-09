<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'allcssjs.php';

// Fetch user data from the database
$sql = "SELECT * FROM user1 WHERE id = '".$_SESSION['id']."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$userName=$row['username'];
$email=$row['email'];
$mobileno=$row['mobileno'];
$email2=$row['email2'];
$mobileno2=$row['mobileno2'];
$password=$row['password'];
$masjidname = $row['masjidname'];
$address = $row['address'];
$city = $row['city'];
$zipcode = $row['zipcode'];
$state = $row['state'];
$addresslink = $row['addresslink'];
$forladies = $row['forladies'];


if($_SERVER['REQUEST_METHOD']=='POST'){
    
	$userName=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$mobileno=$_POST['mobileno'];
	$email2=$_POST['email2'];
	$mobileno2=$_POST['mobileno2'];
	$masjidname = $_POST['masjidname'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$zipcode = $_POST['zipcode'];
	$state = $_POST['state'];
	$addresslink = $_POST['addresslink'];
	$forladies = $row['forladies'];
    

	$sql="UPDATE user1 SET username ='". $userName."', email ='". $email."', password ='". $password."', mobileno ='". $mobileno."', email2 ='". $email2."', mobileno2 ='". $mobileno2."', masjidname ='". $masjidname."', address ='". $address."', city ='". $city."', zipcode ='". $zipcode."', state ='". $state."', addresslink ='". $addresslink."' WHERE id ='".$_SESSION['id']."'";
    
    
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
						<span class="label-input100">Primary Email</span>
						<input class="input100" type="text" name="email" placeholder="Enter primary email" value="<?php echo $email; ?>" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Mobile no. is required">
						<span class="label-input100">Primary Mobile no.</span>
						<input class="input100" type="number" name="mobileno" placeholder="Enter primary mobile no." value="<?php echo $mobileno; ?>" required>
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Secondary Email</span>
						<input class="input100" type="text" name="email2" placeholder="Enter secondary email" value="<?php echo $email2; ?>">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Secondary Mobile no.</span>
						<input class="input100" type="number" name="mobileno2" placeholder="Enter secondary mobile no." value="<?php echo $mobileno2; ?>">
						<span class="focus-input100"></span>
					</div>
					
					
					

				<form class="login100-form validate-form">
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
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="Masjid name is required">
						<span class="label-input100">Masjid name</span>
						<input class="input100" type="text" name="masjidname" placeholder="Masjid name" value="<?php echo $masjidname; ?>" required>
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="Address is required">
						<span class="label-input100">Masjid Address</span>
						<input class="input100" type="text" name="address" placeholder="Address" value="<?php echo $address; ?>" required>
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
					<div class="wrap-input100 validate-input m-b-26" data-validate="State is required">
						<span class="label-input100">State</span>
						<input class="input100" type="text" name="state" placeholder="State" value="<?php echo $state; ?>" required>
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="Map address link is required">
						<span class="label-input100">Masjid Address maps link</span>
						<input class="input100" type="text" name="addresslink" placeholder="Masjid Address maps link" value="<?php echo $addresslink; ?>" required>
						<span class="focus-input100"></span>
					</div>	
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="Field is required">
						<span class="label-input100">Space for Masturaat</span>
						<input class="input100" type="text" name="forladies" placeholder="Yes/No" value="<?php echo $forladies; ?>" required>
						<!--<input  type="radio" name="forladies" value=Yes placeholder="Yes" required> Yes
						<input  type="radio" name="forladies" value=No placeholder="No" required> No-->
					</div>	
					

					

					<div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn" value="Update">
                    </div>
                    &nbsp;
					<div class="container-login100-form-btn">
						<button type="button" class="login100-form-btn" onclick="window.location.href='loginsuccessfull.php'">Edit Namaz Time</button>
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
        url: 'checkusername.php',
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
