volt = document.getElementById("reset");
next = document.getElementById("next");

var y = 0;

next.addEventListener("click", () =>{

    slide()
}
)

const imgs = document.getElementById("s");
const img = document.querySelectorAll("#s img");



function slide(){
    y++;

    if (y > img.length -1){
        y=0;
    }

    imgs.style.transform = "translateX(" + (-y * 100) + "vw)";
}

setInterval(slide, 5500);


volt.addEventListener("click", () =>{
    y--;

    if (y < 0){
        y=2;
    }

    imgs.style.transform = "translateX(" + (-y * 100) + "vw)";
}
)