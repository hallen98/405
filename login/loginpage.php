<html>
<!-- THIS USES THE DISCORD IMAGE LINK FOR THE LOGO AT THE TOP -->
<h1><center><img src="https://cdn.discordapp.com/attachments/672878316335923221/672905066189029376/Header.png" alt="AMELogo"></center></h1>

<head>
	<meta charset="utf-8">
	<title>Login | Attendance Made Easy</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<!-- marks the entire section as a form and sets up php submittion -->
			<form action="/StudentHome/StudentHome.php" method="post">
				<!-- creates the input boxes with css file style -->
				<input type="text" name="email" placeholder="Email" id="email" required>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<!-- links for the reset password and sign up !!!!!! MAY HAVE TO BE CHANGED !!!!!! -->
				<p>
					<a href="/resetpassword">Reset Password</a>
					<br>Don't have an account? <a href="/signup/signup.php">Sign up here!</a>
					<br><input type="checkbox" name="rememberbox" value="remember">
					<label for="rememberbox">Remember me</label>
				</p>
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>