window.addEventListener('load', faz);
let oi=true;
function faz(){
    let playerState = 'idle';
    let dropdown = document.getElementById('animate');
    console.log(dropdown);
    dropdown.addEventListener('change', function(e){
        playerState = e.target.value;
        oi=true;
    });

    let canvas = document.getElementById('canvas1');
    console.log(canvas);
    let ctx = canvas.getContext('2d');
    let CANVAS_WIDTH = canvas.width = 55;
    let CANVAS_HEIGHT = canvas.height = 75;

    let playerImage = new Image();
    playerImage.src = 'https://img.itch.zone/aW1hZ2UvNDc4MTIzLzI0NTgwMzkucG5n/original/ef7JSC.png';
    let spriteWidth = 55;
    let spriteHeight = 74;



    let gameFrame = 0;
    const staggerFrames = 25;
    const spriteAnimations = [];
    const animationStates = [
        {
            name: 'idle',
            frames: 3,
            spW: 55,
            spH: 74,
            stF: 25,
            posX: 0,
            posY: 0,
        },
        {
            name: 'sleep',
            frames: 3,
            spW: 55,
            spH: 74,
            stF: 25,
            posX: 0,
            posY: 1,
        },
        {
            name: 'run',
            frames: 3,
            spW: 55,
            spH: 74,
            stF: 5,
            posX: 0,
            posY: 2,
        },
        {
            name: "wake n' run",
            frames: 3,
            spW: 55,
            spH: 74,
            stF: 25,
            posX: 0,
            posY: 3,
        },
        {
            name: 'wake up',
            frames: 3,
            spW: 55,
            spH: 74,
            stF: 25,
            posX: 0,
            posY: 4,
        },
        {
            name: 'look',
            frames: 2,
            spW: 55,
            spH: 74,
            stF: 25,
            posX: 0,
            posY: 5,
        }
    ];
    animationStates.forEach((state, index) => {
        let frames = {
            loc: [],
            spW: [],
            spH: [],
            stF: [],
            posX: [],
            posY: [],
        }
        for (let j = 0; j < state.frames; j++){
            let positionX = j * state.spW;
            let positionY = state.posY * state.spH;
            frames.loc.push({x: positionX, y: positionY});
            frames.spW.push({W: state.spW});
            frames.spH.push({H: state.spH});
            frames.stF.push({F: state.stF});
        }
        
        spriteAnimations[state.name] = frames;
    });
    console.log(spriteAnimations);

    function animate(){

        ctx.clearRect(0, 0, CANVAS_WIDTH, CANVAS_HEIGHT);
        let pos = Math.floor(gameFrame/staggerFrames) % spriteAnimations[playerState].loc.length;
        let velocity = spriteAnimations[playerState].stF[pos].F;
        let position = Math.floor(gameFrame/velocity) % spriteAnimations[playerState].loc.length;
        
        let spriteW = spriteAnimations[playerState].spW[position].W;
        let spriteH = spriteAnimations[playerState].spH[position].H;
        
        let frameX = spriteW * position;
        let frameY = spriteAnimations[playerState].loc[position].y;

if(oi==true){
console.log(spriteW +"   "+ spriteH +"    "+ frameX +"    "+ frameY +"    "+ velocity +"    "+ playerState);
oi=false;
}
        ctx.drawImage(playerImage, frameX, frameY, spriteW, spriteH, 0, 0, spriteW, spriteH);

        gameFrame++;
        
        requestAnimationFrame(animate);
    };
    animate();
}
