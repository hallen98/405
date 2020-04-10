<?php
/*$servername = "138.47.204.77";
$username = "commit";
$password = "TempP@ss124";
$dbname = "attendencemadeeasy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 3306);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Success" . PHP_EOL;

//$sql = "SELECT id, firstname, lastname FROM MyGuests";
//$result = $conn->query($sql);

//if ($result->num_rows > 0) {
    // output data of each row
//    while($row = $result->fetch_assoc()) {
//        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//    }
//} else {
//    echo "0 results";
//}
echo "hello";
$conn->close();*/

$studentName = "Hunter";
$classes = ["CSC-405-002", "CSC-406-001", "CSC-407-003"];

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
		
		<h1 style="text-align: center"> Welcome <?php echo $studentName; ?></h1>
		
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
			<!--<table class="ctable" style="width:70%; border-collapse: collapse;">
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
				<tr class="tableRow">
					<td><button class="acbtn" onClick="toggleVisibility()">Add Class</button></td>
					<td><input type="text" name="classcode" placeholder="Class Code" class="classcode" id="classcode"></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th><button class="delbtn">Delete Class</button></th>
				</tr>
				-->
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