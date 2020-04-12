<!--Archived roll page -->
<!-- Code by Michael McCrary -->
<!--Hamburger menu code done by group member Noah Broussard -->
<?php
#---------- HARD CODED VALUES REPLACE WITH SERVER CODING FROM DOAN ---------
#---------- REFORMATTING MAY BE NEEDED ------------

$attendees = ["Hunter Allen", "Michael McCrary", "Ross Piraino", "Thienduc Doan", "Noah Broussard"];
$dates = ["3/16", "3/18", "3/20", "3/23", "3/25", "3/27"];
$attendanceData = ["x", "-", "-", "x", "x", "x", "x", "x", "x", "x", "-", "-", "-", "-", "x", "x", "x", "x", "-", "-", "x", "x", "x", "x", "x", "-", "x", "-", "x", "-"];
?>

<!DOCTYPE html>
<html>

<head>
	<title>Roll | AttendME</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js">
	</script>
	<link href="archivedRoll.css" rel="stylesheet">
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
			<a href="#">Current Classes</a>
			<a href="#">Archived Classes</a>
			<a href="#">Settings</a>
			<div class="last">
				<a href="#">Logout</a>
			</div>
		</div>


		<!-- Header of Page Section with AME title -->
		<h1 style="text-align: center">CSC-406-002</h1>
		
		<table class="center">
		<?php
			echo "<tr>";
			echo "<th><p>Student Name</p></th>";
			for ($i=0; $i<count($dates); $i++){
				echo "<th><p>\"$dates[$i]\"</p></th>";
			}
			for ($i=0; $i<count($attendees); $i++){
				echo "<td><p>\"$attendees[$i]\"</p></td>";
				for ($day=0; $day<count($dates); $day++){
					echo "<td><p>";
					echo $attendanceData[($day * count($attendees))];
					echo "</p></td>";
				}
			}
		?>
		<!-- OLD CODE BELOW -->
		<!--<table class="center">
			<tr>
				<th>
					<p>Student Name</p>
				</th>
				?php for ($i=0; $i<5; $i++) { ?>
				<th>
					<p>?php echo $i; ?></p>
				</th>
				?php } ?>
			</tr>
		<!-- <table class="center">
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
			</tr> -->
			<tr>
				<td><button class="ExportBtn">Export to CSV</button></td>
			</tr>
		</table>
	</div>
</body>

</html>