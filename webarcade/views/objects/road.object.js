export class Road {
	context;
	laneDividers = [];
	distanceTraveled = 0;
	points = 0;
	speedX = 0;
	speedY = 0;

	constructor(context) {
		this.context = context;
		let width = 3
		let height = 50
		this.laneDividers.push({ x: 160, y: this.context.canvas.height / 2, w: width, h: height });
		this.laneDividers.push({ x: 290, y: this.context.canvas.height / 2, w: width, h: height });
	}

	refresh() {
		this.laneDividers.forEach(ld => {

			if(ld.y >= this.context.canvas.height){
				ld.y = 0 - ld.h;
				this.distanceTraveled += 12.5;
				this.points += (this.distanceTraveled/1000) * this.speedY;;
			}

			this.context.fillStyle = 'white';
			ld.x += this.speedX;
			ld.y += this.speedY;
			this.context.fillRect(ld.x, ld.y, ld.w, ld.h);
		});
	}
}

