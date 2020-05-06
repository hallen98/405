<?php
session_start();
$userID = $_SESSION["userID"];
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
$classes = [];
$archivedDate = [];
$classes_id = [];
$sql = "SELECT idclasses, className, dataarchived FROM attendencemadeeasy.class WHERE tid_class = '$userID' AND archived = '1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		array_push($classes_id, $row["idclasses"]);
		array_push($classes, $row["className"]);
		array_push($archivedDate, $row["dataarchived"]);
	}
} else {
	echo "0 results";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Archived Classes | AME</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	<title>Archived Classes | AttendMe</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js">
	</script>
	<link rel="stylesheet" type="text/css" href="/archivedClasses/ACStyle.css">                                          <!--link to css -->
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
function archiveClasses(i) {
	var classIds = <?php echo json_encode($classes_id);?>;
	var classesToDelete = [];
	for(var j=0; j < i; j++){
		eachCheckbox = document.getElementById('checkbox' + j);
		if(eachCheckbox.checked){
			classesToDelete.push(classIds[j]);
		}
	}
	console.log(classesToDelete);
	document.getElementById("unarchive").value = classesToDelete;
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
	console.log(classesToDelete);
	document.getElementById("delete").value = classesToDelete;
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
				<a href="/TeacherHome/teacherHome.php">Home</a>
				<a href="/archivedClasses/ArchivedClasses.php">Archived Classes</a>
				<a href="/Settings/TeacherSettings.php">Settings</a>
				<div class="last">
					<a href="/logout.php">Logout</a>
				</div>
			</div>
		</div>

		<h1> Archived Classes </h1>
		<div id="archivedClasses">
			</div>
			<div class="container">
				<table style="width:70%" class="center">
				<tr>
					<th><input type="checkbox" onClick="toggle(this)" /> </th>
					<th>Name</th>
					<th>Archived Date</th>
					<th>Roll</th>
				</tr>
			<?php
			for ($i=0; $i<count($classes); $i++){
				echo "<form action='/StudentHome/redirect.php' method='post'>";
				echo "<tr class='tableRow'>";
				echo '<td class="checkBoxes"><input type="checkbox" id="checkbox' . $i . '" name="checkclass" value="class2"></td>';
				echo "<td>".$classes[$i]."</td>";
				echo "<td>".$archivedDate[$i]."</td>";
				echo '<td style="text-align: center;"><button class="acbtn">Roll</button></td>';
				echo '<input type="hidden" name="classID" value="'.$classes_id[($i)].'"> </input>';
				echo "</tr>";
				echo "</form>";
			}
				echo "</table>";
				echo '<form method="post" action="/archivedClasses/unarchiveClasses.php">';
				echo '<button onClick="archiveClasses('.$i.')" class="acbtn" name="unarchive">Unarchive</button>';
				echo '<input type="hidden" name="result[]" id="unarchive">';
				echo '</form>';
				echo '<form method="post" action="/archivedClasses/deleteClasses.php">';
				echo '<button onClick="deleteClasses('.$i.')" class="delbtn">Delete Class</button>';
				echo '<input type="hidden" name="result[]" id="delete">';
				echo '</form>';
			?>
			</div>
		</div>
	</div>
</body>
</html>
