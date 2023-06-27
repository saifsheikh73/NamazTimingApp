<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'allcssjs.php';

// Check if the reset token is provided in the URL
if (!isset($_GET['token'])) {
    // Handle the case when the reset token is missing
	echo '<script>alert("Reset token is missing.");</script>';
    // You can redirect the user to an error page or display an error message here
    exit;
}

$resetToken = $_GET['token'];

// Get the current time minus one hour
$expirationTime = date('Y-m-d H:i:s', strtotime('-2 hour'));
$sql2 = "UPDATE user1 SET reset_token = NULL, reset_expiry = NULL WHERE reset_token IS NOT NULL AND reset_expiry < ?";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("s", $expirationTime);
$stmt2->execute();
// Check the number of affected rows
$affectedRows = $stmt2->affected_rows;

$sql1 = "SELECT * FROM user1 WHERE reset_token = ? AND reset_expiry > NOW()";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("s", $resetToken);
$stmt1->execute();
$stmt1->store_result();

if ($stmt1->num_rows === 0) {
    // The token is expired
    echo '<script>alert("Reset token has expired.");</script>';
	echo '<script>window.location.href = "resetotp.php";</script>';
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
$stmt2->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Password OTP</title>
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
	
</body>
</html>

