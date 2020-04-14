<?php
session_start();
$userID = /*$_SESSION["userID"]*/ "2";
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

$sql = "SELECT  c1.className, c1.weekday, c1.classTime, s1.location
FROM attendencemadeeasy.student_attended s1, attendencemadeeasy.class c1
WHERE s1.idStudent = '$userID' AND c1.archived = 0 AND c1.idclasses = s1.classes_id;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<p style='text-align: center'> some rows </p>";
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<p style='text-align: center'>" . $row["className"] . "</p>";
		echo "<p style='text-align: center'>" . $row["weekday"] . "</p>";
		echo "<p style='text-align: center'>" . $row["classTime"] . "</p>";
	}
} else {
	echo "0 results";
}

$conn->close();
$name = $firstName . ' ' . $lastName;
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
			<a href="#">Settings</a>
			<div class="last">
				<a href="/login/loginpage.php">Logout</a>
			</div>
		</div>
		
		<!-- !!!!!!!!!!!! START OF PAGE CONTENT !!!!!!!!!!!! -->
		
		<h1 style="text-align: center"> Welcome <?php echo $name; ?></h1>
		
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
		function toggleVisibility() {
			var x = document.getElementById('classcode');
			if (x.style.visibility === 'hidden') {
				x.style.visibility = 'visible';
			} else {
				x.style.visibility = 'hidden';
			}
		}
		</script>
		
		<!-- !!!!!! EXAMPLE TABLE !!!!!! -->
		<center>
				<?php
					echo '<table class="ctable" style="width:70%; border-collapse: collapse;">';
					echo '<tr>';
					echo '<th>'.'<input type="checkbox" onClick="toggle(this)">'.'</th>';
					echo '<th>Class</th>';
					echo '<th>Time</th>';
					echo '<th>Last Check In</th>';
					echo '<th>Checked In Today</th>';
					echo '</tr>';
					foreach ($classes as $value){
						echo '<tr class="tableRow">';
						echo '<td class="checkBoxes"><input type="checkbox" name="checkclass" value="class2"></td>';
						echo '<td>CSC-405-002</td>';
						echo '<td>MWF 10-11:15 AM</td>';
						echo '<td>2/1/2020</td>';
						echo '<td><img src="x.png" alt="X"></td>';
						echo '</tr>';
					}
					echo '<tr class="tableRow">';
					echo '<td><button class="acbtn" onClick="toggleVisibility()">Add Class</button></td>';
					echo '<td><input type="text" name="classcode" placeholder="Class Code" class="classcode" id="classcode"></td>';
					echo '<td></td>';
					echo '<td></td>';
					echo '<td></td>';
					echo '</tr>';
					echo '<tr>';
					echo '<th><button class="delbtn">Delete Class</button></th>';
					echo '</tr>';
					echo '</table>';
				?>
		</center>
	</div>
</body>
</html>
