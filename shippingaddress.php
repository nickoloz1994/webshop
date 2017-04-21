<?php 
session_start();

require('config.php');

$cust_id = $_SESSION['userid'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (isset($_POST['submit'])) {
  	$stmt = $conn->prepare(
  	"INSERT INTO nick_shipp_address(
  		`usr_id`,
  		`name`,
  		`address1`,
  		`address2`,
  		`country`,
  		`state`,
  		`city`,
  		`zip`,
  		`phone`)
  	VALUES (?,?,?,?,?,?,?,?,?)");  

  	$stmt->bind_param("sssssssss",	
  		$cust_id,
  		$_POST['fullname'],
  		$_POST['address1'],
  		$_POST['address2'],
  		$_POST['country2'],
  		$_POST['state'],
  		$_POST['city'],
  		$_POST['zip'],
  		$_POST['phone']);

  	$stmt->execute();
  }else{
    if (isset($_POST['cancel'])) {
      $id = $_SESSION['userid'];
      $ord_id = $_SESSION['order_id'];
      $sql = "DELETE FROM nick_orders WHERE cust_id='".$id."'";
      mysqli_query($conn,$sql);

      $sql = "DELETE FROM nick_order_details WHERE order_id='".$ord_id."'";
      mysqli_query($conn,$sql);

      header("Location:index.php");
    }
  }
}

$conn->close();

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  	<script type="text/javascript" src="js/bootstrap.js"></script>
  	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
  	<script type="text/javascript" src="plugins/countries.js"></script>
  	<script type="text/javascript" src="plugins/phone/bootstrap-formhelpers.js"></script>
  	<script type="text/javascript" src="plugins/phone/bootstrap-formhelpers-phone.en_US.js"></script>
  	<script type="text/javascript" src="plugins/phone/bootstrap-formhelpers-phone.js"></script>
  	<link rel="stylesheet" type="text/css" href="plugins/phone/bootstrap-formhelpers.css">
	<title>Shipping address</title>
</head>
<body>

<div class="container-fluid" style="width: 50%;">
<h1>Shipping address</h1>
	<form method="post" action="shippingaddress.php">
  		<div class="form-group">
  		  <label>Full Name:</label>
  		  <input type="text" class="form-control" placeholder="Enter your name..."		 style="width: 100%" name="fullname" required="required">
  		</div>
  		<div class="form-group">
  		  <label>Address line 1:</label>
  		  <input type="text" class="form-control" placeholder="Address line 1..." style="width: 100%" name="address1" required="required">
  		</div>
  		<div class="form-group">
  		  <label>Address line 2:</label>
  		  <input type="text" class="form-control" placeholder="Address line 2" style="width: 100%" name="address2">
  		</div>
  		<div class="form-group">
  		  <label>Country:</label>
  		  	<div >
				<script type= "text/javascript" src = "countries.js"></script>
				<select id="country2" name ="country2" class="form-control" required="required"></select>
			</div>
			<script language="javascript">
				populateCountries("country2");
			</script>
  		</div>
  		<div class="form-group">
  		  <label>City:</label>
  		  <input type="text" class="form-control" placeholder="City..." style="width: 100%" required="required" name="city">
  		</div>
  		<div class="form-group">
  		  <label>State/Province/Region:</label>
  		  <input type="text" class="form-control" placeholder="State/Province/Region..." style="width: 100%" name="state" required="required">
  		</div>
  		<div class="form-group">
  		  <label>ZIP:</label>
  		  <input type="text" class="form-control" placeholder="Postal code..." style="width: 100%" required="required" name="zip">
  		</div>
  		<div class="form-group">
  		  <label>Phone number:</label>
  		  	<select id="countries_phone1" class="form-control bfh-countries" data-country="US"></select>
			<br><br>
			<input type="text" class="form-control bfh-phone" data-country="countries_phone1" name="phone">
  		</div>
  		<button type="submit" class="btn btn-warning" style="margin-left: 2%;margin-top: 0.5%; margin-bottom: 1%; width: 30%;" name="submit">Proceed to payment</button>
	</form>
  <form action="shippingaddress.php" method="post">
        <button type="submit" class="btn btn-warning" style="margin-left: 2%;margin-top: 0.5%; margin-bottom: 1%; width: 30%;" name="cancel">Cancel</button>
      </form>
</div>

</body>
</html>