<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<title>About My Store</title>
</head>
<body style="background-image: url(img/dev.jpg); background-size: cover; background-repeat: no-repeat;">

<?php 
require_once('logged.php');
if (logged_in()) {
  include('authenticated_nav.php');
}
else{
  include('regular_nav.php');
}
?>

<div class="jumbotron" style="background: rgba(204,204,204,0); font-weight: bold;">
	<div style="margin-left: 3%;">
  		<h1>Hello, world!</h1>
  		<p><h2>This is my first functional web application</h2></p>
  		<p><h3>Hope you will enjoy the experience</h3></p>
	</div>
</div>

</body>
</html>