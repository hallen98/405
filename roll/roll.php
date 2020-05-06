<!--Archived roll page -->
<!-- Code by Michael McCrary -->
<!--Hamburger menu code done by group member Noah Broussard -->
<?php
session_start();
$userID = $_SESSION["userID"];
$classID = $_SESSION["classID"];
$servername = "138.47.204.77";
$username = "commit";
$password = "TempP@ss124";
$dbname = "attendencemadeeasy";

$dates = [];
$locations = [];
$studentIDs = [];
$studentNames = [];
$allInfo = [];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT className FROM attendencemadeeasy.class WHERE idclasses = '$classID' LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$className = $row["className"];
	}
}
$sql = "SELECT role FROM attendencemadeeasy.usertable WHERE uid = '$userID'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$role = $row["role"];
	}
}
if($role == 1){
	$sql = "SELECT date, location, idStudent FROM attendencemadeeasy.student_attended WHERE classes_id = '$classID' and tid_class = '$userID'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if(!(in_array($row[idStudent], $studentIDs) )){
				array_push($studentIDs, $row[idStudent]);
			}
			array_push($dates, date('m/d', strtotime($row[date])));
			array_push($allInfo, $row);
		}
	}
}else{
	$sql = "SELECT date, location, idStudent FROM attendencemadeeasy.student_attended WHERE idStudent = '$userID' AND classes_id = '$classID'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if(!(in_array($row[idStudent], $studentIDs) )){
				array_push($studentIDs, $row[idStudent]);
			}
			array_push($dates, date('m/d', strtotime($row[date])));
			array_push($allInfo, $row);
		}
	}
}
foreach($studentIDs as $value){
	$sql = "SELECT fname, lname FROM attendencemadeeasy.usertable WHERE uid = '$value'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$firstName = $row["fname"];
			$lastName = $row["lname"];
			$name = $firstName . ' ' . $lastName;
			array_push($studentNames, $name);
		}
	}
}
$conn->close();
$dates = array_unique($dates);
sort($dates);
//print_r($allInfo);
?>

<!DOCTYPE html>
<html>

<head>
	<title>Roll | AttendME</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js">
	</script>
	<link href="roll.css" rel="stylesheet">
	<script src="/archivedRoll/TableCSVExporter.js"></script>
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
		<?php
		if($role == 1){
			echo '<div id="menu" class="nav">
				<!-- links -->
				<a href="/TeacherHome/teacherHome.php">Home</a>
				<a href="/archivedClasses/ArchivedClasses.php">Archived Classes</a>
				<a href="/Settings/TeacherSettings.php">Settings</a>
				<div class="last">
					<a href="/logout.php">Logout</a>
				</div>
			</div>';
		}else{
			echo '<div id="menu" class="nav">
				<!-- links -->
				<a href="/StudentHome/StudentHome.php">Home</a>
				<a href="/Settings/StudentSettings.php">Settings</a>
				<div class="last">
					<a href="/logout.php">Logout</a>
				</div>
			</div>';

		}
		?>

		<!-- Header of Page Section with AME title -->
		<h1 style="text-align: center"><?php echo $className ?></h1>
		
		<table class="center" id="rollTable">
		<?php
			echo "<tr>";
			echo "<th>Names</th>";
			for ($i=0; $i<count($dates); $i++){
				echo "<th><p>" . $dates[$i] . "</p></th>";
			}
			echo "</tr>";
			$temp = 0;
			for ($j=0; $j<count($studentNames); $j++){
				echo "<tr>";
				echo "<td>".$studentNames[($j)]."</td>";
				$currentStudent = $studentIDs[($j)];
				for ($i=0; $i<count($dates); $i++){
						/*echo "+++++++";
						print_r($allInfo[1]);
						echo "+++++++";	*/
					foreach($allInfo as $value){
						if(($value[idStudent] == $currentStudent) && (date('m/d', strtotime($value[date])) == $dates[($i)])){
							if($value[location] == '1'){
								echo "<td><p>X</p></td>";
							}else{
								echo "<td><p>-</p></td>";

							}
						}
					}
				}
				echo "</tr>";
			}
		?>
		
		</table>
		<table class="center" style="text-align:center; margin-right: auto; margin-left: auto;">
			<button  style="display: block; margin: auto; margin-top: 15px;" type = "button" id="btnExportCSV" class="ExportBtn button">Export to CSV</button>
			<script>
				const dataTable = document.getElementById("rollTable");

				const btnExporttoCSV = document.getElementById("btnExportCSV");

				btnExporttoCSV.addEventListener("click", () =>
					{
						console.log("Here");
						const exporter = new TableCSVExporter(rollTable);
						const csvOutput = exporter.convertToCSV();
						const csvBlob = new Blob([csvOutput], {type:"text/csv"});
						const blobURL = URL.createObjectURL(csvBlob);
						const anchorElement = document.createElement("a");

						anchorElement.href = blobURL;
						anchorElement.download = "roll-table.csv";
						anchorElement.click();

						setTimeout(() =>
						{
							URL.revokeObjectURL(blobURL);
						}, 500);


					});
			</script>
		</table>
	</div>
</body>

</html>
