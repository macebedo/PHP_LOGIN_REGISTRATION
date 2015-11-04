<?php
	session_start();

	if (!isset($_SESSION['user_name']) && !isset($_SESSION['member_id'])) {
	
		header('Location: login.php');
	}


?>
