<?php

$_SESSION = array();

if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(),'',time()-50000,'/');
}

session_destroy();

header("Location: index.php");

?>