<?php
session_start(); 
require('config.php');
include('top.php'); 

$statement = $conn->prepare(
  "SELECT `title`,`isbn`,`price`,`pages`,`language`,`edition`,`author`,`image`
   FROM `nick_books` WHERE `id`= ? ");
$statement->bind_param("i", $_GET["id"]);
$statement->execute();
$results = $statement->get_result();
$row = $results->fetch_assoc();
?>

<!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?=$row["title"]?></h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        		<div class="row">
        			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        				<img src="<?=$row["image"]?>" class="img-responsive img-thumbnail" alt="<?=$row["title"]?>">
        			</div>
        			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        				<h4><span class="label label-success" >Price <?=$row["price"]?>$</span></h4>
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
        	</div>

        	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        		<?php if(logged_in()){ ?>
        				<form action="addtocart.php" method="post">
        						<div class="form-group">
                                    <div class="row">
        							    <label for="qty">Qty:</label>
        								<select name="quantity" id="qty">
                                            <?php for($i=1; $i <= 30; $i++){ ?>
                                                <option><?php echo "{$i}"; ?></option>
        								    <?php } ?>
                                        </select>
                                    </div>
                                    <div class="row">
        								<input type="hidden" name="id" value="<?=$_GET["id"]?>">
                                        <input type="submit" value="Add to cart" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
        		<?php } ?>
        	</div>
        </div>

<?php include('bottom.php'); ?>