<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'allcssjs.php';

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
	<title>Reset OTP</title>
</head>
<body>

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
