// 初期設定
let canvas_mouse_event=false;
let oldX=0;
let oldY=0;
let bold_line=3;
let color="#cccccc";


const can=$("#drowarea")[0];
const ctx=can.getContext("2d");


$(can).on("mouedown",function(e){
    
    oldY=e.offsetY;
    oldX=e.offsetX;
});

$(can).on("mousemove",function(e){
    
    if(canvas_mouse_event==true){
        const px=e.offsetX;
        const py=e.offsetY;
        ctx.strokeStyle=color;
        ctx.lineWidth=bold_line;
        ctx.beginPath();
        ctx.lineJoin="round";
        ctx.lineCap="round";
        ctx.moveTo(oldX,oldY);
        ctx.lineTo(px,py);
        ctx.stroke();
        oldX=px;
        oldY=py;

    }
});