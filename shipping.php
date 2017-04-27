<?php 
require('config.php');
include('top.php');

$cust_id = $_SESSION['userid'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (isset($_POST['submit'])) {
    $stmt = $conn->prepare(
    "INSERT INTO nick_shipp_address(
        `usr_id`,
        `name`,
        `address1`,
        `address2`,
        `country`,
        `state`,
        `city`,
        `zip`,
        `phone`)
    VALUES (?,?,?,?,?,?,?,?,?)");  

    $stmt->bind_param("sssssssss",  
        $cust_id,
        $_POST['fullname'],
        $_POST['address1'],
        $_POST['address2'],
        $_POST['country2'],
        $_POST['state'],
        $_POST['city'],
        $_POST['zip'],
        $_POST['phone']);

    $stmt->execute();
  }else{
    if (isset($_POST['cancel'])) {
      $id = $_SESSION['userid'];
      $ord_id = $_SESSION['order_id'];
    
      $stmt1 = $conn->prepare("DELETE FROM nick_orders WHERE cust_id = ?");
      $stmt1->bind_param("s",$id);
      $stmt1->execute() or die("Failed");

      $stmt2 = $conn->prepare("DELETE FROM nick_order_details WHERE order_id = ?");
      $stmt2->bind_param("s",$ord_id);
      $stmt2->execute() or die("Failed");

      header("Location:index.php");
    }
  }
}

$conn->close();
?>

<!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Shipping Address</h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
        		<form action="shipping.php" method="post">
        			<div class="form-group">
        				<label for="name">Full Name:</label>
  		  				<input type="text" class="form-control" placeholder="Full name..." id="name" name="fullname" required>
        			</div>
        			<div class="form-group">
        				<label for="address1">Address line 1:</label>
  		  				<input type="text" class="form-control" placeholder="Address line 1..." id="address1" name="address1" required>
        			</div>
        			<div class="form-group">
        				<label for="address2">Address line 2:</label>
  		  				<input type="text" class="form-control" placeholder="Address line 2..." id="address2" name="address2">
        			</div>
        			<div class="form-group">
        				<label for="country">Country:</label>
  		  					<div>
				  				<script type= "text/javascript" src = "countries.js"></script>
				  				<select id="country2" name ="country2" id="country" class="form-control" required></select>
			  				</div>
						<script language="javascript">populateCountries("country2");</script>
        			</div>
        			<div class="form-group">
        				<label for="city">City:</label>
  		  				<input type="text" class="form-control" placeholder="City..." id="city" required name="city">
        			</div>
        			<div class="form-group">
        				<label>State/Province/Region:</label>
  		  				<input type="text" class="form-control" placeholder="State/Province/Region..." name="state" required>
        			</div>
        			<div class="form-group">
        				<label>ZIP:</label>
  		  				<input type="text" class="form-control" placeholder="Postal code..." required name="zip">
        			</div>
        			<div class="form-group">
        				<label for="countries_phone1">Phone number:</label>
        				<div class="row">
        					<div class="col-md-3">
  		  						<select id="countries_phone1" class="form-control bfh-countries" data-country="US"></select>
  		  					</div>
							<div class="col-md-9">
								<input type="text" class="form-control bfh-phone" data-country="countries_phone1" name="phone">
							</div>
						</div>
        			</div>
        			<div class="form-group">
        				<button type="submit" class="btn btn-warning" name="submit">Proceed to payment</button>
        			</div>
        		</form>
        		<form action="shipping.php" method="post">
      				<button type="submit" class="btn btn-danger" name="cancel">Cancel</button>
  				</form>
        	</div>
        </div>

<?php include('bottom.php'); ?>