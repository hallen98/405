<?php
session_start();
$classID = $_POST["checkInto"];
$userID = $_SESSION["userID"];
$date = date("Y-m-d");

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
$sql = "SELECT location FROM attendencemadeeasy.student_attended WHERE classes_id = '$classID' AND idStudent = '$userID' AND date = '$date' LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		$attended = $row["location"];
	}
} else {
	echo "0 results";
}
if($attended == '1'){
	$conn->close();
	header("Location: /StudentHome/StudentHome.php");
	exit();
}else{
	$sql = "UPDATE attendencemadeeasy.student_attended SET location = '1' WHERE classes_id = '$classID' AND idStudent = '$userID' AND date = '$date' LIMIT 1";
	$result = $conn->query($sql);
	if ($conn->query($sql) === TRUE){
		echo "No Error";
		echo "";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		echo "";
	}
	header("Location: /StudentHome/StudentHome.php");
	exit();
}
