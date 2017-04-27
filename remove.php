<?php
session_start();
require_once('config.php');

if (isset($_POST['remove'])) {
	$product = $_POST['pr_id'];
	$session = $_SESSION['PHPSESSID'];
	
	$stmt = $conn->prepare("DELETE FROM nick_cart WHERE product_id = ? AND session_id = ?");
	$stmt->bind_param("ss",$product,$session);
	$stmt->execute() or die("Failed");

	header("Location:cart.php");
}
?>