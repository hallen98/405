<?php
session_start();
$userID = $_SESSION["userID"];
$className = $_POST["className"];
$classDays = $_POST["classDays"];
$classTime = $_POST["classTime"];

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
for($i = 0; $i < 5; $i++) {
	$idclasses .= mt_rand(0, 9);
}
$sql = "INSERT INTO attendencemadeeasy.class (idclasses, tid_class, className, classTime, archived, weekday) VALUES('$idclasses', '$userID', '$className', '$classTime', '0', '$classDays')";
if ($conn->query($sql) === TRUE){
	echo "New Record in DB";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

header("Location: /TeacherHome/teacherHome.php");
exit();
?>
