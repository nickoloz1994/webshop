<?php 
session_start();

include('config.php');

$pr_id = $_POST['id'];
$qty = $_POST['quantity'];


	$statemenet = $conn->prepare(
		"INSERT INTO `cart`(
			`session_id`,
			`product_id`,
			`quantity`) 
			VALUES (?,?,?)");

	$statemenet->bind_param("sii",
		$_SESSION['PHPSESSID'],
		$_POST['id'],
		$_POST['quantity']);

	if($statemenet->execute()){
		echo "Success";
	}else{
		echo $statemenet->errno."###".$statemenet->error;
	}

header("Location:cart.php");



?>