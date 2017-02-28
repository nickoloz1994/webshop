<?php 

function logged_in(){
	if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
		return true;
	}
	else{
		return false;
	}
}

?>