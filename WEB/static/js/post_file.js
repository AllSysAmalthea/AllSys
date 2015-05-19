
window.onload=function(){
var file=document.querySelector("#file input[type='file']");
var text=document.querySelector("#file input[type='text']");
//var file=document.querySelector("#_file");
//var text=document.querySelector("#_text");
file.addEventListener("change",assign,false);
function assign(){
text.value=file.value;
}
} 
