<?php
session_start();
require('config.php');

$session = $_SESSION['PHPSESSID'];
$customer_id = $_SESSION['userid'];
$total = $_SESSION['subtotal'];
$date = date("Y/m/d");

$stmt = $conn->prepare("INSERT INTO nick_orders(cust_id,`date`,total) VALUES(?,?,?)");
$stmt->bind_param("sss",$customer_id,$date,$total);
$stmt->execute() or die("Failed");

$stmt1 = $conn->prepare("SELECT MAX(order_id) AS last_id FROM nick_orders");
$stmt1->execute() or die("Failed");
$res = $stmt1->get_result();
$row = $res->fetch_assoc();
$id = $row['last_id'];
$_SESSION['order_id'] = $id;

$stmt3 = $conn->prepare("SELECT * FROM nick_cart WHERE session_id = ?");
$stmt3->bind_param("s",$session);
$stmt3->execute() or die("Failed");
$result = $stmt3->get_result();
while($rows = $result->fetch_assoc()){
	$pr_id = $rows['product_id'];
	$qty = $rows['quantity'];

	$stmt4 = $conn->prepare("INSERT INTO nick_order_details(order_id,product_id,quantity) VALUES(?,?,?)");
	$stmt4->bind_param("sss",$id,$pr_id,$qty);
	$stmt4->execute() or die("Failed");
}
header("Location:shipping.php");

?>