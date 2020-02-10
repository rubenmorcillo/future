window.addEventListener("DOMContentLoaded", function(){
    var distritos = document.getElementsByClassName("land");
    for (let i=0; i<distritos.length; i++){
        distritos[i].addEventListener("mouseover", function (){
            var path = distritos[i];
            var point = path.getPointAtLength(199);
            console.log(point);
            updateToolTip(distritos[i]);
        });
        distritos[i].addEventListener("mouseout", function(){
            document.getElementsByClassName("mi_tooltip")[0].style.visibility = "hidden";
        });
    }
});

function updateToolTip(distrito){
    var toolTip = document.getElementsByClassName("mi_tooltip")[0];
    toolTip.style.left = event.clientX - 100 + "px";
    toolTip.style.top = event.clientY - 300 + "px";
    toolTip.style.visibility = "visible";
    // console.log(distrito.attributes["district"]);
    toolTip.textContent = distrito.attributes["district"].nodeValue;
}