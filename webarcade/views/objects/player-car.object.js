export class PlayerCar {
	context;
	color;
	width;
	height;
	x;
	y;
	speed = 8;
	angle = 0;
	speedX = 0;
	speedY = 0;

	constructor(width, height, color, x, y, context) {
		this.x = x;
		this.y = y;
		this.color = color;
		this.width = width;
		this.height = height;
		this.context = context;
	}

	refresh() {
		let img = document.getElementById("car-" + this.color);
		this.context.save();
		this.x += this.speedX;
		this.y += this.speedY;
		this.context.translate(this.x, this.y);
		this.context.rotate(this.angle);
		this.context.drawImage(img, this.width / -2, this.height / -2, this.width, this.height);
		this.context.restore();
	}

	setSpeed(input) {
		if(input && input['ArrowUp']) {
			if(this.speed < 20 ) {
				if(this.speed < 10){
					this.speed += .06;
				} else if( this.speed > 10 && this.speed < 15) {
					this.speed += .03;
				}else {
					this.speed += .01;
				}	
			}
		} 
		else if (this.speed < 0 ) { this.speed = 0; }
		else if (this.speed > 0)  {	this.speed -= .01; }

		if(input && input['ArrowDown']) {
			this.speed -= .2;
		}
	}

	switchLane(input) {
		if(input && input['ArrowLeft']) {
			if(this.x === 225){	this.x = 220; }
			if(this.x === 355){	this.x = 350; }
			this.angle = -.1;
			this.speedX = -5;
		}
	
		if(input && input['ArrowRight']) {
			if(this.x === 225){	this.x = 230; }
			if(this.x === 95) { this.x = 100; }
			this.angle = .1;
			this.speedX = 5;
		}
	
		if(this.x === 95) {	this.angle = 0;	this.speedX = 0; }
		if(this.x === 225){ this.angle = 0;	this.speedX = 0; }
		if(this.x === 355){ this.angle = 0;	this.speedX = 0; }
	}
}
