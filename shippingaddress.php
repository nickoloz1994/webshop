<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  	<script type="text/javascript" src="js/bootstrap.js"></script>
  	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<title>Shipping address</title>
</head>
<body>

<div class="container-fluid" style="width: 50%;">
<h1>Shipping address</h1>
	<form method="post" action="register.php">
  		<div class="form-group">
  		  <label>Full Name:</label>
  		  <input type="text" class="form-control" placeholder="Enter First Name..."		 style="width: 100%" name="fname" required="required">
  		</div>
  		<div class="form-group">
  		  <label>Address line 1:</label>
  		  <input type="text" class="form-control" placeholder="Enter Last Name..." style="width: 100%" name="lname" required="required">
  		</div>
  		<div class="form-group">
  		  <label>Address line 2:</label>
  		  <input type="text" class="form-control" placeholder="Email" style="width: 100%" name="mail" required="required">
  		</div>
  		<div class="form-group">
  		  <label>City:</label>
  		  <input type="text" class="form-control" placeholder="Password" style="width: 100%" required="required">
  		</div>
  		<div class="form-group">
  		  <label>State/Province/Region:</label>
  		  <input type="text" class="form-control" placeholder="Password" style="width: 100%" name="passwd" required="required">
  		</div>
  		<div class="form-group">
  		  <label>ZIP:</label>
  		  <input type="text" class="form-control" placeholder="Password" style="width: 100%" required="required">
  		</div>
  		<div class="form-group">
  		  <label>Country:</label>
  		  <input type="text" class="form-control" placeholder="Password" style="width: 100%" required="required">
  		</div>
  		<div class="form-group">
  		  <label>Phone number:</label>
  		  <input type="text" class="form-control" placeholder="Password" style="width: 100%" required="required">
  		</div>
  		<button type="submit" class="btn btn-warning" style="margin-left: 2%;margin-top: 0.5%; margin-bottom: 1%; width: 30%;" name="submit">Proceed to payment</button>
	</form>
</div>

</body>
</html>