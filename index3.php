<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome</title>
	<style>
		body {
			margin: 0;
			padding: 0;
		}

		.background-container {
			background-image: url(images/bgfull.jpg);
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center;
			height: 100vh;
		}

		.content-container {
			height: 100%;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
		}

		.button-container {
			margin: 200px 0;
		}

		.button-container button {
			margin: 5px;
			color: white;
			background-color: transparent;
			border: none;
			font-size: 120px;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<div class="background-container">
		<div class="content-container">
			<div class="button-container">
				<button type="button" onclick="window.location.href='login.php'">Masjid Login</button>
			</div>
			<div class="button-container">
				<button type="button" onclick="window.location.href='view_users.php'">Jamaa'at Timing</button>
			</div>
		</div>
	</div>
</body>
</html>
