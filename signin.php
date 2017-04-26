<?php 
require('config.php');
include('top.php'); 

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

<div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sign In</h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="login">
        <?php
        if ($failed) {
        	echo "<div class='alert alert-danger' role='alert'><h4>Username or Password is incorrect</h4></div>";
        }
        ?>
        	<form action="signin.php" method="post">
        		<div class="group">
        			<input type="email" name="usrmail" class="form-control" placeholder="Email Address..." required autofocus>
        		</div>
        		<div class="group">
        			<input type="password" name="usrpass" class="form-control" placeholder="Password..." required>
        		</div>
        		<button class="btn btn-warning btn-lg btn-block" type="submit" name="login">Sign in</button>
        	</form>
        </div>

<?php include('bottom.php'); ?>