<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'allcssjs.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome</title>
</head>
<body>

<style>
.wrap-login1001 {
  width: 670px;
  background: #fff;
  border-radius: 0px;
  overflow: hidden;
  position: relative;
  height: 100vh;
}

</style>
   
	<div>
		<div class="container-login100cust">
			<div class="wrap-login1001">
				<div class="login100-form-titlecust" style="background-image: url(images/bgfull.jpg);">
					
				<div class="wrap-container-login100-form-btn">
					<button type="button" class="login100-form-title-1cust" onclick="window.location.href='login.php'">Masjid login</button>&nbsp;
				</div>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				<div class="wrap-container-login100-form-btn">
					<button type="button" class="login100-form-title-1cust" a href="#" onclick="showInstructions();">Masjids near me</button>&nbsp;
				</div>
				<br><br><br>
				<div class="wrap-container-login100-form-btn">
					<button type="button" class="login100-form-title-1cust" onclick="window.location.href='view_users.php'">Jama'at Timing</button>
				</div>
					
			</div>
		</div>
	</div>
	<!-- Popup modal -->
<div id="instructionModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="hideInstructions();">&times;</span>
    <p>To find Masjids near you, please enable GPS on your mobile device, wait for 5 seconds and then click the button below:</p>
    <div class="button-container">
      <a href="https://www.google.com/maps/search/masjids+near+me" class="custom-button" target="_blank">Go to Maps</a>
    </div>
  </div>
</div>

<script>
function showInstructions() {
  var modal = document.getElementById("instructionModal");
  modal.style.display = "block";
}

function hideInstructions() {
  var modal = document.getElementById("instructionModal");
  modal.style.display = "none";
}
</script>
</body>
</html>