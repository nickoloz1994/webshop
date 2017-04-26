<?php 
require('config.php');
include('top.php'); 

if (logged_in()) {
	$stotal = 0;
	$session_id = $_SESSION['PHPSESSID'];
	$stmt = "SELECT * FROM nick_cart INNER JOIN nick_books ON nick_cart.product_id=nick_books.id WHERE nick_cart.session_id='".$session_id."'";
	$result = mysqli_query($conn,$stmt);
	$num = mysqli_num_rows($result);
?>

<!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Shopping Cart</h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
		<?php
			if($num > 0){
			while($row = mysqli_fetch_assoc($result)){
				$stotal += $row['quantity'] * $row['price'];
				$_SESSION['subtotal'] = $stotal;
		?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<table class="table table-bordered table-wide">
				<tbody>
					<tr>
						<td rowspan="4" class="td2">
							<img class="img-responsive" src="<?=$row['image']?>" alt="<?=$row['title']?>" >
						</td>
						<td class="td8">
							Title: <?=$row['title']?>
						</td>
					</tr>
					<tr>
						<td class="td8">
							Quantity: <?=$row['quantity'];?>
						</td>
					</tr>
					<tr>
						<td class="td8">
							Price: <?=$row['price']?> USD
						</td>
					</tr>
					<tr>
						<td class="td8">
							<form action="remove.php" method="post">
								<input type="hidden" name="pr_id" value="<?=$row['product_id']?>">
								<input type="submit" name="remove" class="btn btn-danger btn-md" value="Remove">
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

	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 sub">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			Subtotal: <?php echo "{$_SESSION['subtotal']}"; ?> USD
			<form action="place_order.php">
				<input type="submit" value="Proceed to checkout" class="btn btn-warning checkout">
			</form>
		</div>
	</div>

<?php 
include('bottom.php');
} else {
	header('Location:signin.php');
} 
?>