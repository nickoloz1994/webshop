<?php

if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(),'',time()-50000,'/');
}

$_SESSION = array();

session_destroy();

header("Location: index.php");

?>