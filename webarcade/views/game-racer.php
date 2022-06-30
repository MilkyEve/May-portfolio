	<style>
		body {
			background-color: #6327f1;
		}
		.game-container {
			margin: auto;
			width: 450px;
			height: 480px;
			background-color: #dfdfdf;
			margin-bottom: 10px;
		}
		.left {
			position: left;
		}
		.center {
			position: middle;
		}
		.right {
			position: right;
		}
		
	</style>
	<title>CanvasGames - Highway Racer</title>
</head>
<body>
		<div class="left">

		</div>

		<div class="center">
			<h1>Racer</h1>
			<div class="game-container" id="gameContainer">game container</div>
			<a href="./"><button>Back</button></a><button id="start-btn">Play</button>
		</div>

		<div class="right">
			<div class="leaderboard10">
				<?php
				$highscores = $highscoreService->getHighscoreByGameId('frogger', 10); 
				echo $outputService->createLeaderboard($highscores, "leaderboard10");
				?> 
			</div>
		</div>

		<div class="game-images">
			<img id="car-white" src="views/img/car-white.png">
			<img id="car-1" src="views/img/car-1.png">
			<img id="car-2" src="views/img/car-2.png">
			<img id="car-3" src="views/img/car-3.png">
			<img id="car-4" src="views/img/car-4.png">
			<img id="car-5" src="views/img/car-5.png">
			<img id="car-6" src="views/img/car-6.png">
			<img id="car-7" src="views/img/car-7.png">
			<img id="car-8" src="views/img/car-8.png">
		</div>
		
		<script type="module" src="views/scripts/highway-racer.game.js"></script>
</body>
</html>