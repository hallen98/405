<!-- php connection initialization --> 
<?php
session_start();
$servername = "138.47.204.77";
$username = "commit";
$password = "TempP@ss124";
$dbname = "attendancemadeeasy";

//Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection 
if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT fname FROM attendancemadeeasy.usertable";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
	//output data of each row
	while($row = $result->fetch_assoc())
	{
		echo "<p align='center'>".$row("fname")."</p>";
	}
}
else 
{
	echo "0 results";
}
$conn->close();

// session variables 
//$_SESSION["StudentID"] = '(Student ID from database) ' 	
// 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Settings | AttendMe</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js">       <!-- has image of hamburger menu -->
	</script>
	<link href="Style.css" rel="stylesheet">                                       <!--link to css -->
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
			document.getElementById('content').style.marginLeft = '0'
		}
	}

</script>
</head>
<body>

	<div id="content">
		<div id="sidebar" class="sidebar">

			<a href="#" id="burger" class = "toggle" onclick="openSlideMenu()">         <!-- hamburger menu -->
				<i class="fas fa-bars"></i>
			</a>

		</div>

		<div id="menu" class="nav">                                                     <!-- links -->
			<a href="/StudentHome/StudentHome.php">Home</a>
			<a href="/Settings/StudentSettings.php">Settings</a>
			<div class="last">
				<a href="/login/loginpage.php">Logout</a>
				<?php
				session_unset();
				session_destroy();
				?>
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
