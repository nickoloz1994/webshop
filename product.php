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
	<title>Product</title>
</head>
<body>

<div class="page-header">
  <h1 style="margin-left: 2%;">Experience the best <small>We are quality</small></h1>
</div>

<?php 
require_once('config.php');
require_once('logged.php');
if (logged_in()) {
  include('authenticated_nav.php');
}
else{
  include('regular_nav.php');
}

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if ($conn->connect_error) {
  die("Connection to database failed: ".$conn->connect_error);
}
$statement = $conn->prepare(
  "SELECT `title`,`isbn`,`price`,`pages`,`language`,`edition`,`author`,`image`
   FROM `books` WHERE `id`= ? ");
$statement->bind_param("i", $_GET["id"]);
$statement->execute();
$results = $statement->get_result();
$row = $results->fetch_assoc();
?>

<div>
<img src="<?=$row["image"]?>" class="img-responsive img-thumbnail" alt="Responsive image" style="position: relative;margin-left: 2%;">
<span class="label label-success" style="font-size: 24px;position: relative; margin-left: 2%;">Price</span>
<span class="label label-default" style="font-size: 24px;position: relative; margin-left: 2%; background-color: white; color: black;"><?=$row["price"]?>$</span>
</div>

<div class="table-responsive">
  <table class="table table-hover">
  <tr>
  	<td>Title</td>
  	<td><?=$row["title"]?></td>
  </tr>
  <tr>
  	<td>Author</td>
  	<td><?=$row["author"]?></td>
  </tr>
  <tr>
  	<td>Edition</td>
  	<td><?=$row["edition"]?></td>
  </tr>
  <tr>
  	<td>ISBN-13</td>
  	<td><?=$row["isbn"]?></td>
  </tr>
  <tr>
  	<td>Pages</td>
  	<td><?=$row["pages"]?></td>
  </tr>
  <tr>
  	<td>Language</td>
  	<td><?=$row["language"]?></td>
  </tr>
  </table>
</div>

<?php include('footer.php'); ?>

</body>
</html>