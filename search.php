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
	
			$string = "%{$_GET['searchinput']}%";

            $stmt = $conn->prepare("SELECT * FROM nick_books WHERE title LIKE ? OR author LIKE ?");
            $stmt->bind_param("ss",$string,$string);
            $stmt->execute() or die("Failed");
			$result = $stmt->get_result();
			$num = $result->num_rows;
	
			if ($num > 0) {
		?>

		<div class="row">
            <?php 
                while ($row = $result->fetch_assoc()) {
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