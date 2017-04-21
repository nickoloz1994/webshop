<?php 
session_start();

include('config.php');

$pr_id = $_POST['id'];
$qty = $_POST['quantity'];
$session = $_SESSION['PHPSESSID'];

$sql = "SELECT * FROM nick_cart WHERE session_id='".$session."' AND product_id='".$pr_id."'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);

if ($num > 0) {
	while ($row = mysqli_fetch_array($result)) {
		
			$newqty = $row['quantity'] + $qty;
			$query = "UPDATE nick_cart SET quantity='".$newqty."' WHERE session_id='".$session."' AND product_id='".$pr_id."'";
			mysqli_query($conn,$query) or die("Failed");
		
	}
}else{
	$sql = "INSERT INTO nick_cart (session_id,product_id,quantity) VALUES ('$session',$pr_id,$qty)";
	mysqli_query($conn,$sql) or die("Failed");
}

header("Location: cart.php");
echo $num;
?>