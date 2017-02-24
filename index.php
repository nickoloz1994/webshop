<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<title>Main Page</title>
</head>
<body>

<div class="page-header">
  <h1 style="margin-left: 2%;">Experience the best <small>We are quality</small></h1>
</div>

<?php 
include('nav.php');
require_once('config.php');

$results = $conn->query("SELECT id,title,image FROM books;");
$rows = $results->fetch_all(MYSQLI_ASSOC);
$conn->close();

?>

<div class="row">

<?php 
$i = 0;
while ($i < 1) {
foreach ($rows as $row ) {
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
  }
  $i++;
}
?>
</div>

<?php include('footer.php'); ?>

</body>
</html>