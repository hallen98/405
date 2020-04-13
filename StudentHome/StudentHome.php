<!-- php connection initialization --> 
<?php
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
	<title>Home | Attendence Made Easy</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	<link href="HMStyle.css" rel="stylesheet">                                      <!--link to css -->
	<link href="SHStyle.css" rel="stylesheet">
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
		
			<a href="#" id="burger" class = "toggle" onclick="openSlideMenu()">       <!-- hamburger menu -->
				<i class="fas fa-bars"></i>
			</a>
			
		</div>
		
		<div id="menu" class="nav">                                                   <!-- links -->
			<a href="/StudentHome/StudentHome.php">Home</a>
			<a href="/Settings/StudentSettings.php">Settings</a>
			<div class="last">
				<a href="/login/loginpage.php">Logout</a>
			</div>
		</div>
		
		<!-- !!!!!!!!!!!! START OF PAGE CONTENT !!!!!!!!!!!! -->
		
		<h1><center> Welcome Mike O'Neal </center></h1>
		
		<center><button class="cibtn">Check In To: CSC-405-001</button></center>		<!-- Check in button -->
		<br><br>
		
		<!-- SCRIPT FOR CHECK ALL BOX -->
		<script language="JavaScript">
		function toggle(source) {
			checkboxes = document.getElementsByName('checkclass');
			for(var i=0, n=checkboxes.length;i<n;i++) {
				checkboxes[i].checked = source.checked;
			}
		}
		</script>
		
		<!-- !!!!!! EXAMPLE TABLE !!!!!! -->
		<center>
			<table class="ctable" style="width:70%; border-collapse: collapse;">
				<tr>
					<th><input type="checkbox" onClick="toggle(this)"></th>
					<th>Class</th>
					<th>Time</th>
					<th>Last Check In</th>
					<th>Checked In Today</th>
				</tr>
				<tr class="tableRow">
					<td class="checkBoxes"><input type="checkbox" name="checkclass" value="class1"></td>
					<td>CSC-405-001</td>
					<td>MWF 2:00-3:15 PM</td>
					<td>2/2/2020</td>
					<td><img src="check.png" alt="Check"></td>
				</tr>
				<tr class="tableRow">
					<td class="checkBoxes"><input type="checkbox" name="checkclass" value="class2"></td>
					<td>CSC-450-003</td>
					<td>MWF 10:00-11:15 AM</td>
					<td>2/2/2020</td>
					<td><img src="check.png" alt="Check"></td>
				</tr>
				<tr class="tableRow">
					<td class="checkBoxes"><input type="checkbox" name="checkclass" value="class3"></td>
					<td>CSC-123-456</td>
					<td>MWF 8:00-9:15 AM</td>
					<td>2/1/2020</td>
					<td><img src="x.png" alt="X"></td>
				</tr>
				<!-- ADDS THE ADD CLASS BUTON AND TEXT INPUT TO LINE UP WITH THE FIRST TWO COLUMBS IN THE TABLE -->
				<tr class="tableRow">
					<td><button class="acbtn">Add Class</button></td>
					<td><input style="visibility: hidden;"type="text" name="classcode" placeholder="Class Code" id="classcode"></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th><button class="delbtn">Delete Class</button></th>
				</tr>
		</center>
		
		
	</div>
</body>
</html>
