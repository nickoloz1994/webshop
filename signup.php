<?php
session_start(); 
require('config.php');
include('top.php'); 

if (isset($_POST["submit"]) && ($_POST['passwd'] == $_POST['pass1'])) {
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if ($conn->connect_error) {
  die("Connection to database failed:".$conn->connect_error);
}

$statement = $conn->prepare(
  "INSERT INTO `nick_users`(
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
  header("location: success.php");
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

<!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Registration</h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="reg">
        	<form action="signup.php" method="post">
        		<div class="form-group">
        			<label for="name">First Name:</label>
        			<input type="text" name="fname" id="name" class="form-control" placeholder="Name..." required>
        		</div>
        		<div class="form-group">
        			<label for="surname">Last Name:</label>
        			<input type="text" name="lname" id="surname" class="form-control" placeholder="Last name..." required>
        		</div>
        		<div class="form-group">
        			<label for="gender">Gender: </label>
        			<input type="radio" name="gender" id="gender" value="male" checked> Male
        			<input type="radio" name="gender" id="gender" value="female" checked> Female
        		</div>
        		<div class="form-group">
        			<label for="mail">E-mail:</label>
        			<input type="email" name="mail" id="mail" class="form-control" placeholder="E-mail..." required>
        		</div>
        		<div class="form-group">
        			<label for="pass">Password:</label>
        			<input type="password" name="passwd" id="pass" class="form-control" placeholder="Password..." required>
        		</div>
        		<div class="form-group">
        			<label for="pass1">Confirm Password:</label>
        			<input type="password" name="pass1" id="pass1" class="form-control" placeholder="Confirm password..." required>
        		</div>
        		<div class="form-group">
        			<label for="agree">Agree with terms &amp; conditions</label>
        			<input type="checkbox" name="agree" id="agree" required>
        		</div>
        		<button type="submit" name="submit" class="btn btn-warning btn-lg">Sign up</button>
        	</form>
        </div>

<?php include('bottom.php'); ?>