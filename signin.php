<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
	<title>Sign in</title>
</head>
<body>

<?php

include('config.php');

$failed = false;

if (isset($_POST['login'])) {
$statement = $conn->prepare(
  "SELECT * FROM nick_users WHERE mail = ? AND password = PASSWORD(?)");

$statement->bind_param("ss", $_POST["usrmail"], $_POST["usrpass"]);
$statement->execute();
$results = $statement->get_result();
$row = $results->fetch_assoc();

if ($row) {
  session_start();
  $_SESSION['username'] = $row['name'];
  $_SESSION['mail'] = $row['mail'];
  $_SESSION['surname'] = $row['surname'];
  $_SESSION['userid'] = $row['usrid'];
  $_SESSION['PHPSESSID'] = session_id();
  $_SESSION['subtotal'] = 0;
  $_SESSION['user_level'] = (int)$row['user_level'];

  header('Location: index.php');
  $conn->close();
}
else{
  $failed = true;
}
}

$conn->close();

?>
<div class="container" style="margin-top: 15%;">
      <form action="signin.php" method="post">
        <?php
        if ($failed) {
        ?>
          <div class="alert alert-danger" role="alert" style="width: 40%; margin: auto;"><h4>Username or Password is incorrect</h4></div>
        <?php
        }
        ?>
        <div class="form-group" style="width: 60%;margin: auto;">
        <h2 style="text-align: center;">Login</h2>
        <input type="email" name="usrmail" class="form-control" placeholder="Email address" required autofocus style="min-width: 100%; margin: auto;"><br><br>
        <input type="password" name="usrpass" class="form-control" placeholder="Password" required style="min-width: 100%; margin: auto;"><br><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login" style="min-width: 100%; margin-left: auto; margin-right: auto;">Sign in</button>
        </div>
      </form>
</div>



</body>
</html>