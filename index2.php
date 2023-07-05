<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome</title>
<style>
body, html {
  margin: 0;
  padding: 0;
  height: 100%;
}

.container {
  position: relative;
  width: 100%;
  height: 100%;
  overflow: hidden;
}

.background-image {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: url(images/bgfull.jpg);
  background-size: cover; /* Image covers the entire container */
  background-repeat: no-repeat; /* Prevent image from repeating */
}

.content {
  position: relative;
  padding: 20px;
  text-align: center;
  color: #ffffff;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}
</style>
</head>
<body>
	<div class="login100-form-title">
		<div class="background-image">
			<div class="content">
				<button type="button" onclick="window.location.href='login.php'">Masjid login</button>
				<br><br><br><br><br><br>
				<button type="button" onclick="window.location.href='view_users.php'">Jama'at Timing</button>
			</div>
		</div>
	</div>
</body>
</html>
