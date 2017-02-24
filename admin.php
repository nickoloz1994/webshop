<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Admin</title>
</head>
<body>

<?php include('nav.php'); ?>

<div class="container" style="margin-left: 1%;">
	<div class="row">
		<div class="col-sm-6 col-md-4">
			<ul class="nav nav-pills nav-stacked">
  				<li role="presentation" class="active"><a href="upload.php">Add Items</a></li>
  				<li role="presentation"><a href="#">Change Account Details</a></li>
			</ul>
		</div>
		<div class="col-sm-6 col-md-4">
			<img src="img/admin.png" class="img-responsive img-thumbnail" alt="Admin image" style="position: relative;margin-left: 2%;">
			<div class="table-responsive" style="margin-top: 1.5%; width: 100%;">
  				<table class="table table-hover" style="width: 100%;">
  					<tr>
  						<td>First Name</td>
  						<td></td>
  					</tr>
  					<tr>
  						<td>Last Name</td>
  						<td></td>
  					</tr>
  					<tr>
  						<td>E-mail</td>
  						<td></td>
  					</tr>
  				</table>
			</div>
		</div>
	</div>
</div>


<?php include('stickyfooter.php'); ?>

</body>
</html>