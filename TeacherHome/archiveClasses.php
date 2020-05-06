<?php
session_start();
$classes = $_POST["result"];
$classes = str_getcsv($classes[0]);
$date = date("Y-m-d H:i:s");
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
foreach ($classes as $value){
	$sql = "UPDATE attendencemadeeasy.class SET archived = '1', dataarchived = '$date' WHERE idclasses = '$value'";
	$result = $conn->query($sql);
	if ($conn->query($sql) === TRUE){
		echo "Updated Record in DB";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
$conn->close();

header("Location: /TeacherHome/teacherHome.php");
exit();

?>
