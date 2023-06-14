<?php

//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

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
        $username = "root";
        $password = "";
        $database = "id20710658_db";

        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = "SELECT * FROM user1 WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

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
            $resetLink = "resetpassword.php?token=" . $resetToken; // Replace with your actual reset password page URL

            // Configure PHPMailer
            require 'PHPMailer/src/Exception.php';
            require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/SMTP.php';

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Specify your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'saifurrahmansheikh7@gmail.com'; // Your SMTP username
            $mail->Password = 'Malignant@1997'; // Your SMTP password
            $mail->SMTPSecure = 'tls'; // Encryption type (tls or ssl)
            $mail->Port = 587; // SMTP port (typically 587 for TLS encryption)
            $mail->setFrom('saifurrahmansheikh7@gmail.com', 'NamazTimingApp'); // Set the sender's email and name
            $mail->addAddress($email); // Add the recipient's email

            $mail->Subject = 'Password Reset';
            $mail->Body = 'Click the following link to reset your password: ' . $resetLink;

            if (!$mail->send()) {
                echo "Failed to send password reset email.";
                echo $email;
            } else {
                echo "Password reset email sent successfully.";
            }

            // Redirect the user to a confirmation page
            //header("Location: resetconfirmation.php");
            //exit;
        }

        $stmt->close();
        $conn->close();
    }
}

// Function to generate a random reset token
function generateResetToken()
{
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
    <form method="POST" action="">
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
