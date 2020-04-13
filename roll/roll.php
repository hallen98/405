<!--Roll page -->
<!-- Code by Michael McCrary -->
<!--Hamburger menu code done by group member Noah Broussard -->

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
	<title>Roll | AttendME</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js">
	</script>
	<link href="roll.css" rel="stylesheet">
	<script>
		function openSlideMenu() {
			var e = document.getElementById('menu').style.width;
			if (e == '200px') {
				document.getElementById('sidebar').style.width = '75px'
				document.getElementById('menu').style.width = '0'
				document.getElementById('menu').style.marginLeft = '0'
				document.getElementById('content').style.marginLeft = '0'
			}
			else {
				document.getElementById('sidebar').style.width = '75px'
				document.getElementById('menu').style.width = '200px'
				document.getElementById('menu').style.marginLeft = '75px'
				document.getElementById('content').style.marginLeft = '0px'
			}
		}

	</script>
</head>

<body>

	<div id="content">

		<div id="sidebar" class="sidebar">

			<a href="#" id="burger" class="toggle" onclick="openSlideMenu()">
				<!-- hamburger menu -->
				<i class="fas fa-bars"></i>
			</a>

		</div>

		<div id="menu" class="nav">
			<!-- links -->
			<a href="/TeacherHome/teacherHome.php">Current Classes</a>
			<a href="/archivedClasses/ArchivedClasses.php">Archived Classes</a>
			<a href="/Settings/TeacherSettings.php">Settings</a>
			<div class="last">
				<a href="/login/loginpage.php">Logout</a>
			</div>
		</div>


		<!-- Header of Page Section with AME title -->
		<h1 style="text-align: center">CSC-406-002</h1>

		<table class="center">
			<tr>
				<th>
					<p>Student Name</p>
				</th>
				<th>
					<p>3/16</p>
				</th>
				<th>
					<p>3/17</p>
				</th>
				<th>
					<p>3/18</p>
				</th>
				<th>
					<p>3/19</p>
				</th>
				<th>
					<p>3/20</p>
				</th>
				<th>
					<p>3/21</p>
				</th>
				<th>
					<p>3/22</p>
				</th>
				<th>
					<p>3/23</p>
				</th>
				<th>
					<p>3/24</p>
				</th>
				<th>
					<p>3/25</p>
				</th>
				<th>
					<p>3/26</p>
				</th>
				<th>
					<p>3/27</p>
				</th>
				<th>
					<p>3/28</p>
				</th>
				<th>
					<p>3/29</p>
				</th>
				<th>
					<p>3/30</p>
				</th>
			</tr>
			<tr>
				<td>
					<p>Hunter Allen</p>
				</td>
				<td>
					<p>x</p>
				</td>
				<td>
					<p>x</p>
				</td>
				<td>
					<p>-</p>
				</td>
				<td>
					<p>x</p>
				</td>
				<td>
					<p>x</p>
				</td>
				<td>
					<p>x</p>
				</td>
				<td>
					<p>-</p>
				</td>
				<td>
					<p>x</p>
				</td>
				<td>
					<p>x</p>
				</td>
				<td>
					<p>-</p>
				</td>
				<td>
					<p>x</p>
				</td>
				<td>
					<p>x</p>
				</td>
				<td>
					<p>-</p>
				</td>
				<td>
					<p>x</p>
				</td>
				<td>
					<p>x</p>
				</td>
			</tr>
			<td>
				<p>Ross Piraino</p>
			</td>
			<td>
				<p>-</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>-</p>
			</td>
			<td>
				<p>-</p>
			</td>
			<td>
				<p>-</p>
			</td>
			<td>
				<p>-</p>
			</td>
			<td>
				<p>-</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>-</p>
			</td>
			<td>
				<p>-</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>-</p>
			</td>
			<td>
				<p>-</p>
			</td>
			<td>
				<p>x</p>
			</td>
			</tr>
			<td>
				<p>Mike O'Neal</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			</tr>
			<td>
				<p>Bob Ross</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>-</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>x</p>
			</td>
			<td>
				<p>-</p>
			</td>
			<td>
				<p>x</p>
			</td>
			</tr>
			<tr>
				<td><button class="ExportBtn">Export to CSV</button></td>
			</tr>
		</table>
	</div>
</body>

</html>
