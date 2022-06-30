import { PlayerCar } from "../objects/player-car.object.js";
import { Road } from "../objects/road.object.js";
import { TextArea } from "../objects/text-area.object.js";
import { Traffic } from "../objects/traffic.object.js";

var gameContainer = document.getElementById('gameContainer');
var playerCar;
var road;
var traffic;
var playerSpeedText;
var distanceTravelledText;
var highscoreText;

document.getElementById('start-btn').addEventListener('click', () => {
	gameStage.start();
	playerCar = new PlayerCar(70, 120, 'white', 225, 340, gameStage.context);
	road = new Road(gameStage.context);
	traffic = new Traffic(gameStage);

	playerSpeedText = new TextArea(12,'Consolas','white', 10, 470, gameStage.context)
	distanceTravelledText = new TextArea(12,'Consolas','white', 100, 470, gameStage.context)
	highscoreText = new TextArea(16,'Consolas','white', 10, 20, gameStage.context)
});

var gameStage = {
	canvas: document.createElement("canvas"),
	frames: 0,

	start: function () {
		if (this.interval) { clearInterval(this.interval); }

		this.canvas.width = 450;
		this.canvas.height = 480;
		this.canvas.style.backgroundColor = 'black';

		gameContainer.innerHTML = '';
		gameContainer.appendChild(this.canvas);

		this.context = this.canvas.getContext("2d");
		this.interval = setInterval(refreshStage, 20);

		window.addEventListener('keydown', function (e) {
            e.preventDefault();
            gameStage.input = (gameStage.input || []);
            gameStage.input[e.code] = (e.type == "keydown");
        });
        window.addEventListener('keyup', function (e) {
            gameStage.input[e.code] = (e.type == "keydown");
        });
	},

	clear: function () {
		this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
	},

	stop: function () {
		clearInterval(this.interval);
	}
}

function refreshStage() {
	gameStage.clear();
	gameStage.frames += 1;

	playerCar.setSpeed(gameStage.input);
	playerCar.switchLane(gameStage.input);
	road.speedY = playerCar.speed;

	playerSpeedText.refresh(`${(playerCar.speed * 10).toFixed()} Km/h`);
	distanceTravelledText.refresh(`Distance travelled: ${ (road.distanceTraveled / 1000).toFixed(1) } km`);
	highscoreText.refresh(`Highscore: ${road.points.toFixed()}`);

	road.refresh();
	playerCar.refresh();
	traffic.refresh(playerCar.speed);

	if(traffic.collisionCheck(playerCar)) {
		gameStage.stop();
		console.log('BAM!');
	}
}
