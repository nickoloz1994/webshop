<?php 
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level']) != 1) {
  header("Location: signin.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<title>Add New Item</title>
</head>
<body>

<?php
require_once("config.php");

if (isset($_POST["submit"])) {
  $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if ($connection->connect_error) {
  die("Connection to database failed:".$connection->connect_error);
}

$statement = $connection->prepare(
  "INSERT INTO `nick_books`(
    `isbn`,
    `title`,
    `price`,
    `pages`,
    `language`,
    `edition`,
    `author`,
    `image`)
  VALUES (?,?,?,?,?,?,?,?)");

if (!$statement) {
  die("Prepare failed:(".$connection->errno. ") ".$connection->error);
}

$statement->bind_param("ssssssss",
  $_POST["isbn"],
  $_POST["title"],
  $_POST["price"],
  $_POST["pages"],
  $_POST["lang"],
  $_POST["ed"],
  $_POST["author"],
  $_POST["path"]);

if ($statement->execute()) {
  echo "You have successfully added a new item";
}else{
  if ($statement->errno == 1062) {
    echo "This item is already in database";
  }else{
    die("Execute failed: (".$statement->errno. ") ".$statement->error);
  }
}

$connection->close();

}

?>

<?php include('authenticated_nav.php'); ?>

<form method="post" action="upload.php">
  <div class="form-group">
    <label>Book Title</label>
    <input type="text" class="form-control" placeholder="Enter Book Title..." style="width: 33%" name="title" required="required">
  </div>
  <div class="form-group">
    <label>ISBN</label>
    <input type="text" class="form-control" placeholder="Enter ISBN..." style="width: 33%" name="isbn" required="required">
  </div>
  <div class="form-group">
    <label>Pages</label>
    <input type="text" class="form-control" placeholder="Enter Number of Pages..." style="width: 33%" name="pages" required="required">
  </div>
  <div class="form-group">
    <label>Language</label>
    <input type="text" class="form-control" placeholder="Enter Language of Book..." style="width: 33%" name="lang" required="required">
  </div>
  <div class="form-group">
    <label>Edition</label>
    <input type="text" class="form-control" placeholder="Enter Edition..." style="width: 33%" name="ed" required="required">
  </div>
  <div class="form-group">
    <label>Author</label>
    <input type="text" class="form-control" placeholder="Enter Author..." style="width: 33%" required="required" name="author">
  </div>
  <div class="form-group">
    <label>Price</label>
    <input type="text" class="form-control" placeholder="Enter Price..." style="width: 33%" name="price" required="required">
  </div>
  <div class="form-group">
    <label>Image</label>
    <input type="text" class="form-control" placeholder="Enter Relative path for image..." style="width: 33%" name="path" required="required">
  </div>
  <button type="submit" class="btn btn-default" style="margin-left: 2%;margin-top: 0.5%; margin-bottom: 1%;" name="submit">Add Item</button>
</form>

<?php include('footer.php'); ?>

</body>
</html>