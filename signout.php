<?php
session_start();
require('config.php');

$stmt = $conn->prepare("SELECT * FROM nick_cart WHERE session_id = ?");
$stmt->bind_param("s",$_SESSION['PHPSESSID']);
$stmt->execute() or die("Failed");
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
	$stmt1 = $conn->prepare("DELETE FROM nick_cart WHERE session_id = ?");
	$stmt1->bind_param("s",$_SESSION['PHPSESSID']);
	$stmt1->execute() or die("Failed");
}

$_SESSION = array();

session_destroy();

header("Location: index.php");

?>