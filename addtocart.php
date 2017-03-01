<?php 
session_start();

include('config.php');

$pr_id = $_POST['id'];
$qty = $_POST['quantity'];
$session = $_SESSION['PHPSESSID'];

$sql = "SELECT * FROM cart";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if ($num > 0) {
	while ($row = mysqli_fetch_array($result)) {
		if ($row['session_id']==$session && $row['product_id']==$pr_id) {
			$newqty = $row['quantity'] + $qty;
			$query = "UPDATE cart SET quantity='".$newqty."' WHERE session_id='".$session."' AND product_id='".$pr_id."'";
			mysqli_query($conn,$query) or die("Failed");
		}else{
			$sql = "INSERT INTO cart (session_id,product_id,quantity) VALUES ('$session',$pr_id,$qty)";
			mysqli_query($conn,$sql) or die("Failed");
		}
	}
}else{
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
}

header("Location:cart.php");

?>