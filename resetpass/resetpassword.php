<html>
<!-- THIS USES THE DISCORD IMAGE LINK FOR THE LOGO AT THE TOP -->
<h1><center><img src="https://cdn.discordapp.com/attachments/672878316335923221/672905066189029376/Header.png" alt="AMELogo"></center></h1>

<head>
	<meta charset="utf-8">
	<title>Reset Password | AttendME</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
	<body>
		<div class="resetpass">
			<h1>Reset Password</h1>
			<form action="/resetpass/resetpassword.php" method="post">
				<!-- sets up input boxes -->
				<input type="text" name="email" placeholder="Email Address" id="email" required>
				<input type="password" name="password" placeholder="New Password" id="password" required>
				<input type="password" name="cfpassword" placeholder="Confirm New Password" id="cfpassword" required>
				<script src="confirmpw.js"></script>
				<input type="submit" value="Submit" href="/login/LoginPage.php">
			</form>
		</div>
	</body>
</html>