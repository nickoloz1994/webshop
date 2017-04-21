<?php
session_start();
require_once('config.php');
if (isset($_POST['remove'])) {
	$product = $_POST['pr_id'];
	$session = $_SESSION['PHPSESSID'];
	$removesql = "DELETE FROM nick_cart WHERE product_id='".$product."' AND session_id='".$session."'";
	mysqli_query($conn,$removesql);

	header("Location:cart.php");
}
?>