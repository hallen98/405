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
//$_SESSION["TeacherID"] = '(Teacher ID from database) ' 	
// 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Archived Classes | AME</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	<title>Archived Classes | AttendMe</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js">          <!-- has image of hamburger menu -->
	</script>
	<link href="ACStyle.css" rel="stylesheet">                                          <!--link to css -->
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
	
	function toggle(source) {
		var checkboxes = document.querySelectorAll('input[type="checkbox"]');
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i] != source)
				checkboxes[i].checked = source.checked;
    }
}
</script>
</head>
<body>
	
	<div id="content">
	
		<div id="hamburgerMenu">
		
			<div id="sidebar" class="sidebar">
			
				<a href="#" id="burger" class = "toggle" onclick="openSlideMenu()">              <!-- hamburger menu -->
					<i class="fas fa-bars"></i>
				</a>
				
			</div>
			
			<div id="menu" class="nav">                                                          <!-- links -->
				<a href="/TeacherHome/teacherHome.php">Current Classes</a>
				<a href="/archivedRoll/ArchivedClasses.php">Archived Classes</a>
				<a href="/Settings/TeacherSettings.php">Settings</a>
				<div class="last">
					<a href="/login/loginpage.php">Logout</a>
				</div>
			</div>
		</div>

		<h1> Archived Classes </h1>
		<div id="archivedClasses">
			<div id= "selector">
				<div id= "startDay">
					<form>
						<label for="startDate">Start Date:</label><br>
						<input type="date" id="startDate" name="startDate">
					</form>
				</div>
				
				<div id= "endDay">
					<form>
						<label for="endDate">End Date:</label><br>
						<input type="date" id="startDate" name="startDate">
					</form>
				</div>
				
				<div id= "quarterSelect">
					<form>
						<label for="quarter">Quarter:</label><br>
						<select id="quarter">
							<option value="Spring 2019">Spring 2019</option>
							<option value="Summer 2019">Summer 2019</option>
							<option value="Fall 2019">Fall 2019</option>
							<option value="Winter 2020">Winter 2020</option>
						</select>
					</form>
				</div>
				
			</div>
				
			<div class="container">
				<table style="width:100%">
					<tr>
						<th><input type="checkbox" onClick="toggle(this)" /> </th>
						<th>Name</th>
						<th>Class Date</th>
						<th>Archived Date</th>
					</tr>
					<tr>
						<td><input type="checkbox" name= "check" />     </td>
						<td>CSC-405-001</td>
						<td>MWF 2:00 - 3:15</td>
						<td>10/15/17</td>
					</tr>
					<tr>
						<td><input type="checkbox" name= "check" />     </td>
						<td>CSC-405-001</td>
						<td>MWF 2:00 - 3:15</td>
						<td>10/15/18</td>
					</tr>
					<tr>
						<td><input type="checkbox" name= "check" />     </td>
						<td>CSC-405-001</td>
						<td>MWF 2:00 - 3:15</td>
						<td>10/15/19</td>
					</tr>
					<tr>
						<td><input type="checkbox" name= "check" />     </td>
						<td>CSC-405-001</td>
						<td>MWF 2:00 - 3:15</td>
						<td>10/15/20</td>
					</tr>
				</table><br>
				<button type="button">Unarchive</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button type="button">Delete</button>
			</div>
		</div>
	</div>
</body>
</html>
