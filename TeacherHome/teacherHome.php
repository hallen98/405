<!-- php connection initialization --> 
<?php
session_start();
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
				<a href="/login/loginpage.php">Logout</a>
				<!-- php items necessary to remove credentials, destroy session -->
				<?php
				session_unset();
				session_destroy();
				?>
			</div>
		</div>
		
		<!-- !!!!!!!!!!!! START OF PAGE CONTENT !!!!!!!!!!!! -->
		
        <h1><center> Welcome Mike O'Neal </center></h1>
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
                        <th>Name</th>
                        <th>Time</th>
                        <th>Code</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr class="tableRow">
                        <td class="checkBoxes"><input type="checkbox" name="checkclass" value="class1"></td>
                        <td>CSC-405-001</td>
                        <td>MWF 2:00-3:15 PM</td>
                        <td>549826</td>
                        <th style="text-align: right;"><button href="/roll/roll.php" class="acbtn">Roll</button></th>
                        <th><button class="acbtn">Set Geolocation</button></th>
                    </tr>
                    <tr class="tableRow">
                        <td class="checkBoxes"><input type="checkbox" name="checkclass" value="class2"></td>
                        <td>CSC-450-003</td>
                        <td>MWF 10:00-11:15 AM</td>
                        <td>187205</td>
                        <th style="text-align: right;"><button href="/roll/roll.php" class="acbtn">Roll</button></th>
                        <th><button class="acbtn">Set Geolocation</button></th>
                    </tr>
                    <tr class="tableRow">
                        <td class="checkBoxes"><input type="checkbox" name="checkclass" value="class3"></td>
                        <td>CSC-123-456</td>
                        <td>MWF 8:00-9:15 AM</td>
                        <td>184402</td>
                        <th style="text-align: right;"><button href="/roll/roll.php" class="acbtn">Roll</button></th>
                        <th><button class="acbtn">Set Geolocation</button></th>
                    </tr>
                    <!-- ADDS THE ADD CLASS BUTON AND TEXT INPUT TO LINE UP WITH THE FIRST TWO COLUMBS IN THE TABLE -->
                    <tr class="tableRow">
                        <td><button class="acbtn">Add Class</button></td>
                        <td><input style="visibility: hidden;"type="text" name="classcode" placeholder="Class Code" id="classcode"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th><button class="archBtn">Archive Class</button></th>
                        <th style="text-align: left;"><button class="delbtn">Delete Class</button></th>
                    </tr>
                </table>
            </center>
        </div>
</body>
</html>
