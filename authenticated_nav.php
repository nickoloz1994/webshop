<?php
$id = $_SESSION['userid'];
$url = $_SESSION['user_level'] == 1 ? "admin.php?id=$id" : "member.php?id=$id";
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<title></title>
</head>
<body>

<?php 
require_once('config.php');

?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">
      	<img alt="Brand" src="img/store.png" height="50px" width="50px">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Store<span class="sr-only">(current)</span></a></li>
        <li><a href="about.php">About</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Books</a></li>
            <li><a href="#">Laptops</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
      <div class="row" style="width: 25%;position: relative;float: right;margin-top: 8px;">
        <div class="col-md-3" style="margin-left: 10%;padding: 0;">
          <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Hello <?=$_SESSION['username']?>
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href=<?php echo $url; ?> >Profile</a></li>
            <li><a href="orders.php">Orders</a></li>
          </ul>
        </div>
        </div>
        <div class="col-md-3" style="position: relative;margin-left: 11%;padding: 0;">
          <form action="logout.php">
            <input type="submit" value="Sign Out" class="btn btn-default">
          </form>
        </div>
        <div class="col-md-3" style="width: 15%;position: relative;padding: 0; margin-left: 5%;">
          <a href="cart.php" class="btn btn-default" aria-label="Left Align">
            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
          </a>
        </div>
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</body>
</html>