<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'allcssjs.php';
include 'allcssjs2.php';

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

$pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title> <!--- Example CSS -->
  <style>
  body {
    padding: 1em;
  }
  .spaced > .button {
    margin-bottom: 1em;
  }
  </style>

  <!--- Example Javascript -->
  <script>
  $(document)
    .ready(function() {
      $('.ui.dropdown').dropdown();

      $('.ui.buttons .dropdown.button').dropdown({
        action: 'combo'
      });
    })
  ;
  </script>
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
                                <form class="login100-form validate-form" id="form" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
						<span class="label-input100">Primary Email</span>
						<input class="input100" type="email" name="email" placeholder="Enter primary email" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Mobile no. is required">
						<span class="label-input100">Primary Mobile no.</span>
						<input class="input100" type="number" name="mobileno" placeholder="Enter primary mobile no." required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Secondary Email (Optional)</span>
						<input class="input100" type="email" name="email2" placeholder="Enter secondary email" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Secondary Mobile no. (Optional)</span>
						<input class="input100" type="number" name="mobileno2" placeholder="Enter secondary mobile no.">
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



<div class="wrap-input1001 validate-input m-b-26" data-validate="State is required">
    <span class="label-input100">State</span>
    <div class="ui search selection dropdown input100" id="stateDropdown">
        <input type="hidden" name="state">
        <div class="default text">Select State</div>
        <i class="dropdown icon"></i>
        <div class="menu">
        <?php

try {

    // Fetch distinct pincodes from the database
    $stmt = $pdo->query("SELECT DISTINCT state FROM allcities");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='item' data-value='{$row['state']}'>{$row['state']}</div>";
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
        </div>
    </div>
    <span class="focus-input100"></span>
</div>


<div class="wrap-input1001 validate-input m-b-26" data-validate="City is required">
    <span class="label-input100">City</span>
    <div class="ui search selection dropdown input100" id="cityDropdown">
        <input type="hidden" name="city">
        <div class="default text">Select City</div>
        <i class="dropdown icon"></i>
        <div class="menu">
        <?php

try {
    
    // Fetch distinct pincodes from the database
    $stmt = $pdo->query("SELECT DISTINCT city FROM allcities");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='item' data-value='{$row['city']}'>{$row['city']}</div>";
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
        </div>
    </div>
    <span class="focus-input100"></span>
</div>



<div class="wrap-input1001 validate-input m-b-26" data-validate="Zipcode is required">
    <span class="label-input100">Zipcode</span>
    <div class="ui search selection dropdown input100" id="zipcodeDropdown">
        <input type="hidden" name="zipcode">
        <div class="default text">Select Zipcode</div>
        <i class="dropdown icon"></i>
        <div class="menu">
        <?php

        try {

            // Fetch distinct pincodes from the database
            $stmt = $pdo->query("SELECT DISTINCT pincode FROM allcities");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='item' data-value='{$row['pincode']}'>{$row['pincode']}</div>";
            }
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
        ?>
        </div>
    </div>
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
  

	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
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
