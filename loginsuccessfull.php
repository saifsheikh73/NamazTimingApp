<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'allcssjs.php';

// Check if the logout parameter is set in the POST request
if (isset($_POST['logout'])) {
    // Perform logout actions
    session_unset(); // Clear all session variables
    session_destroy(); // Destroy the session

    // Redirect the user to the desired page after logout
    header("Location: login.php");
    exit();
}


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
$elaan=$row['elaan'];

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

    $elaan=$_POST['elaan'];
    
    $sql="UPDATE user1 SET fajr ='". $formatted_fajrtime."', zohar ='". $formatted_zohartime."', asr ='". $formatted_asrtime."', maghrib ='". $formatted_maghribtime."', isha ='". $formatted_ishatime."', juma ='". $formatted_jumatime."', elaan ='". $elaan."' WHERE id ='".$_SESSION['id']."'";
    
    
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
                        <input type="text" class="form-control" id="TimePickerInput" name="fajr" placeholder="Fajr" value="<?php echo $fajrtime; ?>">
                        </div>
                    </div>

                    <div class="wrap-input1001 validate-input m-b-26" data-validate="Time is required">
                        <span class="label-input100">Zohar</span>
                        <div class="input-group clockpicker" data-target="#TimePickerInput">
                        <input type="text" class="form-control" id="TimePickerInput" name="zohar" placeholder="Zohar" value="<?php echo $zohartime; ?>">
                        </div>
                    </div>

                    <div class="wrap-input1001 validate-input m-b-26" data-validate="Time is required">
                        <span class="label-input100">Asr</span>
                        <div class="input-group clockpicker" data-target="#TimePickerInput">
                        <input type="text" class="form-control" id="TimePickerInput" name="asr" placeholder="Asr" value="<?php echo $asrtime; ?>">
                        </div>
                    </div>

                    <div class="wrap-input1001 validate-input m-b-26" data-validate="Time is required">
                        <span class="label-input100">Maghrib</span>
                        <div class="input-group clockpicker" data-target="#TimePickerInput">
                        <input type="text" class="form-control" id="TimePickerInput" name="maghrib" placeholder="Maghrib" value="<?php echo $maghribtime; ?>">
                        </div>
                    </div>

                    <div class="wrap-input1001 validate-input m-b-26" data-validate="Time is required">
                        <span class="label-input100">Isha</span>
                        <div class="input-group clockpicker" data-target="#TimePickerInput">
                        <input type="text" class="form-control" id="TimePickerInput" name="isha" placeholder="Isha" value="<?php echo $ishatime; ?>">
                        </div>
                    </div>

                    <div class="wrap-input1001 validate-input m-b-26" data-validate="Time is required">
                        <span class="label-input100">Juma</span>
                        <div class="input-group clockpicker" data-target="#TimePickerInput">
                        <input type="text" class="form-control" id="TimePickerInput" name="juma" placeholder="Juma" value="<?php echo $jumatime; ?>">
                        </div>
                    </div>

                    <div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Elaan</span>
						<input class="input100" type="text" name="elaan" placeholder="Enter details" value="<?php echo $elaan; ?>">
						<span class="focus-input100"></span>
					</div>

                    <div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                    &nbsp;

                    <div class="container-login100-form-btn">
                        <input type="button" class="login100-form-btn" onclick="window.location.href='EditMasjidDetails.php'" value="Edit Masjid Details">
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn" name="logout" value="Logout">
                    </div>
                    &nbsp;

                </form>
            </div>
        </div>
    </div>

   
<!--Include Bootstrap and FontAwesome CDNs -->
<link rel="stylesheet" href="clockscripts/1.css" />
<link rel="stylesheet" href="clockscripts/2.css" />
<link rel="stylesheet" href="clockscripts/3.css" />
<script src="clockscripts1/.js"></script>
<script src="clockscripts/2.js"></script>
<script src="clockscripts/3.js"></script>

<script>
  $(document).ready(function() {
    $('.clockpicker').clockpicker({
      autoclose: true,
      twelvehour: true,
      donetext: 'Done'
    }); 
  });
</script>


</body>

</html>
