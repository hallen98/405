<?php
session_start();
$classes = $_POST["result"];
$userID = $_SESSION["userID"];
$classes = str_getcsv($classes[0]);
//Info to connect to server
$servername = "138.47.204.77";
$username = "commit";
$password = "TempP@ss124";
$dbname = "attendencemadeeasy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
foreach($classes as $value){
	$sql = "DELETE FROM attendencemadeeasy.class WHERE idclasses = '$value'";
	$result = $conn->query($sql);
	if ($conn->query($sql) === TRUE){
		echo "Deleted Record in DB";
		echo "";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		echo "";
	}	
}
$conn->close();
header("Location: /TeacherHome/teacherHome.php");
exit();
?>
