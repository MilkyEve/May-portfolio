<?php
	session_start();

	if(!empty($_SESSION["userId"])) {
		require_once './views/dashboard.php';
	} else {
		require_once './views/login-form.php';
	}
?>
