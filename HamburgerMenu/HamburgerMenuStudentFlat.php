<!DOCTYPE html>
<html>
<head>
	<title>Hamburger Menu</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js">       <!-- has image of hamburger menu -->
	</script>
	<link href="HMStyle.css" rel="stylesheet">                                       <!--link to css -->
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
		
			<a href="#" id="burger" class = "toggle" onclick="openSlideMenu()">         <!-- hamburger menu -->
				<i class="fas fa-bars"></i>
			</a>
			
		</div>
		
		<div id="menu" class="nav">                                                     <!-- links -->
			<a href="/StudentHome/StudentHome.php">Home</a>
			<a href="/Settings/StudentSettings.php">Settings</a>
			<div class="last">
				<a href="/login/loginpage.php">Logout</a>
				<?php
				session_unset();
				session_destroy();
				?>
			</div>
		</div>
		

		
		<h1> REST OF THE PAGE GOES HERE </h1>
	</div>
</body>
</html>
