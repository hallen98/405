<?php
//Start and get session variables
session_start();
$userID = $_SESSION["userID"];

//Info to connect to server
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
	//echo "0 results";
}

$className = [];
$weekday = [];
$classTime = [];
$classes_id = [];

$sql = "SELECT  c1.className, c1.weekday, c1.classTime, s1.classes_idclasses 
FROM attendencemadeeasy.student_inclass s1, attendencemadeeasy.class c1
WHERE s1.sid = '$userID' AND c1.archived = 0 AND c1.idclasses = s1.classes_idclasses";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	//echo "<p style='text-align: center'> some rows </p>";
	// output data of each row
	while($row = $result->fetch_assoc()) {
		array_push($className, $row["className"]);
		array_push($weekday, $row["weekday"]);
		array_push($classTime, $row["classTime"]);
		array_push($classes_id, $row["classes_idclasses"]);
		//echo "<p style='text-align: center'>" . $row["className"] . "</p>";
		//echo "<p style='text-align: center'>" . $row["weekday"] . "</p>";
		//echo "<p style='text-align: center'>" . $row["classTime"] . "</p>";
	}
} else {
	//echo "0 results";
}
$attended = [];
$date = date("Y-m-d");
foreach($classes_id as $value){
	$sql = "SELECT location FROM attendencemadeeasy.student_attended WHERE idStudent = '$userID' AND classes_id = '$value' AND date = '$date' LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($attended, $row["location"]);
		}
	} else {
		//echo "0 results";
	}
}
$conn->close();
$name = $firstName . ' ' . $lastName;
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home | AttendME</title>
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
				<a href="/logout.php">Logout</a>
			</div>
		</div>
		
		<!-- !!!!!!!!!!!! START OF PAGE CONTENT !!!!!!!!!!!! -->
		
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
		function deleteClasses(i) {
			var classIds = <?php echo json_encode($classes_id);?>;
			var classesToDelete = [];
			for(var j=0; j < i; j++){
				eachCheckbox = document.getElementById('checkbox' + j);
				if(eachCheckbox.checked){
					classesToDelete.push(classIds[j]);
				}
			}
			document.getElementById("delete").value = classesToDelete;
		}
		function getLocation() {
			if(navigator.geolocation){
				navigator.geolocation.getCurrentPosition(showPosition);
			}else{
				x.innerHTML = "Geolocation is not supported by this browser.";
			}
		}
		function showPosition(position){/*
			console.log("Latitude: " + position.coords.latitude);
			console.log("Longitude: " + position.coords.longitude;*/
		}
		</script>
		
		<h1 style="text-align: center"> Welcome <?php echo $name; ?></h1>
		<?php
		$today = date("l");
		$time = date("H:i:s");
		switch($today){
			case "Monday":
				$today = "M";
				break;
			case "Tuesday":
				$today = "T";
				break;
			case "Wednesday":
				$today = "W";
				break;
			case "Thursday":
				$today = "R";
				break;
			case "Friday":
				$today = "F";
				break;
			default:
				$today = "Weekend";
		}
		for ($k=0; $k<count($className); $k++){
			if((stripos($weekday[($k)], $today) !== false) and ($attended[($k)] != '1') and (($time >= $classTime[($k)]) and ($time < (date('H:i:s',strtotime('+30 minute',strtotime($classTime[($k)]))))))){
				echo '<form action="/StudentHome/checkInto.php" method="post">';
				echo '<input value="'.$classes_id[($k)].'" type="hidden" name="checkInto">';
				echo '<center><button type="submit" class="cibtn" onClick="getLocation()">Check In To: '.$className[($k)].'</button></center>';
				echo '</form>';
			}
		}
		?>
		<br><br>
	
		<!-- !!!!!! EXAMPLE TABLE !!!!!! -->
		<center>
				<?php
					echo '<table class="ctable" style="width:85%; border-collapse: collapse;">';
					echo '<tr>';
					echo '<th>'.'<input type="checkbox" onClick="toggle(this)">'.'</th>';
					echo '<th>Class</th>';
					echo '<th>Time</th>';
					//echo '<th>Last Checked In</th>';
					echo '<th>Checked In Today</th>';
					echo '</tr>';
					for ($i=0; $i<count($className); $i++){
						echo '<form action="/StudentHome/redirect.php" method="post">';
						echo '<tr class="tableRow">';
						echo '<td class="checkBoxes"><input type="checkbox" id="checkbox' . $i . '" name="checkclass" value="class2"></td>';
						echo '<td>' . $className[($i)] .'</td>';
						echo '<td>' . $weekday[($i)] . ' ' . date('h:i a', strtotime($classTime[($i)])) .'</td>';
						if($attended[($i)] == '1'){
							echo '<td><img src="check.png" alt="Check"></td>';
						}else{
							echo '<td><img src="x.png" alt="X"></td>';
						}
						echo '<input type="hidden" name="classID" value="'.$classes_id[($i)].'"> </input>';
						echo '<th style="text-align: center;"><button class="acbtn">Roll</button></th>';
						echo '</tr>';
						echo '</form>';
					}
					echo '<tr class="tableRow">';
					echo '<td><button class="acbtn" onClick="toggleVisibility()">Add Class</button></td>';
					echo '<form action="/StudentHome/addClass.php" method="post">';
					echo '<td><input type="text" name="classcode" placeholder="Class Code" class="classcode" id="classcode"></td>';
					echo '</form>';
					echo '<td></td>';
					echo '<td></td>';
					//echo '<td></td>';
					echo '<td></td>';
					echo '</tr>';
					echo '<tr>';
					echo '<form action="/StudentHome/deleteClasses.php" method="post">';
					echo '<th><button onClick="deleteClasses('.$i.')" class="delbtn">Delete Class</button></th>';
					echo '<input type="hidden" name="result[]" id="delete">';
					echo '</form>';
					echo '</tr>';
					echo '</table>';
				?>
		</center>
	</div>
</body>
</html>
