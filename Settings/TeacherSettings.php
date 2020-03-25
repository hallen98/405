<!DOCTYPE html>
<html>
<head>
	<title>Settings | AttendMe</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js">          <!-- has image of hamburger menu -->
	</script>
	<link href="Style.css" rel="stylesheet">                                          <!--link to css -->
<script>
	function openSlideMenu(){
		var e = document.getElementById('menu').style.width;
		if (e == '200px')
		{
			document.getElementById('sidebar').style.width = '75px'
			document.getElementById('menu').style.width = '0'
			document.getElementById('menu').style.marginLeft= '0'
			document.getElementById('content').style.marginLeft = '0'
		}
		else
		{
			document.getElementById('sidebar').style.width = '75px'
			document.getElementById('menu').style.width = '200px'
			document.getElementById('menu').style.marginLeft= '75px'
			document.getElementById('content').style.marginLeft = '0px'
		}
	}

</script>
</head>
<body>

	<div id="content">

		<div id="sidebar" class="sidebar">

			<a href="#" id="burger" class = "toggle" onclick="openSlideMenu()">              <!-- hamburger menu -->
				<i class="fas fa-bars"></i>
			</a>

		</div>

		<div id="menu" class="nav">                                                          <!-- links -->
			<a href="/TeacherHome/teacherHome.php">Current Classes</a>
			<a href="/archivedClasses/ArchivedClasses.php">Archived Classes</a>
			<a href="/Settings/TeacherSettings.php">Settings</a>
			<div class="last">
				<a href="/login/LoginPage.php">Logout</a>
			</div>
		</div>
		<H1> Profile Settings</H1>

		<div id = "DeleteWrapper">
			<div class="RedBoxed">
				Delete Account
				<input type="checkbox" id="Delete" name="Delete">
			</div><br>
			By checking the box, AttendMe will <br>
			permanently delete your account and it <br>
			<b>CANNOT BE UNDELETED</b>, by checking <br>
			the box you understand and agree to <br>
			the terms above
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>

		<div class="Input">
			<form action=#>
				<input type="text" id="FirstName" name="FirstName" placeholder="First Name"><br><br>
				<input type="text" id="LastName" name="LastName" placeholder="Last Name"><br><br><br><br><br><br><br><br><br><br>
				<input type="text" id="NewEmail" name="NewEmail" placeholder="New Email"><br><br>
				<input type="text" id="ConfirmEmail" name="ConfirmEmail" placeholder="Confirm Email"><br><br><br><br><br><br><br><br><br><br>
				<input type="password" id="NewPassword" name="NewPassword" placeholder="New Password"><br><br>
				<input type="password" id="ConfirmPassword" name="ConfirmPassword" placeholder="Confirm Password">
			</form>
		</div>

		<div id = "ButtonWrapper">
			<button type="button">Confirm Changes</button>
		</div>
	</div>
</body>
</html>
