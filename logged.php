<?php 

function logged_in(){
	if (isset($_SESSION['username']) && isset($_SESSION['userid'])) {
		return true;
	}
	else{
		return false;
	}
}

?>