<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'conn.php';
include 'allcssjs.php';

//This is updated with password_verify

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql1 = "SELECT * FROM user1 WHERE username='" . $_POST['username'] . "'";
    $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
    if (mysqli_num_rows($result1) > 0) {
        $fetchData = mysqli_fetch_assoc($result1);
        if (password_verify($_POST['member_password'], $fetchData['password'])) {
            $_SESSION['id'] = $fetchData['id'];
            $_SESSION['username'] = $fetchData['username'];
            header("location:loginsuccessfull.php");
        } else {
            $message = "Invalid Login";
        }
    }
}

if (isset($_SESSION["username"])) {
    header("location:loginsuccessfull.php");
}

if (isset($_POST["login"])) {
    if (!empty($_POST["username"]) && !empty($_POST["member_password"])) {
        $name = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["member_password"]);
        $sql = "SELECT * FROM user1 WHERE username='" . $_POST['username'] . "'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result);
        if ($user) {
            if (!empty($_POST["remember"])) {
                setcookie("member_login", $name, time() + (10 * 365 * 24 * 60 * 60));
                setcookie("member_password", $password, time() + (10 * 365 * 24 * 60 * 60));
                $_SESSION["username"] = $name;
            } else {
                if (isset($_COOKIE["member_login"])) {
                    setcookie("member_login", "");
                }
                if (isset($_COOKIE["member_password"])) {
                    setcookie("member_password", "");
                }
            }
            header("location:loginsuccessfull.php");
        } else {
            $message = "Invalid Login";
        }
    } else {
        $message = "Both are Required Fields";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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

				<form class="login100-form validate-form" method="POST" id="frmLogin">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="member_password" placeholder="Enter password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" required>
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="remember" type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> /> 
							<label class="label-checkbox100" for="remember">
								Remember me
							</label>
						</div>

						<div>
							<a href="resetpasswordtoken.php" class="txt1">
								Forgot Username<br>or Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" name="login" value="Login"> 
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
	

</body>
</html>
