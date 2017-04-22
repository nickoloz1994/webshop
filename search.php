<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
  	<script type="text/javascript" src="js/bootstrap.js"></script>
  	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<title>Main Page</title>
</head>
<body>

<div class="page-header">
  <h1 style="margin-left: 2%;">Experience the best Book Shop</h1>
</div>

<?php 

session_start();
require('config.php');
require_once('logged.php');

if (logged_in()) {
  include('authenticated_nav.php');
}
else{
  include('regular_nav.php');
}

if (isset($_GET['search'])) {
	
	$string = $_GET['searchinput'];

	$sql = "SELECT * FROM nick_books WHERE title LIKE '%".$string."%' OR author LIKE '%".$string."%'";
	$result = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result);
	
	if ($num > 0) {
?>

<div class="row">

	<?php
	while ($row=mysqli_fetch_array($result)) {
	?>

	<div class="col-sm-6 col-md-4">
      <div class="thumbnail">
        <img src="<?=$row["image"]?>" alt="...">
        <div class="caption">
          <h4><?=$row["title"]?></h4>
          <p><a href="product.php?id=<?=$row['id']?>" class="btn btn-primary" role="button">More...</a>
         </div>
      </div>
    </div>	
    <?php
	} //close while
	?>
</div>

<div class="text-center">
<?php
	}//close if block
	else{ 
?>
		<div class="alert alert-danger" role="alert"><h4>No results found</h4></div>
<?php
	}
}
?>

</div>

<?php
include('footer.php');
?>

</body>
</html>