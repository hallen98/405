<html>
<!-- THIS USES THE DISCORD IMAGE LINK FOR THE LOGO AT THE TOP -->
<h1><center><img src="https://cdn.discordapp.com/attachments/672878316335923221/672905066189029376/Header.png" alt="AMELogo"></center></h1>

<head>
	<meta charset="utf-8">
	<title>Create Account | Attendance Made Easy</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
	<body>
		<div class="signup">
			<h1>Create Account</h1>
			<form action="/login/loginpage.php" method="post">
				<!-- sets up input boxes -->
				<input type="text" name="firstname" placeholder="First Name" id="firstname" required>
				<input type="text" name="lastname" placeholder="Last Name" id="lastname" required>
				<input type="text" name="email" placeholder="Email Address" id="email" required>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="password" name="cfpassword" placeholder="Confirm Password" id="cfpassword" required>
				<!-- creates the radio buttons with input being called "acctype" -->
				<p>
					<input type="radio" id="student" name="acctype" value="student" checked>
					<label for="student">I am a Student.</label><br>
					<input type="radio" id="teacher" name="acctype" value="teacher">
					<label for="teacher">I am a Teacher.</label><br>
				</p>
				<script src="confirmpw.js"></script>
				<input type="submit" value="Submit" href="/login/LoginPage.php">
			</form>
		</div>
	</body>
</html>
