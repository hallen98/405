<!DOCTYPE html>
<html>
<head>
	<title>Archived Classes | AME</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js">          <!-- has image of hamburger menu -->
	</script>
	<link href="ACStyle.css" rel="stylesheet">                                          <!--link to css -->
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
				<a href="#">Current Classes</a>
				<a href="#">Archived Classes</a>
				<a href="#">Settings</a>
				<div class="last">
					<a href="#">Logout</a>
				</div>
			</div>
		</div>

		<h1> Archived Classes </h1>
		<div id="archivedClasses">
			<div id= "selector">
				<div id= "startDay">
					<form>
						<label for="startDate">Start Date:</label><br>
						<input type="date" id="startDate" name="startDate">
					</form>
				</div>
				
				<div id= "endDay">
					<form>
						<label for="endDate">End Date:</label><br>
						<input type="date" id="startDate" name="startDate">
					</form>
				</div>
				
				<div id= "quarterSelect">
					<form>
						<label for="quarter">Quarter:</label><br>
						<select id="quarter">
							<option value="Spring 2019">Spring 2019</option>
							<option value="Summer 2019">Summer 2019</option>
							<option value="Fall 2019">Fall 2019</option>
							<option value="Winter 2020">Winter 2020</option>
						</select>
					</form>
				</div>
				
			</div>
				
			<div class="container">
				<div class="vertical-center">
					<p>Table Will go here.</p>
			  </div>
			</div>
		
		
		</div>
	</div>
</body>
</html>