<?php
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level']) !=0) {
  header("Location: signin.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Member</title>
</head>
<body>

<?php include('nav.php'); ?>

<div class="container" style="margin-left: 1%;">
	<div class="row">
		<div class="col-sm-6 col-md-4">
			<ul class="nav nav-pills nav-stacked">
  				<li role="presentation" class="active"><a href="index.php">Account Details</a></li>
  				<li role="presentation"><a href="upload.php">Payment Details</a></li>
			</ul>
		</div>
		<div class="col-sm-6 col-md-4">
			<img src="img/user.png" class="img-responsive img-thumbnail" alt="Admin image" style="position: relative;margin-left: 2%;">
			<div class="table-responsive" style="margin-top: 1.5%; width: 100%;">
  				<table class="table table-hover" style="width: 100%;">
  					<tr>
  						<td>First Name</td>
  						<td>
                <?php
                if (isset($_SESSION['name'])) {
                  echo "{$_SESSION['name']}";
                }
                ?>      
              </td>
  					</tr>
  					<tr>
  						<td>Last Name</td>
  						<td>
                <?php
                if (isset($_SESSION['surname'])) {
                  echo "{$_SESSION['surname']}";
                }
                ?>      
              </td>
  					</tr>
  					<tr>
  						<td>E-mail</td>
  						<td>
                <?php
                if (isset($_SESSION['mail'])) {
                  echo "{$_SESSION['mail']}";
                }
                ?>      
              </td>
  					</tr>
  				</table>
			</div>
		</div>
	</div>
</div>

<?php include('stickyfooter.php'); ?>

</body>
</html>