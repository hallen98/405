<!--Archived roll page -->
<!-- Code by Michael McCrary -->
<!--Hamburger menu code done by group member Noah Broussard -->


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
                        <td>
                            <!-- Body section that will implement functionality of data pulling from database -->
                            <table width="100%" cellspacing="0" cellpadding="0" style="padding-top: 0px;" '>	
								<tr> <!--Start of table code -->
                                    <td align="left" style="padding-bottom: 5%;padding-top: 0%; font-size: 18px; font-family: Helvetica, Arial, sans-serif; border:5px solid black;" color: #000000;">
										<div>
											<table style="width:100%">
												<tr>
													<th style="width: 150px; align: left;  border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">Student Name</th>
													<th style="width: 175px; align: left; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">Class Name</th>
													<th colspan="7" style="align: center; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">Dates and Present/Not Present</th>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td style="align: left; border: 1px solid black;">1/20</td>
													<td style="align: left; border: 1px solid black;">1/22 </td>
													<td style="align: left; border: 1px solid black;">1/24</td>
													<td style="align: left; border: 1px solid black;">1/28</td>
													<td style="align: left; border: 1px solid black;">1/30</td>
													<td style="align: left; border: 1px solid black;">2/2</td>
												</tr>
												<tr>
													<td style="align: left; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">Michael McCrary</td>
													<td style="align: left; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">CSC 405</td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;"> </td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;">✔</td>
												</tr>
												<tr>
													<td style="align: left; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">Joe Smith</td>
													<td style="align: left; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">CSC 405</td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;"> </td>
													<td style="align: left; border: 1px solid black;"> </td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;"> </td>
													<td style="align: left; border: 1px solid black;">✔</td>
												</tr>
												<tr>
													<td style="align: left; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">Amanda Murray</td>
													<td style="align: left; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">CSC 405</td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;"> </td>
													<td style="align: left; border: 1px solid black;">✔</td>
												</tr>
												<tr>
													<td style="align: left; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">Anita Sterling</td>
													<td style="align: left; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">CSC 405</td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;"> </td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;">✔</td>
												</tr>
												<tr>
													<td style="align: left; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">Jim Lahey</td>
													<td style="align: left; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">CSC 405</td>
													<td style="align: left; border: 1px solid black;"> </td>
													<td style="align: left; border: 1px solid black;"> </td>
													<td style="align: left; border: 1px solid black;"> </td>
													<td style="align: left; border: 1px solid black;"> </td>
													<td style="align: left; border: 1px solid black;"> </td>
													<td style="align: left; border: 1px solid black;">✔</td>
												</tr>
												<tr>
													<td style="align: left; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">Gabe Cajunson</td>
													<td style="align: left; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">CSC 405</td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;">✔</td>
												</tr>
												<tr>
													<td style="align: left; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">John Doe</td>
													<td style="align: left; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">CSC 405</td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;"> </td>
													<td style="align: left; border: 1px solid black;"> </td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;"> </td>
													<td style="align: left; border: 1px solid black;">✔</td>
												</tr>
												<tr>
													<td style="align: left; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">Hank Hill</td>
													<td style="align: left; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">CSC 405</td>
													<td style="align: left; border: 1px solid black;"> </td>
													<td style="align: left; border: 1px solid black;"> </td>
													<td style="align: left; border: 1px solid black;"> </td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;">✔</td>
													<td style="align: left; border: 1px solid black;">✔</td>
												</tr>
											
											</table>
										</div>	
									</td>	
                                </tr> <!--End of table code -->
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
