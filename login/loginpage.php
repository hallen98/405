<?php
session_start();
$servername = "138.47.204.77";
$username = "commit";
$password = "TempP@ss124";
$dbname = "attendencemadeeasy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
} else {
	echo "0 results";
}
$conn->close();

?>


<html>
<!-- THIS USES THE DISCORD IMAGE LINK FOR THE LOGO AT THE TOP -->
<h1><center><img src="https://cdn.discordapp.com/attachments/672878316335923221/672905066189029376/Header.png" alt="AMELogo"></center></h1>

<head>
	<meta charset="utf-8">
	<title>Login | Attendance Made Easy</title>
	<link href = "LPStyle.css" rel="stylesheet" type="text/css">
</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<!-- marks the entire section as a form and sets up php submittion -->
			<form action="validation.php" method="post">
				<!-- creates the input boxes with css file style -->
				<input type="text" name="email" placeholder="Email" id="email" required>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<!-- links for the reset password and sign up !!!!!! MAY HAVE TO BE CHANGED !!!!!! -->
				<p>
					<a href="/resetpass/resetpassword.php">Reset Password</a>
					<br>Don't have an account? <a href="/signup/Signup.php">Sign up here!</a>
					<br><input type="checkbox" name="rememberbox" value="remember">
					<label for="rememberbox">Remember me</label>
				</p>
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>
