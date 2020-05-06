<?php
session_start();
$userID = $_SESSION["userID"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Class | AttendME</title>

</head>
<body>
	<form action="/TeacherHome/redirect.php" method="post">
		<label for="className">Class Name and Section: </label>
		<input type="text" id="className" name="className" placeholder="Ex: CSC 102, ENGL 222 ..."><br><br>
		<label for="classDays">Class Days: </label>
		<input type="text" id="classDays" name="classDays" placeholder="Ex: MWF, TR ..."><br><br>
		<label for="classTime">Class Time: </label>
		<input type="text" id="classTime" name="classTime" placeholder="Ex: 09:00:00"><br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
