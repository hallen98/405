<?php
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$hashpassword = password_hash($_POST["password"], PASSWORD_BCRYPT);
$acctype = $_POST["acctype"];

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
$sql = "SELECT email FROM attendencemadeeasy.usertable WHERE email = '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	//echo '<script type="text/JavaScript">';
	//echo 'prompt("Email already in use")';
	//echo '</script>';
	//sleep (5);
	header("Location: /signup/Signup.php");
	exit();
}
if($acctype == "student"){
	$finalType = 0;
}else{
	$finalType = 1;
}
$uid = '';
for($i = 0; $i < 8; $i++) {
	$uid .= mt_rand(0, 9);
}
$sql = "INSERT INTO attendencemadeeasy.usertable (uid, fname, lname, email, role, passHash) VALUES('$uid', '$firstname', '$lastname', '$email', '$finalType', '$hashpassword')";
if ($conn->query($sql) === TRUE){
	echo "New Record in DB";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

header("Location: /login/loginpage.php");
exit();
?>
