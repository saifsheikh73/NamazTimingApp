<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'allcssjs.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process the form data
    $email = $_POST['email'];
    

    // Validate the form inputs
    if (empty($email)) {
        echo "Email is required.";
    } else {
        // Check if the email exists in the database
        // Perform your database query to check if the email exists
        // Replace the placeholders with your actual database connection code
        $servername = "localhost"; 
        $username1 = "questio2_id20710658_db"; 
        $password = "questio2_id20710658_db"; 
        $database = "questio2_namaz_db"; 
        // Create connection 
        $conn = new mysqli($servername, $username1, $password, $database); 
        // Check connection 
        if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error); } 
        
        $mailHost = 'mail.questiondrive.com'; // Specify main and backup SMTP servers
        $mailUsername = 'questio2'; // SMTP username
        $mailPassword = 'NamazTiming'; // SMTP password
        $mailSMTPSecure = 'tls'; // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
        $mailPort = 587; // TCP port to connect to
        
        $query = "SELECT * FROM user1 WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        $stmt2 = $conn->prepare("SELECT username FROM user1 WHERE email = ?");
        $stmt2->bind_param("s", $email);
        $stmt2->execute();
        $stmt2->store_result();

        if ($stmt->num_rows == 0) {
            //echo "Email does not exist.";
            echo'<script>alert("Email does not exist.")</script>';
        } else {
            // Generate and store a password reset token
            $resetToken = generateResetToken(); // Replace this with your actual token generation code
            $expiryTime = date('Y-m-d H:i:s', strtotime('+1 hour')); // Set the expiry time for the token

            // Store the reset token and expiry time in the database
            $query = "UPDATE user1 SET reset_token = ?, reset_expiry = ? WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sss", $resetToken, $expiryTime, $email);
            $stmt->execute();

            $stmt2->bind_result($username);
            $stmt2->fetch();

            // Send a password reset email to the user
            $resetLink = "namaz.questiondrive.com/resetpassword.php?token=" . $resetToken; // Replace with your actual reset password page URL
            /*$emailContent = "Click the following link to reset your password: " . $resetLink; // Customize the email content as needed
            $emailSub = "Password Reset";*/
            $resetOTP = $resetToken; // Replace with your actual reset password page URL
            $emailContent = '<p style="font-size: 16px;">Hello,<br>Your username is <strong style="font-size: 18px;">' . $username . '</strong></p>';
            $emailContent .= '<p style="font-size: 16px;">Your OTP to reset password is <strong style="font-size: 18px;">' . $resetOTP . '</strong></p>';
            $emailContent .= '<p style="font-size: 16px;">Click on the button below to enter the OTP for password reset:</p><br>';
            $emailContent .= '<a href="' . $resetLink . '" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 4px; font-size: 16px;">Reset Password</a>';
            $emailSub = "Password Reset OTP";

            // Redirect the user to a confirmation page
            header("Location: resetotp.php");

            // Send the email using your preferred email sending method (e.g., PHPMailer, mail() function)
            // Replace the placeholders with your actual email sending code
            include'mail.php';
            
            exit();
        }

        $stmt->close();
        $stmt2->close();
        $conn->close();
    }
}

// Function to generate a random reset token
/*function generateResetToken() {
    $length = 32; // Length of the token
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $token = '';
    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $token;
}*/

// Function to generate OTP
function generateResetToken() {
    $length = 6; // Length of the token
    $characters = '0123456789';
    $token = '';
    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $token;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Password Token</title>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-04.jpg);">
					<span class="login100-form-title-1">
						Reset Your Password
					</span>
				</div>

				<form class="login100-form validate-form" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
						<span class="label-input100">Email id: </span>
						<input class="input100" type="text" name="email" placeholder="Enter email id" required>
						<span class="focus-input100"></span>
					</div>

					

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="Send email"> 
						</div>
						
					</div>
				</form>
			</div>
		</div>
	</div>


</body>
</html>
