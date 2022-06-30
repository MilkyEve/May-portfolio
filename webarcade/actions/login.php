<?php
	namespace webArcade;
	use \webArcade\UserService;

	if (!empty($_POST["login"])) {
		session_start();
		$username = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
		$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
		
		require_once ("../services/UserService.php");
		$userService = new UserService();

		$isLoggedIn = $userService->processLogin($username, $password);
		if (! $isLoggedIn) {
			$_SESSION["errorMessage"] = "Invalid Credentials";
		}
		
		header("Location: ../");
		exit();
	}
?>