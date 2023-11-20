let outputWidth;
let outputHeight;

let faceTracker;
let videoInput;

let imgMask;
let imgFace;

let selected= -1;

function preload(){
    imgMask = loadImage("https://img.icons8.com/emoji/256/bear-emoji.png");
    imgFace = loadImage("https://img.icons8.com/emoji/256/melting-face-emoji.png");

}
function setup(){
   const maxWidth = Math.min(window.innerWidth,window.innerHeight);
    pixelDensity(1);
   outputHeight = maxWidth * 0.75;
   outputWidth = maxWidth;

   createCanvas(outputWidth,outputHeight);

   videoInput = createCapture(VIDEO);
   videoInput.size(outputWidth,outerHeight);
   videoInput.hide();

   const sel  = createSelect();
   const selectList = ['Mask','Face'];
   sel.option('Select filter', -1);
   for(let i =0; i < selectList.length;i++){
       sel.option(selectList[i],i);
   }
   sel.changed(applyFilter);

   faceTracker = new clm.tracker();
   faceTracker.init();
   faceTracker.start(videoInput.elt);
}

function applyFilter(){
    selected = this.selected();
}
function draw(){
  image(videoInput,0,0,outputWidth,outerHeight);
  switch(selected){
      case '-1': break;
      case '0': drawMask();break;
      case '1': drawFace();break;
  }
}
function drawMask(){
   const position = faceTracker.getCurrentPosition();
   if(position !== false){
       push();
       const wx = Math.abs(position[13][0] - position[1][0] * 1.2);
       const wy = Math.abs(position[7][1] -  Math.min(position[16][1], position[20][1])) * 1.2;
       translate(-wx/2, -wy/2);
       image(imgMask,position[62][0],position[62][1],wx,wy);
       pop();
   }
}

function drawFace(){
    const position = faceTracker.getCurrentPosition();
    if(position !== false){
        push();
        const wx = Math.abs(position[13][0] - position[1][0] * 1.2);
        const wy = Math.abs(position[7][1] -  Math.min(position[16][1], position[20][1])) * 1.2;
        translate(-wx/2, -wy/2);
        image(imgFace,position[62][0],position[62][1],wx,wy);
        pop();
    }
}

function windowResized(){
    const maxWidth = Math.min(window.innerWidth,window.innerHeight);
    pixelDensity(1);
    outputHeight = maxWidth * 0.75;
    outputWidth = maxWidth;
    resizeCanvas(outputWidth,outputHeight);
}