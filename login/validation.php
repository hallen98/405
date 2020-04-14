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

//get inputs from fields on loginpage.php
$email = $_POST["email"];
$password = $_POST["password"];

//use email to get hashed password from database
$sql = "SELECT password FROM attendencemadeeasy.usertable WHERE email = $email";
$result = $conn->query($sql)
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
    $hashedpassword = $row["password"];
	}

//verify password against hashed password, if true, set session variable and redirect to home page
//	if false, redirect to login and display error
if (password_verify($password , $hashedpassword) == true){
	
	$sql = "SELECT uid FROM attendencemadeeasy.usertable WHERE uid = $userID";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$userID = $row["uid"];
		}
	}
	$conn->close();

	$_SESSION["userID"] = $userID;
	
	header("location: "); //set to location of homepage
	exit;
} else{
	header("location: loginpage.php");
	exit;
}
?>