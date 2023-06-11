<?php
include 'conn.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    
    $fajrtime=$_POST['fajr'];
    $formatted_fajrtime = date("h:i A", strtotime($fajrtime));
    
    $zohartime=$_POST['zohar'];
    $formatted_zohartime = date("h:i A", strtotime($zohartime));
    
    $asrtime=$_POST['asr'];
    $formatted_asrtime = date("h:i A", strtotime($asrtime));
    
    $maghribtime=$_POST['maghrib'];
    $formatted_maghribtime = date("h:i A", strtotime($maghribtime));
    
    $ishatime=$_POST['isha'];
    $formatted_ishatime = date("h:i A", strtotime($ishatime));
    
    $jumatime=$_POST['juma'];
    $formatted_jumatime = date("h:i A", strtotime($jumatime));
    
    
    
    $result=mysqli_query($conn,$sql) or die (mysqli_error($conn));
    
    //header('Location:locationupdated.php');
    //echo "<script>alert('Location is updated successfully.');</script>";
    //echo"<script>window.location.href='locationupdated.php';</script>";
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Update location</title>
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
						 <?php echo $_SESSION['username']; ?>
					</span>
                             </div>  

				<form class="login100-form validate-form" method='POST'>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Time is required">
						<span class="label-input100">Fajr</span>
						<input class="input100"  name="fajr" placeholder="<?php echo $_SESSION['$formatted_jumatime']; ?>">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Time is required">
						<span class="label-input100">Zohar</span>
						<input class="input100" type="time" name="zohar" placeholder="Zohar">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Time is required">
						<span class="label-input100">Asr</span>
						<input class="input100" type="time" name="asr" placeholder="Asr">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Time is required">
						<span class="label-input100">Maghrib</span>
						<input class="input100" type="time" name="maghrib" placeholder="Maghrib">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Time is required">
						<span class="label-input100">Isha</span>
						<input class="input100" type="time" name="isha" placeholder="Isha">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Time is required">
						<span class="label-input100">Juma</span>
						<input class="input100" type="time" name="juma" placeholder="Juma">
						<span class="focus-input100"></span>
					</div>
						
				<div class="container-login100-form-btn">
				    
						<input type="submit" class="login100-form-btn" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</div>&nbsp;
						
						
					

					

					
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
