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

$sql = "SELECT className, weekday, classTime, idclasses 
FROM attendencemadeeasy.class 
WHERE tid_class = '$userID' AND archived = 0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		array_push($className, $row["className"]);
		array_push($weekday, $row["weekday"]);
		array_push($classTime, $row["classTime"]);
		array_push($classes_id, $row["idclasses"]);
	}
} else {
	//echo "0 results";
}

$conn->close();
$name = $firstName . ' ' . $lastName;
$date = "2020-04-15";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home | AttendME</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	<link href="HMStyle.css" rel="stylesheet">                                      <!--link to css -->
	<link href="teacherHome.css" rel="stylesheet">
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
		document.getElementById("archive").value = classesToDelete;
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
			<a href="/TeacherHome/teacherHome.php">Home</a>
            <a href="/archivedClasses/ArchivedClasses.php">Archived Classes</a>
            <a href="/Settings/TeacherSettings.php">Settings</a>
			<div class="last">
				<a href="/logout.php">Logout</a>
			</div>
		</div>
		
		<!-- !!!!!!!!!!!! START OF PAGE CONTENT !!!!!!!!!!!! -->
		
        <h1 style="text-align: center"> Welcome <?php echo $name; ?></h1>
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
                echo '<table class="ctable" style="width:70%; border-collapse: collapse;">
                    <tr>
                        <th><input type="checkbox" onClick="toggle(this)"></th>
                        <th>Name</th>
                        <th>Time</th>
                        <th>Code</th>
                        <th></th>
                    </tr>';
			
		for ($i=0; $i<count($className); $i++){
		    echo '<form action="/StudentHome/redirect.php" method="post">';
                    echo '<tr class="tableRow">
                        <td class="checkBoxes"><input type="checkbox" id="checkbox' . $i . '" name="checkclass" value="class2"></td>
                        <td>' . $className[($i)] .'</td>
                        <td>' . $weekday[($i)] . ' ' . date('h:i a', strtotime($classTime[($i)])) .'</td>
                        <td>' . $classes_id[($i)] .'</td>
			<input type="hidden" name="classID" value="'.$classes_id[($i)].'"> </input>
                        <th style="text-align: right; padding: 7px;"><button class="acbtn">Roll</button></th>
                        </tr>
			</form>';
		}
                    echo '<tr class="tableRow">
			<form action="/TeacherHome/addClass.php" method="post">
                        <td><button class="acbtn" type="submit">Add Class</button></td>
                        <td></td>
			</form>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>';
                        echo '<form method="post" action="/TeacherHome/archiveClasses.php">';
			echo '<th><button onClick="archiveClasses('.$i.')" class="acbtn" name="unarchive">Archive</button></th>';
			echo '<input type="hidden" name="result[]" id="archive">';
			echo '</form>';
                        echo '<form action="/TeacherHome/deleteClasses.php" method="post">';
			echo '<th><button onClick="deleteClasses('.$i.')" class="delbtn">Delete</button></th>';
			echo '<input type="hidden" name="result[]" id="delete">';
                    echo '</tr>
                </table>';
		?>
            </center>
        </div>
</body>
</html>
