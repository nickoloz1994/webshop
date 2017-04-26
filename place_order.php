<?php
require('config.php');
session_start();

$customer_id = $_SESSION['userid'];
$total = $_SESSION['subtotal'];

$sql = "INSERT INTO nick_orders(cust_id,`date`,total) VALUES($customer_id,DATE_FORMAT(NOW(),'%b %d %Y %h:%i %p'),$total)";
mysqli_query($conn,$sql) or die("orders insert failed");

$sql = "SELECT MAX(order_id) AS last_id FROM nick_orders";
$res = mysqli_query($conn,$sql) or die("select from orders failed");
$row = mysqli_fetch_array($res);
$id = $row['last_id'];
$_SESSION['order_id'] = $id;

$session = $_SESSION['PHPSESSID'];
$sql = "SELECT * FROM nick_cart WHERE session_id='".$session."'";
$res = mysqli_query($conn,$sql) or die("select from cart failed");
while($rows = mysqli_fetch_array($res)){
	$pr_id = $rows['product_id'];
	$qty = $rows['quantity'];

	$sql = "INSERT INTO nick_order_details(order_id,product_id,quantity) VALUES($id,$pr_id,$qty)";
	mysqli_query($conn,$sql) or die("details insert failed");
}
header("Location:shipping.php");

?>