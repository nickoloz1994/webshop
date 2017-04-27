<?php 
require('config.php');
include('top.php');
include('pager.php'); 
?>

<!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Book Shop</h1>
            </div>
        </div>
        <!-- /.row -->

<?php
$pager = new Pager();

$stmt1 = $conn->prepare("SELECT id,title,image FROM nick_books;");
$stmt1->execute();
$results = $stmt1->get_result();

$totalRecords = $results->num_rows;
$pager->total = $totalRecords;
$totalPages = ceil($totalRecords/$pager->itemsPerPage);
$pager->pages = $totalPages;
$pager->paginate();
$i = 0;
if ($i <= $totalPages) {
  $offset = ($pager->currentPage-1)*$pager->itemsPerPage;
  $limit = $pager->itemsPerPage;

  $stmt = $conn->prepare("SELECT * FROM nick_books LIMIT ?, ?");
  $stmt->bind_param("ss",$offset,$limit);
  $stmt->execute() or die("Failed");
  $result = $stmt->get_result();

?>

        <!-- Projects Row -->
        <div class="row">
            <?php 
                while ($row=$result->fetch_assoc()) {
            ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 shop-item">
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

        <hr>

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <?php
                  $i++;
                }//closing if block
                echo $pager->pageNumbers();
                ?>
            </div>
        </div>
        <!-- /.row -->

        <hr>

<?php include('bottom.php'); ?>