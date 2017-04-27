<?php 
session_start();

include('config.php');

$pr_id = $_POST['id'];
$qty = $_POST['quantity'];
$session = $_SESSION['PHPSESSID'];

$stmt = $conn->prepare("SELECT * FROM nick_cart WHERE session_id = ? AND product_id = ? ");
$stmt->bind_param("ss",$session,$pr_id);
$stmt->execute() or die("Failed");
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
	$newqty = $row['quantity'] + $qty;
	$stmt1 = $conn->prepare("UPDATE nick_cart SET quantity = ? WHERE session_id = ? AND product_id = ?");
	$stmt1->bind_param("sss",$newqty,$session,$pr_id);
	$stmt1->execute() or die("Failed");
}else{
	$stmt2 = $conn->prepare("INSERT INTO nick_cart (session_id,product_id,quantity) VALUES (?,?,?)");
	$stmt2->bind_param("sss",$session,$pr_id,$qty);
	$stmt2->execute() or die("Failed");
}

header("Location: cart.php");
?>