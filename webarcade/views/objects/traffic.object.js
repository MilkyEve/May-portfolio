export class Traffic {
	stage;
	fastLane = [];
	middleLane = [];
	slowLane = [];

	constructor(stage) {
		this.stage = stage;
	}

	refresh(playerSpeed) {
		if(this.everyinterval(400) ) {
			// let randomSpeed = Math.floor(Math.random() * (13 - 10)) + 10;
			let cartype = Math.floor(Math.random() * (9 - 1)) + 1;
			let freeLanes = this.freeLanes([this.fastLane,this.middleLane,this.slowLane]);
			let totalCars = this.numberOfCars([this.fastLane,this.middleLane,this.slowLane]);
			if(!this.fastLane.find(i => i.y < 0) && freeLanes > 1 && totalCars < 4){ 
				this.fastLane.push({w: 70, h: 120, c:cartype, x: 60, y: -150, s: 12});
			}
		}

		if(this.everyinterval(180) ) {
			let freeLanes = this.freeLanes([this.fastLane,this.middleLane,this.slowLane]);
			let totalCars = this.numberOfCars([this.fastLane,this.middleLane,this.slowLane]);
			let cartype = Math.floor(Math.random() * (9 - 1)) + 1;
			if(!this.middleLane.find(i => i.y < 0) && freeLanes > 1 && totalCars < 4){
				this.middleLane.push({w: 70, h: 120, c:cartype, x: 190, y: -150, s: 10});
			}
		}

		if(this.everyinterval(100) ) {
			let freeLanes = this.freeLanes([this.fastLane,this.middleLane,this.slowLane]);
			let totalCars = this.numberOfCars([this.fastLane,this.middleLane,this.slowLane]);
			let cartype = Math.floor(Math.random() * (9 - 1)) + 1;
			if(!this.slowLane.find(i => i.y < 0) && freeLanes > 1 && totalCars < 4){
				this.slowLane.push({w: 70, h: 120, c:cartype, x: 320, y: -150, s: 9});
			}
		}

		this.updateTrafficList(this.fastLane, playerSpeed);
		this.updateTrafficList(this.middleLane, playerSpeed);
		this.updateTrafficList(this.slowLane, playerSpeed);
	}

	updateTrafficList(list, playerSpeed) {
		list.forEach((car, index, list) => {

			if(car.y < 0 - car.h - 200){
				car.y = this.stage.canvas.height + car.h;
			}
			if(car.y > this.stage.canvas.height + 240){
				list.splice(index, 1);
			}

			let img = document.getElementById("car-" + car.c);
			let speedY = (car.s - playerSpeed) * -1;
			car.x += 0;
			car.y += speedY;
			this.stage.context.drawImage(img, car.x, car.y, car.w, car.h);
		});
	}

	freeLanes(lanes) {
		let freeLanes = 0;
		lanes.forEach(l => { if(!l.find(c => c.y < 0)) { freeLanes += 1; } });
		return freeLanes;
	}

	numberOfCars(lanes) {
		let totalCars = lanes[0].length;
		totalCars += lanes[1].length;
		totalCars += lanes[2].length;
		return totalCars;
	}

	collisionCheck(pc) {
		if(this.fastLane.find(c => this.calculateCollision(c, pc))){
			return true;
		}

		if(this.middleLane.find(c => this.calculateCollision(c, pc))){
			return true;
		}

		if(this.slowLane.find(c => this.calculateCollision(c, pc))){
			return true;
		}
	}

	calculateCollision(c, pc) {
		let pcTop = pc.y - pc.height/2; 
		let pcBtm = pc.y + pc.height/2;
		let pcLeft = pc.x - pc.width/2;
		let pcRight = pc.x + pc.width/2;;

		let cTop = c.y;
		let cBtm = c.y + c.h;
		let cLeft = c.x;
		let cRight = c.x + c.w;

		return (pcTop < cBtm && pcBtm > cTop) && (pcLeft < cRight && pcRight > cLeft);
	}

	everyinterval(n) {
		return (this.stage.frames / n) % 1 == 0 ? true : false;
	}
}