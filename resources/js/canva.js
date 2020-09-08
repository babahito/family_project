// 初期設定
let canvas_mouse_event=false;
let oldX=0;
let oldY=0;
let bold_line=3;
let color="#cccccc";


const can=$("#drowarea")[0];
const ctx=can.getContext("2d");


$(can).on("mousedown",function(e){
    oldY=e.offsetY;
    oldX=e.offsetX;
    canvas_mouse_event=true; 
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

$(can).on("mouseup",function(){
    canvas_mouse_event=false;
});

// クリアボタン
$("#clear_btn").on("click",function(){
    ctx.beginPath();
    ctx.clearRect(0,0,can.width,can.height);
});

//保存ボタン
$("#download").click(function(){
const canvas2=document.querySelector('#drowarea')
const mimeType='image/png';
const fileName='download.png';

const base64=canvas2.toDataURL(mimeType);

const bin=atob(base64.replace(/^.*,/,''));
const buffer=new Uint8Array(bin.length);
for(let i=0;i<bin.length;i++){
    buffer[i]=bin.charCodeAt(i);
}

const blob=new Blob([buffer.buffer],{
    type:mimeType
});

if(window.navigator.msSaveBlob){
    window.navigator.msSaveBlob(blob,filename);
}else if(window.URL && window.URL.createObjectURL){
    const a=document.createElement('a');
    a.download=fileName;
    a.href=window.URL.createObjectURL(blob);
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}else{
    window.open(base64,'_blank');
}
  });

// 背景色を指定
//   function setBgColor(){
//     // canvasの背景色を設定(指定がない場合にjpeg保存すると背景が黒になる)
//     ctx.fillStyle = bgColor;
//     ctx.fillRect(0,0,can.width,can.height);
//   }
