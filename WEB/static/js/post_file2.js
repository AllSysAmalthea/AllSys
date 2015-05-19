var isIE = /msie/i.test(navigator.userAgent);
var isFF = /firefox/i.test(navigator.userAgent);
var detlaX,detlaY,ooo;

function beginDrag(me,evt){
 e = evt || window.event;
 ooo = me;
 document.onmousemove = move;
 document.onmouseup = up;
 if(isIE)me.setCapture();  
 if(isFF)window.captureEvents(Event.MOUSEMOVE|Event.MOUSEUP);
}
function move(evt){
  e = evt || window.event;
  document.getElementById("_file").style.left = e.clientX - 55 + "px";
  document.getElementById("_file").style.top = e.clientY  - 10 + "px";
 }
function up(){
 document.onmousemove = null;
 document.onmouseup = null;
 if(isIE)ooo.releaseCapture();
 if(isFF)window.releaseEvents(Event.MOUSEMOVE|Event.MOUSEUP);
}