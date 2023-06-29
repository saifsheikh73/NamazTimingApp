<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'allcssjs.php';

// Fetch user data from the database
$sql = "SELECT * FROM user1 WHERE id = '".$_SESSION['id']."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$elaan=$row['elaan'];


if($_SERVER['REQUEST_METHOD']=='POST'){
    
	$elaan=$_POST['elaan'];
    

	$sql="UPDATE user1 SET elaan ='". $elaan."' WHERE id ='".$_SESSION['id']."'";
    
    
    $result=mysqli_query($conn,$sql) or die (mysqli_error($conn));


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Masjid Details</title>
</head>
<body>
<!--===============================================================================================-->
<!--Languager translator code-->
<div id="google_translate_element"></div>
 
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement(
                {pageLanguage: 'en'},
                'google_translate_element'
            );
        }
    </script>
 
    <script type="text/javascript"
            src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
<!--===============================================================================================-->

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-04.jpg);">
					<span class="login100-form-title-1">
					Edit <?php echo $_SESSION['username']; ?> Details
					</span>
				</div>
                                <form class="login100-form validate-form" method="POST">
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
						<span class="label-input100">Elaan</span>
						<input class="input100" type="text" name="elaan" placeholder="Enter details" value="<?php echo $elaan; ?>" required>
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn" value="Update">
                    </div>
                    &nbsp;
					<div class="container-login100-form-btn">
						<button type="button" class="login100-form-btn" onclick="window.location.href='loginsuccessfull.php'">Edit Namaz Time</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	

</body>
</html>
