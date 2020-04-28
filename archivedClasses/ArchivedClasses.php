<?php
session_start();
$userID = /*$_SESSION["userID"]*/ "1";
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
$sql = "SELECT fname, lname FROM attendencemadeeasy.usertable WHERE uid = '$userID'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		$firstName = $row["fname"];
		$lastName = $row["lname"];
	}
} else {
	echo "0 results";
}

$classes = SELECT className FROM attendencemadeeasy.class WHERE tid_class = $userID;
$dates = SELECT classTime FROM attendencemadeeasy.class WHERE tid_class = $userID;
$archivedDate = SELECT dataarchived FROM attendencemadeeasy.class WHERE tid_class = $userID;

#-------------- TEMP HARD CODED VALUES --------------

$tclasses = ["CSC 405 001", "CSC 365 003", "CSC 420 069"]
$tdates = ["MWF 2-3:15", "TR 12-1:50", "MWF 1-2:15"]
$tarchivedDate = ["12/17/2019", "3/16/2020", "4/20/6969"]

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
					<a href="/login/LoginPage.php">Logout</a>
				</div>
			</div>
		</div>

		<h1> Archived Classes </h1>
		<div id="archivedClasses">
			</div>
			<div class="container">
				<table style="width:90%" class="center">
				<tr>
					<th><input type="checkbox" onClick="toggle(this)" /> </th>
					<th>Name</th>
					<th>Class Date</th>
					<th>Archived Date</th>
				</tr>
			<?php
			for ($i=0; $i<count($classes); $i++){
				echo "<tr>"
				echo <<<EOT <td><input type="checkbox" name="checkedClasses[]" value="$classes[$i]"></td> EOT;
				echo "<td>\"$dates[$i]\"</td>"
				echo "<td>\"$archivedDate[$i]\"</td>"
				echo "</tr>"
			}
			?>
			<!--
			<div class="container">
				<table style="width:90%" class="center">
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
				-->
				<form method="post" action="">
				<button type="unarchive" name="unarchive" value="unarchive">Unarchive</button>
				<?php
					if(isset($_POST['unarchive'])){
						if(!empty($_POST['checkedClasses'])) {
							foreach($_POST['checkedClasses'] as $class){
								UPDATE class SET dataarchived = NULL, archived = 0 WHERE idclasses = $class;
							}
						}
					}
				?>
				<button type="deleteClass" name="deleteClass" value="deleteClass">Delete</button>
				<?php
					if(isset($_POST['deleteClass'])){
						if(!empty($_POST['checkedClasses'])) {
							foreach($_POST['checkedClasses'] as $class){
								DELETE * FROM attendancemadeeasy.class WHERE idclasses = $class;
							}
						}
					}
				?>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
