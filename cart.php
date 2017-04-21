<?php
session_start();
require('logged.php');
if (logged_in()) {
	

include('config.php');

$stotal = 0;
$session_id = $_SESSION['PHPSESSID'];
$stmt = "SELECT * FROM nick_cart INNER JOIN nick_books ON nick_cart.product_id=nick_books.id WHERE nick_cart.session_id='".$session_id."'";
$result = mysqli_query($conn,$stmt);
$num = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  	<script type="text/javascript" src="js/bootstrap.js"></script>
  	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<title>Shopping Cart</title>
</head>
<body>

<div class="page-header">
  <h1 style="margin-left: 2%;">IT Book Shop</h1>
</div>

<?php include('authenticated_nav.php'); ?>

<div class="container-fluid">
	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
		<?php
			if($num > 0){
			while($row = mysqli_fetch_assoc($result)){
				$stotal += $row['quantity'] * $row['price'];
				$_SESSION['subtotal'] = $stotal;
		?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<table class="table table-bordered" style="width: 100%;">
				<tbody>
					<tr>
						<td rowspan="4" class="mytd2">
							<img class="img-responsive" src="<?=$row['image']?>" alt="<?=$row['title']?>" >
						</td>
						<td class="mytd">
							Title: <label style="font-size: 16px;"><?=$row['title']?></label>
						</td>
					</tr>
					<tr>
						<td class="mytd">
							Quantity: <label><?=$row['quantity'];?></label>
						</td>
					</tr>
					<tr>
						<td class="mytd">
							Price: <span class="label label-info" style="font-size: 16px;"><?=$row['price']?></span>
						</td>
					</tr>
					<tr>
						<td class="mytd">
							<form action="remove.php" method="post">
								<input type="hidden" name="pr_id" value="<?=$row['product_id']?>">
								<input type="submit" name="remove" class="btn btn-danger" style="font-size: 12px;" value="Remove">
							</form>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<?php
			}
		}else{
			$_SESSION['subtotal'] = 0;
		}
		?>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="float: right;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label style="font-size: 20px;">Subtotal:<?php echo "{$_SESSION['subtotal']}"; ?>USD</label>
			<form action="place_order.php">
				<input type="submit" value="Proceed to checkout" class="btn btn-warning" style="width: 100%; margin-top: 5%;">
			</form>
		</div>
	</div>
</div>

</body>
</html>
<?php
} else {
	header('Location:signin.php');
}
?>