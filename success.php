<?php
session_start();
include('top.php'); 
?>

<!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Registration</h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
        	<div class="jumbotron">
        		<h1>Thank you!</h1>
        		<h3>You have successfully registered your account!</h3>
        		<p>Click the button below to sign in into your account</p>
        		<p><a class="btn btn-default btn-reg btn-lg" href="signin.php" role="button">Sign in</a></p>
        	</div>
        </div>

<?php include('bottom.php'); ?>