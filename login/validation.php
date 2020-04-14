<?php
$servername = "138.47.204.77";
$username = "commit";
$password = "TempP@ss124";
$dbname = "attendencemadeeasy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT password FROM attendencemadeeasy.usertable WHERE email = $email";
$result = $conn->query($sql)

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
    $hashedpassword = $row["password"];
	}

if (password_verify($password , $hashedpassword) == true){
	echo "matches";
	}
?>