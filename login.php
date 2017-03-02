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
	$_SESSION['username'] = $row['name'];
	$_SESSION['mail'] = $row['mail'];
	$_SESSION['surname'] = $row['surname'];
	$_SESSION['userid'] = $row['usrid'];
	$_SESSION['PHPSESSID'] = session_id();
	$_SESSION['subtotal'] = 0;
	$_SESSION['user_level'] = (int)$row['user_level'];

	header('Location: index.php');
	$conn->close();
}
else{
	echo "Login Failed!!!";
}

$conn->close();

?>