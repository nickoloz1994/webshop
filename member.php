<?php include('top.php'); ?>

<!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Member Page</h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        		<ul class="nav nav-stacked">
        			<li>
        				<a href="orders.php"><span class="glyphicon glyphicon-tags"></span> Orders</a>
        			</li>
        			<li>
        				<a href="#"><span class="glyphicon glyphicon-cog"></span> Change account settings</a>
        			</li>
        			<li>
        				<a href="#"><span class="glyphicon glyphicon-usd"></span> Payment details</a>
        			</li>
        		</ul>
        	</div>
        	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        		<div class="row">
        			<img src="img/user.png" class="img-thumbnail img-responsive">
        		</div>
        		<div class="row">
        			<table class="table table-hover table-responsive">
        				<tr>
  							<td>
  								First Name
  							</td>
  							<td>
                				<?php
                				if (isset($_SESSION['username'])) {
                				  echo "{$_SESSION['username']}";
                				}
                				?>      
              				</td>
  						</tr>
  						<tr>
  							<td>
  								Last Name
  							</td>
  							<td>
                				<?php
                				if (isset($_SESSION['surname'])) {
                			  	echo "{$_SESSION['surname']}";
                				}
                				?>      
              				</td>
  						</tr>
  						<tr>
  							<td>
  								E-mail
  							</td>
  							<td>
                				<?php
                				if (isset($_SESSION['mail'])) {
                			  	echo "{$_SESSION['mail']}";
                				}
                				?>      
              				</td>
  						</tr>
        			</table>
        		</div>
        	</div>
        </div>

<?php include('bottom.php'); ?>