<!DOCTYPE html>
<html>
<head>
	<title>Hamburger Menu</title>
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
		
		
		 <!-- Two header section -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td bgcolor="#ffffff" align="center" style="padding: 8px 0 0 0;">
                <table border="0" cellpadding="0" cellspacing="0" width="600" style="width: 600px;" class="responsive-table">
                    <tr>
                        <td style="padding: 20px 0 0 0;">
                            <!-- Left section -->
                            <table cellpadding="0" cellspacing="0" border="0" width="280" align="left" style="width: 300px;" class="responsive-table" bgcolor="#0000">
                                <tr>
                                    <td align="left" style="padding: 15px 0 0 20px; font-family: Helvetica, Arial, sans-serif; color: #000000; font-size: 20px;" bgcolor="#ffffff">Class Name</td>
                                </tr>
                            </table>
         <!--[if (gte mso 9)|(IE)]>
                                            </td>
                                            <td>
                                            <![endif]-->    
                            <!-- Right section -->
                            <table cellpadding="0" cellspacing="0" border="0" width="280" align="right" style="width: 300px;" class="responsive-table">
                                <tr>
                                    <td align="right" style="padding: 15px 20px; 0 0; font-family: Helvetica, Arial, sans-serif; color: #000000; font-size: 20px;" bgcolor="#ffffff">
                                        Archive/History
                                    </td>
                                </tr>
                            </table>
                            <tr>
                        <td>
                            <!-- Body section that will implement functionality of data pulling from database -->
                            <table width="100%" cellspacing="0" cellpadding="0" padding-top: 60px; style="padding-top: 40px;" '>
                                <tr>
                                    <td align="center" style="padding-bottom: 80%;font-size: 18px; font-family: Helvetica, Arial, sans-serif; border:10px solid black;"; color: #000000;" class="" >This section will contain the displayed database information containing all archived classes and previous roll records. This will be implemented in further sprints.</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table><!-- // Two header section -->
	</div>
</body>
</html>