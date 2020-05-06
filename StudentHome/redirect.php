<?php
session_start();
$classID = $_POST["classID"];
$_SESSION["classID"] = $classID;
header("Location: /roll/roll.php");
exit();
?>
