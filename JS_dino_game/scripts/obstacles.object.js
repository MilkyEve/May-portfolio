export class Obstacles {
    context;
    gameStage;
    obstacles = []
    player;

    constructor(gameStage, player) {
        this.gameStage = gameStage;
        this.context = gameStage.context;
        this.x = gameStage.canvas.width;
        this.player = player;

        this.obstacles.push({x: gameStage.canvas.width, y: this.gameStage.canvas.height, w: 20, h: 20})
    }

    refresh() {
        console.log(this.obstacles.length)    
        if(this.everyinterval(50)){
            this.obstacles.push({x: this.gameStage.canvas.width, y: this.gameStage.canvas.height, w: 20, h: 20});
        }    
        this.obstacles.forEach((o, i, l) => {
            if(o.x < -o.w){
                l.splice(i, 1)
            }
            o.x -= 5;
            this.context.fillRect(o.x,(o.y-o.h), o.w, o.h)

            this.checkCollision(o);
        })

    }

    checkCollision(object){
        let ot = object.y;
        let ob = object.y + object.h;
        let ol = object.x;
        let or = object.x + object.w;

        let pt = this.player.y;
        let pb = this.player.y + this.player.height;
        let pl = this.player.x;
        let pr = this.player.x + this.player.width;

        if(
            ((pb >= ot && pb <= ob) || (pt >= ot && pt <= ob))
            &&
            ((pl >= ol && pl <= or) || (pr >= ol && pr <= or))
        )
        {
            this.gameStage.stop();
        }
    }
    everyinterval(n) {
        return (this.gameStage.frames / n) % 1 == 0 ? true : false;
    }

    randomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }
}