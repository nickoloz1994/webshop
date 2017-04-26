<?php
session_start();
require('config.php');

$stmt = "SELECT * FROM nick_cart WHERE session_id='".$_SESSION['PHPSESSID']."'";
$result = mysqli_query($conn,$stmt);
while ($row = mysqli_fetch_array($result)) {
	$stmt = "DELETE FROM nick_cart WHERE session_id='".$_SESSION['PHPSESSID']."'";
	mysqli_query($conn,$stmt);
}

$_SESSION = array();

session_destroy();

header("Location: index.php");

?>