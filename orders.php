<?php 
require('config.php');
include('top.php'); 

if(logged_in()){
	$user_id = $_SESSION['userid'];

	$sql = "SELECT * FROM nick_order_details JOIN nick_orders ON nick_orders.order_id=nick_order_details.order_id JOIN nick_books ON nick_books.id=nick_order_details.product_id WHERE nick_orders.cust_id='".$user_id."'";
	$result = mysqli_query($conn,$sql);

?>

<div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Orders</h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
        	<a href="index.php">
  					<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home
			</a>
			<a href="member.php?id=<?=$user_id?>">
  					<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile
			</a>
        </div>

        <?php
		while($row=mysqli_fetch_array($result)){
		?>

        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<table class="table table-bordered table-wide">
					<tbody>
						<tr>
							<td rowspan="3" class="td2">
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
					</tbody>
				</table>
			</div>
        </div>

        <?php } ?>

<?php 
include('bottom.php');
} else {
	header('Location:signin.php');
}
?>