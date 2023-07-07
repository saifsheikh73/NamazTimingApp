<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'allcssjs.php';

// Check if the logout parameter is set in the POST request
/*if (isset($_POST['logout'])) {
    session_start();
    unset($_SESSION["username"]);
    header("location:logincookie1.php");
    exit();
}*/

date_default_timezone_set('Asia/Kolkata');


// Fetch user data from the database
$sql = "SELECT * FROM user1 WHERE id = '".$_SESSION['id']."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Assign values to variables
$fajrtime = $row['fajr'];
$zohartime = $row['zohar'];
$asrtime = $row['asr'];
$maghribtime = $row['maghrib'];
$ishatime = $row['isha'];
$jumatime = $row['juma'];
$aelaan=$row['aelaan'];

$date = date("Y-m-d");

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

    $aelaan=$_POST['aelaan'];

  
    
    $sql="UPDATE user1 SET fajr ='". $formatted_fajrtime."', zohar ='". $formatted_zohartime."', asr ='". $formatted_asrtime."', maghrib ='". $formatted_maghribtime."', isha ='". $formatted_ishatime."', juma ='". $formatted_jumatime."', aelaan ='". $aelaan."', timestamp ='". $date."' WHERE id ='".$_SESSION['id']."'";
    
    
    $result=mysqli_query($conn,$sql) or die (mysqli_error($conn));
    
    //header('Location:locationupdated.php');
    //echo "<script>alert('Location is updated successfully.');</script>";
    //echo"<script>window.location.href='timingupdated.php';</script>";
    
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Namaz Time</title>    
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

                    <div class="wrap-input1001 validate-input m-b-26" data-validate="Time is required">
                        <span class="label-input100">Fajr</span>
                        <div class="input-group clockpicker" data-target="#TimePickerInput">
                        <input type="text" class="timepicker form-control1" id="picker1" data-theme="dark" name="fajr" placeholder="Fajr" value="<?php echo $fajrtime; ?>">
                        </div>
                    </div>

                    <div class="wrap-input1001 validate-input m-b-26" data-validate="Time is required">
                        <span class="label-input100">Zohar</span>
                        <div class="input-group clockpicker" data-target="#TimePickerInput">
                        <input type="text" class="timepicker form-control1" id="picker1" data-theme="dark" name="zohar" placeholder="Zohar" value="<?php echo $zohartime; ?>">
                        </div>
                    </div>

                    <div class="wrap-input1001 validate-input m-b-26" data-validate="Time is required">
                        <span class="label-input100">Asr</span>
                        <div class="input-group clockpicker" data-target="#TimePickerInput">
                        <input type="text" class="timepicker form-control1" id="picker1" data-theme="dark" name="asr" placeholder="Asr" value="<?php echo $asrtime; ?>">
                        </div>
                    </div>

                    <div class="wrap-input1001 validate-input m-b-26" data-validate="Time is required">
                        <span class="label-input100">Maghrib</span>
                        <div class="input-group clockpicker" data-target="#TimePickerInput">
                        <input type="text" class="timepicker form-control1" id="picker1" data-theme="dark" name="maghrib" placeholder="Maghrib" value="<?php echo $maghribtime; ?>">
                        </div>
                    </div>

                    <div class="wrap-input1001 validate-input m-b-26" data-validate="Time is required">
                        <span class="label-input100">Isha</span>
                        <div class="input-group clockpicker" data-target="#TimePickerInput">
                        <input type="text" class="timepicker form-control1" id="picker1" data-theme="dark" name="isha" placeholder="Isha" value="<?php echo $ishatime; ?>">
                        </div>
                    </div>

                    <div class="wrap-input1001 validate-input m-b-26" data-validate="Time is required">
                        <span class="label-input100">Juma</span>
                        <div class="input-group clockpicker" data-target="#TimePickerInput">
                        <input type="text" class="timepicker form-control1" id="picker1" data-theme="dark" name="juma" placeholder="Juma" value="<?php echo $jumatime; ?>">
                        </div>
                    </div>
                    <!--Do not delete below line. It is for ok button of clock <div id="loggerTxt"></div> -->
                    <div id="loggerTxt"></div>

                    <div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Aelaan</span>
						<input class="input100" type="text" name="aelaan" placeholder="Enter details" value="<?php echo $aelaan; ?>">
						<span class="focus-input100"></span>
					</div>

                    <div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn" value="Update" onclick="showPopup()">
                    </div>
                    <script>
                      function showPopup() {
                            alert("Updated");
                              }
                    </script>

                    &nbsp;

                    <div class="container-login100-form-btn">
                        <input type="button" class="login100-form-btn" onclick="window.location.href='EditMasjidDetails.php'" value="Edit Masjid Details">
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <div class="container-login100-form-btn">
                        <input type="button" class="login100-form-btn" name="logout" onclick="window.location.href='logout.php'" value="Logout">
                    </div>
                    &nbsp;

                </form>
            </div>
        </div>
    </div>

   
<!--Include Bootstrap and FontAwesome CDNs -->
<link rel="stylesheet" type="text/css" href="clock2/mdtimepicker.css">
	<link rel="stylesheet" type="text/css" href="clock2/mdtimepicker-theme.css">
	<style type="text/css">
		html,
		body {
			min-height: 100%;
			background-color: #f5f5f5;
		}
		body {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}
		.stats { margin-bottom: 12px; }
		.stats a { text-decoration: none; }
		.stats a + a { margin-left: 8px; }
		#logger { margin-top: 24px; }
		#logger span { display: block; }
		#logger textarea {
			width: 400px;
			max-width: 100%;
			margin-top: 4px;
			resize: none;
		}
	</style>


<script type="text/javascript" src="clock2/mdtimepicker.js"></script>
	<script type="text/javascript">
	mdtimepicker.defaults({ theme: 'green', hourPadding: true, clearBtn: true });
	function log (message) {
		document.querySelector('#loggerTxt').value = message
	}

	window.onload = function () {
		mdtimepicker('#picker1', {
			events: {
				timeChanged: function (data) {
					console.log('timeChanged', data)
					log('timeChanged: ' + data.value)
				}
			}
		})
		// mdtimepicker('#picker1', 'setValue', '12:00 PM')

		mdtimepicker('#picker2', { readOnly: false, is24hour: true, //format: 'h:mm tt',
			events: {
				ready: function() { console.log('ready', this) },
				shown: function() { console.log('shown', this) },
				hidden: function() { console.log('hidden', this) },
				timeChanged: function (data) {
					console.log('timeChanged', data)
					log('timeChanged: ' + data.value)
				}
			}
		})
	}
	</script>

</body>

</html>
