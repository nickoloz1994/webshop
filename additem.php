<?php 
require('config.php');
include('top.php'); 

if (isset($_POST["submit"])) {

	$statement = $conn->prepare(
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
	  die("Prepare failed:(".$conn->errno. ") ".$conn->error);
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
	
	$conn->close();
}

?>

<!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add new item</h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        		<form method="post" action="upload.php">
				  <div class="form-group">
				    <label for="title">Book Title</label>
				    <input type="text" class="form-control" placeholder="Enter Book Title..." name="title" id="title" required>
				  </div>
				  <div class="form-group">
				    <label for="isbn">ISBN</label>
				    <input type="text" class="form-control" placeholder="Enter ISBN..." name="isbn" id="isbn" required>
				  </div>
  				  <div class="form-group">
				    <label for="pages">Pages</label>
				    <input type="text" class="form-control" placeholder="Enter Number of Pages..." name="pages" id="pages" required>
				  </div>
				  <div class="form-group">
				    <label for="lang">Language</label>
				    <input type="text" class="form-control" placeholder="Enter Language of Book..." name="lang" id="lang" required>
				  </div>
				  <div class="form-group">
				    <label for="ed">Edition</label>
				    <input type="text" class="form-control" placeholder="Enter Edition..." name="ed" id="ed" required>
				  </div>
				  <div class="form-group">
				    <label for="author">Author</label>
				    <input type="text" class="form-control" placeholder="Enter Author..." name="author" id="author" required>
				  </div>
				  <div class="form-group">
				    <label for="price">Price</label>
				    <input type="text" class="form-control" placeholder="Enter Price..." name="price" id="price" required>
				  </div>
				  <div class="form-group">
				    <label for="path">Image</label>
				    <input type="text" class="form-control" placeholder="Enter Relative path for image..." name="path" id="path" required>
				  </div>
				  <button type="submit" class="btn btn-default"  name="submit">Add Item</button>
				</form>
        	</div>
        </div>

<?php include('bottom.php'); ?>