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

$statement = $conn->prepare(
  "SELECT `title`,`isbn`,`price`,`pages`,`language`,`edition`,`author`,`image`
   FROM `books` WHERE `id`= ? ");
$statement->bind_param("i", $_GET["id"]);
$statement->execute();
$results = $statement->get_result();
$row = $results->fetch_assoc();
?>
<div>
  <div class="row" >
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
      <img src="<?=$row["image"]?>" class="img-responsive img-thumbnail" alt="Responsive image" style="position: relative;margin-left: 2%;">
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-top: 8%;">
      <span class="label label-success" style="font-size: 24px;position: relative; margin-left: 2%;">Price</span>
      <span class="label label-default" style="font-size: 24px;position: relative; margin-left: 2%; background-color: white; color: black;"><?=$row["price"]?>$</span>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-top: 6%;position: relative; float: right;">
    <form action="addtocart.php" method="post">
      <label class="label label-default" style="font-size: 18px;">Qty:</label>
        <select name="quantity">
          <?php
          for ($i=1; $i <= 30; $i++) { 
          ?>
          <option><?php echo "{$i}";?></option>
          <?php
          }
          ?>
        </select>
      <span class="label label-default" style="font-size: 24px; background-color: white; color: black;">Total:</span>
      
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <input type="submit" value="Add to cart" class="btn btn-warning" style="width: 100%; margin-top: 5%;">
      </form>  
    </div>
  </div>
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