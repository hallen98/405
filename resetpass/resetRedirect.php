<?php
$email = $_POST["email"];
$hashpassword = password_hash($_POST["password"], PASSWORD_BCRYPT);

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
$sql = "UPDATE attendencemadeeasy.usertable SET passHash = '$hashpassword' WHERE email = '$email'";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE){
	echo "Updated Record in DB";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

header("Location: /login/loginpage.php");
exit();
?>
