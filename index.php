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
	<title>Main Page</title>
</head>
<body>

<div class="page-header">
  <h1 style="margin-left: 2%;">Experience the best <small>We are quality</small></h1>
</div>

<?php 

require_once('config.php');
require_once('logged.php');
include('pager.php');

if (logged_in()) {
  include('authenticated_nav.php');
}
else{
  include('regular_nav.php');
}

$pager = new Pager();

$results = $conn->query("SELECT id,title,image FROM books;");

$totalRecords = $results->num_rows;
$pager->total = $totalRecords;
$totalPages = ceil($totalRecords/$pager->itemsPerPage);
$pager->pages = $totalPages;
$pager->paginate();
$i = 0;
if ($i <= $totalPages) {
  $offset = ($pager->currentPage-1)*$pager->itemsPerPage;
  $limit = $pager->itemsPerPage;

  $sql = "SELECT * FROM books LIMIT $offset, $limit";
  $result = mysqli_query($conn, $sql);

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
    } //closing while block
  ?>
</div>

<div class="text-center">

<?php
  $i++;
}//closing if block
echo $pager->pageNumbers();
?>

</div>

<?php
include('footer.php'); 
?>

</body>
</html>