<?php
	namespace webArcade;
	use \webArcade\UserService;

	require_once("./services/UserService.php");
	$userService = new UserService();
	require_once("./services/HighscoreService.php");
	$highscoreService = new HighscoreService();
	require_once("./services/OutputService.php");
	$outputService = new OutputService();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="./views/css/main-style.css" rel="stylesheet" type="text/css" />
	<title>Web Arcade - Games</title>
</head>
<body>
	<header>
		<div class="logo-container">
			<a href="./"><h1>Web Arcade</h1></a>
		</div>
		<div class="playerstatus-container">
		<?php
			$displayName = $userService->getUserByID($_SESSION["userId"]);
			echo "Hi, " . $displayName[0]['display_name'] . " | "
			?>
			<a href="./actions/logout.php">Logout</a>
		</div>
	</header>
	<div class="main-container">
		<div class="left-sidebar"></div>
		<div>
			<?php 
				if(!isset($_GET['game'])) {

					require_once('game-overview.php');

				} else {

					if($_GET['game'] == 'racer') {
						require_once('game-racer.php');
					}
					if($_GET['game'] == 'frogger') {
						require_once('game-frogger.php');
					}
					if($_GET['game'] == 'jumper') {
						require_once('game-jumper.php');
					}
				}
			?>
		</div>
		<div class="right-sidebar"></div>
		
		<script src="views/scripts/main-script.js"></script>
	</div>
</body>
</html>