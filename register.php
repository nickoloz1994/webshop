<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<title>Registration</title>
</head>
<body>

<?php
require_once("config.php");

if (isset($_POST["submit"])) {
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if ($conn->connect_error) {
  die("Connection to database failed:".$conn->connect_error);
}

$statement = $conn->prepare(
  "INSERT INTO `users`(
    `name`,
    `surname`,
    `mail`,
    `password`,
    `gender`)
  VALUES (?,?,?,PASSWORD(?),?)");

if (!$statement) {
  die("Prepare failed:(".$conn->errno. ") ".$conn->error);
}

$statement->bind_param("sssss",
  $_POST["fname"],
  $_POST["lname"],
  $_POST["mail"],
  $_POST["passwd"],
  $_POST["gender"]);

if ($statement->execute()) {
  header("location: userreg.php");
  exit();
}else{
  if ($statement->errno == 1062) {
    echo "This e-mail is already in use";
  }else{
    die("Execute failed: (".$statement->errno. ") ".$statement->error);
  }
}

$conn->close();
}

?>

<div class="jumbotron">
  <h1 style="margin-left: 2%;">Account Registration</h1>
  <p style="margin-left: 2%;">Please fill in the form</p>
</div>

<?php include('nav.php'); ?>

<form method="post" action="register.php">
  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" placeholder="Enter First Name..." style="width: 33%" name="fname" required="required">
  </div>
  <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" placeholder="Enter Last Name..." style="width: 33%" name="lname" required="required">
  </div>
  <div class="form-group">
    <label>Gender</label>
    <div class="radio">
  		<label style="position: relative;">
    		<input type="radio" name="gender" value="male" checked style="position: relative;"> Male
  		</label>
	</div>
	<div class="radio">
  		<label style="position: relative;">
    		<input type="radio" name="gender" value="female" style="position: relative;"> Female
  		</label>
	</div>
  </div>
  <div class="form-group">
    <label>Email address</label>
    <input type="email" class="form-control" placeholder="Email" style="width: 33%" name="mail" required="required">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Password" style="width: 33%" required="required">
  </div>
  <div class="form-group">
    <label>Confirm Password</label>
    <input type="password" class="form-control" placeholder="Password" style="width: 33%" name="passwd" required="required">
  </div>
  <div class="checkbox" style="margin-left: 2%;">
  	<label>
    	<input type="checkbox" name="agree" required="required">
    	Agree to terms and conditions
  	</label>
  </div>
  <button type="submit" class="btn btn-default" style="margin-left: 2%;margin-top: 0.5%; margin-bottom: 1%;" name="submit">Register</button>
</form>

<?php include('footer.php'); ?>


</body>
</html>