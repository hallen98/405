<?php

session_start(); 
$userID = $_SESSION["userID"];
$firstName = $_POST["FirstName"];
$lastName = $_POST["LastName"];
$email = $_POST["NewEmail"];
$email2 = $_POST["ConfirmEmail"];
$userPassword = $_POST["NewPassword"];
$userPassword2 = $_POST["ConfirmPassword"];
$delete = $_POST["Delete"];

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

$sql = "SELECT fname, lname, email, passHash, role FROM attendencemadeeasy.usertable WHERE uid = '$userID'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "Some Rows";
	while($row = $result->fetch_assoc()) {
		$fname = $row["fname"];
		$lname = $row["lname"];
		$DBemail = $row["email"];
		$passHash = $row["passHash"];
		$role = $row["role"];
	}
} else {
	echo "No rows";
}

if ($delete == "on"){
	$sql = "DELETE FROM attendencemadeeasy.usertable WHERE uid = '$userID'";
	$result = $conn->query($sql);
	if ($conn->query($sql) === TRUE){
		echo "Deleted Record in DB";
		echo "";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		echo "";
	}
	$conn->close();
	header("Location: /login/loginpage.php");
	exit();
}

if (($firstName != $fname) AND ($firstName != null)){
	//change fname in database to FirstName
	$sql = "UPDATE attendencemadeeasy.usertable SET fname = '$firstName' WHERE uid = '$userID'";
	$result = $conn->query($sql);
	if ($conn->query($sql) === TRUE){
		echo "Updated Record in DB";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
	
if (($lastName != $lname) AND ($lastName != null)){
	$sql = "UPDATE attendencemadeeasy.usertable SET lname = '$lastName' WHERE uid = '$userID'";
	$result = $conn->query($sql);
	if ($conn->query($sql) === TRUE){
		echo "Updated Record in DB";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if (($email == $email2) && ($email != null)){
	$sql = "UPDATE attendencemadeeasy.usertable SET email = '$email' WHERE uid = '$userID'"; 
	$result = $conn->query($sql);
	if ($conn->query($sql) === TRUE){
		echo "Updated Record in DB";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

if (($userPassword == $userPassword2) && ($userPassword != null)){
	$passwordHash = password_hash($userPassword, PASSWORD_BCRYPT);
	$sql = "UPDATE attendencemadeeasy.usertable SET passHash = '$passwordHash' WHERE uid = '$userID'";
	$result = $conn->query($sql);
	if ($conn->query($sql) === TRUE){
		echo "Updated Record in DB";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

$conn->close();
if($role == 1){
	header("Location: /Settings/TeacherSettings.php");
	exit();
}else{
	header("Location: /Settings/StudentSettings.php");
	exit();
}
?>
