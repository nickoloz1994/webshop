<?php
session_start();
require('config.php');

$stmt = "SELECT * FROM cart WHERE session_id='".$_SESSION['PHPSESSID']."'";
$result = mysqli_query($conn,$stmt);
while ($row = mysqli_fetch_array($result)) {
	$stmt = "DELETE FROM cart WHERE session_id='".$_SESSION['PHPSESSID']."'";
	mysqli_query($conn,$stmt);
}

if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(),'',time()-50000,'/');
}

$_SESSION = array();

session_destroy();

header("Location: index.php");

?>