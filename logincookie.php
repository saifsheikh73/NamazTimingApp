<?php
include 'conn.php';

// Check if the "Remember Me" cookie exists and automatically log in the user if the remembercookie is valid
if (isset($_COOKIE['remember_me'])) {
    // Retrieve the remembercookie from the cookie
    $remembercookie = $_COOKIE['remember_me'];

    // Look up the remembercookie in the database
    $query = "SELECT * FROM user1 WHERE remembercookie = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $remembercookie);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // remembercookie is valid, log the user in
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];

        // Redirect to the logged-in page
        header("Location: loginsuccessfull.php");
        exit();
    } else {
        // Clear the invalid "Remember Me" cookie
        $cookieName = "remember_me";
        setcookie($cookieName, '', time() - 3600, '/');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "SELECT * FROM user1 WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $_POST['username'], $_POST['pass']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $fetchData = $result->fetch_assoc();
        $_SESSION['id'] = $fetchData['id'];
        $_SESSION['username'] = $fetchData['username'];

        // Check if "Remember Me" checkbox is checked
        if (isset($_POST['remember'])) {
            // Generate a secure remembercookie
            $remembercookie = bin2hex(random_bytes(32));

            // Store the remembercookie in the database
            $query = "UPDATE user1 SET remembercookie = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("si", $remembercookie, $_SESSION['id']);
            $stmt->execute();
            $stmt->close();

            // Set the remembercookie as a cookie
            $cookieName = "remember_me";
            $cookieValue = $remembercookie;
            $cookieExpiration = time() + (30 * 24 * 60 * 60); // 30 days
            setcookie($cookieName, $cookieValue, $cookieExpiration, '/');
        }

        // Redirect to the logged-in page
        header("Location: loginsuccessfull.php");
        exit();
    } else {
        echo '<script>alert("Username or Password is incorrect.")</script>';
    }
}
?>

<!-- Your HTML code... -->


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
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-04.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>

				<form class="login100-form validate-form" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password" required>
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="remember" type="checkbox" name="remember">
							<label class="label-checkbox100" for="remember">
								Remember me
							</label>
						</div>

						<div>
							<a href="resetpasswordremembercookie.php" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="Login"> 
						</div>
						&nbsp;&nbsp;
						<div class="container-login100-form-btn">
						<button type="button" class="login100-form-btn" onclick="window.location.href='signup.php'">Sign up ?</button>
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
