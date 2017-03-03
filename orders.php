<?php
session_start();
require('config.php');
$user_id = $_SESSION['userid'];

$sql = "SELECT * FROM order_details JOIN orders ON orders.order_id=order_details.order_id JOIN books ON books.id=order_details.product_id WHERE orders.cust_id='".$user_id."'";
$result = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Orders</title>
</head>
<body>

<div class="container-fluid" style="width: 60%;">
	<h1>Orders</h1>
	<?php
	while($row=mysqli_fetch_array($result)){
		?>
		<div class="row" style="width: 100%;position: relative; float: left;margin-top: 1%; border-bottom: 1px solid;">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<img class="img-responsive" src="<?=$row['image']?>" alt="" style="max-height: 40%;max-width: 40%;margin-left: 40%;">
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="margin-top: 2%;">
				<label style="font-size: 16px;display: inline-block;max-width: 100%;word-wrap: normal;"><?=$row['title']?></label>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 2%;">
				<span class="label label-info" style="font-size: 16px;"><?=$row['quantity']?></span>
			</div>
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="margin-top: 2%;">
				<label><?=$row['total']?></label>
			</div>
		</div>
	<?php
	}
	?>
</div>



</body>
</html>