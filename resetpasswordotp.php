<?php
include 'conn.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the reset token is provided in the URL
if (!isset($_GET['token'])) {
    // Handle the case when the reset token is missing
    echo "Reset token is missing.";
    // You can redirect the user to an error page or display an error message here
    exit;
}

$resetToken = $_GET['token'];



$sql1 = "SELECT * FROM user1 WHERE reset_token = ? AND reset_expiry > NOW()";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("s", $resetToken);
$stmt1->execute();
$result1 = $stmt1->get_result();

if ($result1->num_rows == 0) {
    // The token is expired
    echo "Reset token has expired.";
    // You can redirect the user to an error page or display an error message here
    exit;
}

// Validate the form inputs and perform password reset logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form inputs
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Perform necessary validations and checks
    if (empty($password) || empty($confirmPassword)) {
        echo "Please enter both password fields.";
        exit;
    }
    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit;
    }

// Your password reset logic goes here
// Assuming the password reset is successful, you can handle the success scenario
// For example, update the password in the database and display a success message

// Retrieve the user information from the database based on the reset token
$resetToken = $_GET['token'];
$query = "SELECT * FROM user1 WHERE reset_token = '$resetToken'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Reset token is valid, proceed with password update

    // Retrieve the user's ID
    $user = mysqli_fetch_assoc($result);
    $userId = $user['id'];

    // Retrieve the new password from the form input
    $newPassword = $_POST['password'];

    // Hash the new password
    //$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the password in the database
    $updateQuery = "UPDATE user1 SET password = '$newPassword' WHERE id = '$userId'";
    mysqli_query($conn, $updateQuery);

    // Display a success message to the user
    echo "Password reset successful. You can now log in with your new password.";
} else {
    // Invalid reset token
    echo "Invalid reset token.";
}


    header("Location: resetconfirmation.php");
    exit;
}
$stmt1->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Password</title>
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
						Reset Password
					</span>
				</div>

				<form class="login100-form validate-form" method="POST">
                <input type="hidden" name="token" value="<?php echo $resetToken; ?>">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter new password" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" name="confirm_password" placeholder="Repeat password" required>
						<span class="focus-input100"></span>
					</div>

					

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="Reset"> 
						</div>
					</div>
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

</body>
</html>

