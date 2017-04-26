<?php 
require('config.php');
include('top.php');
?>

<!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Search results</h1>
            </div>
        </div>
        <!-- /.row -->

		<?php 
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
                <div class="col-md-4 shop-item">
                    <a href="product.php?id=<?=$row['id']?>">
                        <img class="img-responsive" src="<?=$row["image"]?>" alt="<?=$row["title"]?>">
                    </a>
                    <h3 class="fit">
                        <a href="product.php?id=<?=$row['id']?>"><?=$row["title"]?></a>
                    </h3>
                </div>
            <?php } ?>
        </div>
        <!-- /.row -->

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

<?php include('bottom.php'); ?>