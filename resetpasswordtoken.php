<?php

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
        $username = "questio2_id20710658_db"; 
        $password = "questio2_id20710658_db"; 
        $database = "questio2_namaz_db"; 
        // Create connection 
        $conn = new mysqli($servername, $username, $password, $database); 
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
        $stmt->execute();
$stmt->bind_result($email); // Replace with actual column names
$stmt->fetch();
$result = [$email]; // Store the results in an array or use them as needed


        
        
        if ($result->num_rows == 0) {
            echo "Email does not exist.";
        } else {
            // Generate and store a password reset token
            $resetToken = generateResetToken(); // Replace this with your actual token generation code
            $expiryTime = date('Y-m-d H:i:s', strtotime('+1 hour')); // Set the expiry time for the token

            // Store the reset token and expiry time in the database
            $query = "UPDATE user1 SET reset_token = ?, reset_expiry = ? WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sss", $resetToken, $expiryTime, $email);
            $stmt->execute();

            // Send a password reset email to the user
            //$resetLink = "resetpassword.php?token=" . $resetToken; // Replace with your actual reset password page URL
            //$emailContent = "Click the following link to reset your password: " . $resetLink; // Customize the email content as needed
            //$emailSubject = "Password Reset";
            // Send the email using your preferred email sending method (e.g., PHPMailer, mail() function)
            // Replace the placeholders with your actual email sending code
            include'mail2.php';
            // Redirect the user to a confirmation page
            header("Location: resetconfirmation.php");  
            exit();
        }

        $stmt->close();
        $conn->close();
    }
}

// Function to generate a random reset token
function generateResetToken() {
    $length = 32; // Length of the token
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>
<body>
    <h2>Reset Your Password</h2>
    <form method="POST">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <input type="submit" value="Reset Password">
        </div>
    </form>
</body>
</html>
