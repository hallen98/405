<?php
session_start();
$studentID = $_SESSION["userID"];
$classcode = $_POST["classcode"];

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
$sql = "SELECT  tid_class
FROM attendencemadeeasy.class 
WHERE idclasses = '$classcode'" ;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		$teacherID = $row["tid_class"];
	}
}

$sql = "INSERT INTO attendencemadeeasy.student_inclass (sid, classes_idclasses, classes_teacher_idteacher) VALUES('$studentID', '$classcode', '$teacherID')";
if ($conn->query($sql) === TRUE){
	echo "New Record in DB";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

header("Location: /StudentHome/StudentHome.php");
exit();
?> 
