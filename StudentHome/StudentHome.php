<!DOCTYPE html>
<html>
<head>
	<title>Home | Attendence Made Easy</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js">      <!-- has image of hamburger menu -->
	</script>
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
			<a href="#">Home</a>
			<a href="#">Settings</a>
			<div class="last">
				<a href="#">Logout</a>
			</div>
		</div>
		
		<!-- !!!!!!!!!!!! START OF PAGE CONTENT !!!!!!!!!!!! -->
		
		<h1><center> Welcome Mike O'Neal </center></h1>
		
		<center><button class="cibtn">Check In to: CSC-405-001</button></center>		<!-- Check in button -->
		<br><br>
		
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
			<table class="ctable" style="width:70%">
				<tr>
					<th><input type="checkbox" onClick="toggle(this)">Check All</th>
					<th>Class</th>
					<th>Time</th>
					<th>Last Checkin</th>
					<th>Checked in</th>
				</tr>
				<tr>
					<th><input type="checkbox" name="checkclass" value="class1"></th>
					<th>CSC-405-001</th>
					<th>MWF 2:00-3:15 PM</th>
					<th>2/2/2020</th>
					<th><img src="check.png" alt="Check"></th>
				</tr>
				<tr>
					<th><input type="checkbox" name="checkclass" value="class2"></th>
					<th>CSC-450-003</th>
					<th>MWF 10:00-11:15 AM</th>
					<th>2/2/2020</th>
					<th><img src="check.png" alt="Check"></th>
				</tr>
				<tr>
					<th><input type="checkbox" name="checkclass" value="class3"></th>
					<th>CSC-123-456</th>
					<th>MWF 8:00-9:15 AM</th>
					<th>2/1/2020</th>
					<th><img src="x.png" alt="X"></th>
				</tr>
				<!-- ADDS THE ADD CLASS BUTON AND TEXT INPUT TO LINE UP WITH THE FIRST TWO COLUMBS IN THE TABLE -->
				<tr>
					<th><input type="text" name="classcode" placeholder="Class Code" id="classcode"></th>
					<th><button class="acbtn">Add Class</button></th>
				</tr>
				<tr>
					<th><button class="delbtn">Delete Class</button></th>
				</tr>
		</center>
		
		
	</div>
</body>
</html>