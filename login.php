<?php

include('config.php');

$statement = $conn->prepare(
	"SELECT * FROM users WHERE mail = ? AND password = PASSWORD(?)");

$statement->bind_param("ss", $_POST["usrmail"], $_POST["usrpass"]);
$statement->execute();
$results = $statement->get_result();
$row = $results->fetch_assoc();

if ($row) {
	session_start();
	$_SESSION["user_level"] = (int)$_SESSION["user_level"];

	$url = ($_SESSION["user_level"] === 1) ? 'admin.php' : 'member.php';
	header('Location: '.$url);
	$conn->close();
}
else{
	echo "Login Failed!!!";
}

$conn->close();

?>