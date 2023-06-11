<?php
include 'conn.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    //$location=$_POST['location'];
    date_default_timezone_set("Asia/Kolkata");
$time = date("d-m-Y h:i:s");

    $sql="UPDATE user1 SET location ='". $_POST['location']."', time='".$time."' WHERE id ='".$_SESSION['id']."'";
    $result=mysqli_query($conn,$sql) or die (mysqli_error($conn));
    
    //header('Location:successfull.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Location Updated</title>
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
<body onload="myFunction()">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-04.jpg);">
					<span class="login100-form-title-1">
						Location Updated <?php echo $_SESSION['username']; ?>
					</span>
					<div class="wrap-container-login100-form-btn">
						<button type="button" class="login100-form-btn" onclick="window.location.href='https://underproof-flowchar.000webhostapp.com/loginsuccessfull.php'">Update Again</button>
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
<script>
    function myFunction(){
        var location="<?php $location = $_GET['location']; echo $location; ?>";
        //alert(location);
        var dataString="location="+location;
        $.ajax({
        url: "update.php",
        type: "post",
        data: dataString,
        success:function(){
		//alert(data);
        	location.reload();
        }
    });
    }
</script>
</body>
</html>
