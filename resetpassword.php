<?php
include 'conn.php';

// Check if the reset token is provided in the URL
if (!isset($_GET['token'])) {
    // Handle the case when the reset token is missing
    echo "Reset token is missing.";
    // You can redirect the user to an error page or display an error message here
    exit;
}

$resetToken = $_GET['token'];

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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form method="POST" action="">
        <input type="hidden" name="token" value="<?php echo $resetToken; ?>">
        <label for="password">New Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
        <br>
        <input type="submit" value="Reset Password">
    </form>
</body>
</html>
