<!DOCTYPE html>
<html>
<head>
	<title>Archived Classes/Previous Roles | Attendance Made Easy</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js">          <!-- has image of hamburger menu -->
	</script>
	<link href="HMStyle.css" rel="stylesheet">                                          <!--link to css -->
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
		
		
	<!-- Header of Page Section with AME title -->
	<h1>
	<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center"  class="responsive-table" bgcolor="#0000">
        <tr>
			<td align="center" style="padding: 0px 0 0 10px; font-family: Helvetica, Arial, sans-serif; color: #000000; font-size: 20px;" bgcolor="#ffffff">Attendance Made Easy: Previous Classes and Archived Student Roles</td>
			
        </tr>
    </table>
	</h1>
	
	<!-- Two header section -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td bgcolor="#ffffff" align="center" width="100%" style="padding: 8px 0 0 0px;">
                <table border="0" cellpadding="0" cellspacing="0" width="800" style="width: 800px;">
                    <tr>
                        <td style="padding: 15px 0 0 0;">
                            <!-- Left section -->
                            <table cellpadding="0" cellspacing="0" border="0" width="400" align="left" style="width: 400px;" bgcolor="#0000">
                                <tr>
                                    <td align="left" style="border:5px solid black; border-right: 2.5px solid black; border-bottom: 0px; padding: 10px 0 20px 10px; font-family: Helvetica, Arial, sans-serif; color: #000000; font-size: 20px;" bgcolor="#ffffff">Class Name</td>
                                </tr>
                            </table>
             
                            <!-- Right section -->
                            <table cellpadding="0" cellspacing="0" border="0" width="400" align="right" style="width: 400px;">
                                <tr>
                                    <td align="right" style="border:5px solid black; border-left: 2.5px solid black; border-bottom: 0px; padding: 10px 10px 20px 0; font-family: Helvetica, Arial, sans-serif; color: #000000; font-size: 20px;" bgcolor="#ffffff">
                                        Archive/History
                                    </td>
                                </tr>
                            </table>
                            <tr>
                        <td>
                            <!-- Body section that will implement functionality of data pulling from database -->
                            <table width="100%" cellspacing="0" cellpadding="0" style="padding-top: 0px;" '>
                                <tr>
                                    <td align="center" style="padding-bottom: 10%;padding-top:20%; font-size: 18px; font-family: Helvetica, Arial, sans-serif; border:5px solid black; border-bottom: 0px;" color: #000000;" class="" >This section will contain the displayed database information containing all archived classes and previous roll records. This will be implemented in further sprints.</td>	
                                </tr>
								<tr>
                                    <td align="center" style="padding-bottom: 20px; padding-top: 15px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; border:5px solid black; border-bottom: 0px;" color: #000000;"> 
									A visual example is seen here: 
									</td>
								<tr>
                                    <td align="center" style="padding-bottom: 30%;padding-top: 0%; font-size: 18px; font-family: Helvetica, Arial, sans-serif; border:5px solid black; border-top: 0px;" color: #000000;">
										<table align ="left" style="width:100%; border: 1px solid black;">
											<tr style="border: 1px solid black;">
												<th style="border: 1px solid black;">Student Name</th>
												<th style="border: 1px solid black;"> Dates/Attendance Record</th> 
											</tr>
											<tr>
												<td style="padding-left: 25px; border-bottom: 1px solid black;">Michael</td>
												<td style="padding-top: 10px;">Present/Not Present attendance chart here, which will require data acquisition/visualization with database</td>
											</tr>
											<tr>
												<td style="padding-left: 25px; border-bottom: 1px solid black; padding-top: 10px; padding-bottom: 10px;">Bob</td>
											</tr>
											<tr>
												<td style="padding-left: 25px; padding-top: 10px; padding-bottom: 10px;">Mark</td>
											</tr>
										</table>
									</td>	
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table><!-- // Two header section -->
	</div>
</body>
</html>