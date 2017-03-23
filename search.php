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

session_start();
require('config.php');
require_once('logged.php');
include('pager.php');

if (logged_in()) {
  include('authenticated_nav.php');
}
else{
  include('regular_nav.php');
}

if (isset($_POST['search'])) {
	$string = $_POST['searchinput'];
	$sql = "SELECT * FROM books WHERE title LIKE '%".$string."%' OR author LIKE '%".$string."%'";
	$result = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result);

	if ($num > 0) {
		$pager = new Pager();
		$pager->total = $num;
		$pager->pages = ceil($num/$pager->itemsPerPage);
		$pager->paginate();
		$i = 0;
		if ($i <= $pager->pages) {
  			$offset = ($pager->currentPage-1)*$pager->itemsPerPage;
  			$limit = $pager->itemsPerPage;

  			$sql = "SELECT * FROM books WHERE title LIKE '%".$string."%' OR author LIKE '%".$string."%' LIMIT $offset, $limit";
  			$results = mysqli_query($conn, $sql);

?>

<div class="row">

	<?php
	while ($row=mysqli_fetch_array($results)) {
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
	} //close while
	?>
</div>

<div class="text-center">
<?php
  $i++;
}//close if block
echo $pager->pageNumbers();
?>

</div>

<?php	
	}
}
include('footer.php');
?>

</body>
</html>