<?php
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "SELECT * FROM user1 WHERE reset_token = '" . $_POST['token'] . "'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    
    
    if (mysqli_num_rows($result) > 0) {
        $fetchData = mysqli_fetch_assoc($result);
        $_POST['token'] = $fetchData['reset_token'];
        header("Location: resetpasswordotp.php?token=" . $_POST['token']);
        exit(); // Add this line to stop further script execution
    } else {
        echo '<script>alert("OTP is incorrect or expired.");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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

<style>

.login100-form1 {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  padding: 43px 88px 88px 54px;
}

.login100-form-title-2 {
  font-family: Poppins-Bold;
  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  line-height: 1.2;
  text-align: center;
}

.container-login100-form-btn1 {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 40px;
}

.login100-form-btn {
    padding: 0 20px;
    min-width: 160px;
    height: 50px;
    background-color: #57b846;
    border-radius: 25px;
    font-family: Poppins-Regular;
    font-size: 16px;
    color: #fff;
    line-height: 1.2;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    -moz-transition: all 0.4s;
    transition: all 0.4s;
}

.custom-btn {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #57b846;
}

.custom-btn:hover {
    background-color: #333333;
}
</style>
<style>
  .otp-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 40px;
  }
  
  .otp-input {
    width: 40px;
    height: 40px;
    text-align: center;
    margin: 5px;
    font-size: 18px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
  }
  
  .form-container {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
</style>
    
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-04.jpg);">
					<span class="login100-form-title-1">
                    Enter OTP
					</span>
				</div>
                
 
				<form class="login100-form1" method="POST">
        <div class="container">
    <div class="form-container">
        <div class="otp-container">
        <input class="otp-input" type="text" id="digit1" maxlength="1" onkeyup="moveToNext(this, 'digit2', '')" required>
        <input class="otp-input" type="text" id="digit2" maxlength="1" onkeyup="moveToNext(this, 'digit3', 'digit1')" required>
        <input class="otp-input" type="text" id="digit3" maxlength="1" onkeyup="moveToNext(this, 'digit4', 'digit2')" required>
        <input class="otp-input" type="text" id="digit4" maxlength="1" onkeyup="moveToNext(this, 'digit5', 'digit3')" required>
        <input class="otp-input" type="text" id="digit5" maxlength="1" onkeyup="moveToNext(this, 'digit6', 'digit4')" required>
        <input class="otp-input" type="text" id="digit6" maxlength="1" onkeyup="moveToNext(this, 'digit6', 'digit5')" required>

        <input type="hidden" id="token" name="token">
        </div>
    </div>
    <br>
    <br>
</div>

<script>
    function moveToNext(currentInput, nextInputId, prevInputId) {
        if (event.keyCode === 8 && currentInput.value.length === 0) {
            document.getElementById(prevInputId).focus();
            document.getElementById(prevInputId).value = ''; // Clear the value of the previous input field
        } else if (currentInput.value.length === currentInput.maxLength) {
            document.getElementById(nextInputId).focus();
        }
    }
</script>




				<div class="container-login100-form-btn1">
						<input type="submit" class="login100-form-btn" value="Submit"> 
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

<script>
// Get references to the individual digit inputs and the combined OTP input
const digit1 = document.getElementById('digit1');
const digit2 = document.getElementById('digit2');
const digit3 = document.getElementById('digit3');
const digit4 = document.getElementById('digit4');
const digit5 = document.getElementById('digit5');
const digit6 = document.getElementById('digit6');
const token = document.getElementById('token');

// Listen for input events on each individual digit input
digit1.addEventListener('input', combineDigits);
digit2.addEventListener('input', combineDigits);
digit3.addEventListener('input', combineDigits);
digit4.addEventListener('input', combineDigits);
digit5.addEventListener('input', combineDigits);
digit6.addEventListener('input', combineDigits);

// Function to combine the digit inputs into a single field
function combineDigits() {
  const otpValue =
    digit1.value +
    digit2.value +
    digit3.value +
    digit4.value +
    digit5.value +
    digit6.value;

  token.value = otpValue;
}

</script>

</body>
</html>
