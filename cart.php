<?php
session_start();
include('config.php');

$session_id = $_SESSION['PHPSESSID'];
$stmt = "SELECT * FROM cart INNER JOIN books ON cart.product_id=books.id WHERE cart.session_id='".$session_id."'";
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
  <h1 style="margin-left: 2%;">Experience the best <small>We are quality</small></h1>
</div>



<?php include('authenticated_nav.php'); ?>
<div class="row" style="width: 60%;position: relative; float: left;">
	<div class="col-md-3">
		<label style="font-size: 26px;">Shopping cart</label>
	</div>
	<div class="col-md-3">
		
	</div>
	<div class="col-md-2" style="margin-top: 1%;">
		<label>Price</label>
	</div>
	<div class="col-md-1" style="margin-top: 1%;">
		<label>Quantity</label>
	</div>
</div>

<?php
if($num > 0){
	while($row = mysqli_fetch_assoc($result)){
?>

<div class="row" style="width: 60%;position: relative; float: left;margin-top: 1%;">
	<div class="col-md-3">
		<img class="img-responsive" src="<?=$row['image']?>" alt="<?=$row['title']?>" style="max-height: 40%;max-width: 40%;margin-left: 40%;">
	</div>
	<div class="col-md-3" style="margin-top: 2%;">
		<span class="label label-info" style="font-size: 16px;"><?=$row['title']?></span>
	</div>
	<div class="col-md-2" style="margin-top: 2%;">
		<span class="label label-info" style="font-size: 16px;"><?=$row['price']?></span>
	</div>
	<div class="col-md-1" style="margin-top: 2%;">
		<select name="quantity">
          <?php
          for ($i=1; $i <= 30; $i++) { 
          ?>
          <option><?php echo "{$i}";?></option>
          <?php
          }
          ?>
        </select>
	</div>
</div>
<?php
	}
}
?>

</body>
</html>