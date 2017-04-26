<?php 
session_start();
include('logged.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IT Books</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Form helper plugins -->
    <script type="text/javascript" src="plugins/countries.js"></script>
    <script type="text/javascript" src="plugins/phone/bootstrap-formhelpers.js"></script>
    <script type="text/javascript" src="plugins/phone/bootstrap-formhelpers-phone.en_US.js"></script>
    <script type="text/javascript" src="plugins/phone/bootstrap-formhelpers-phone.js"></script>
    <link rel="stylesheet" type="text/css" href="plugins/phone/bootstrap-formhelpers.css">

</head>

<body>

<?php 
if (logged_in()) {
    include('auth_navbar.php');     
} else {
    include('reg_navbar.php');
}

?>