const imgMainCont = document.querySelector(".product-img-cont");
const imgMainElm = document.querySelector(".product-img-main");
const imgSub = document.querySelector(".product-img-sub");
const imgSubCont = document.querySelector(".product-img-sub-cont-holder");

const ZOOM = 300;

imgMainCont.addEventListener("mouseenter", ()=>{
    imgMainElm.style.width = ZOOM + '%';
});

imgMainCont.addEventListener("mouseleave", ()=>{
    imgMainElm.style.width = '100%';
    imgMainElm.style.top = '0';
    imgMainElm.style.left = '0';
});

imgMainCont.addEventListener("mousemove", (mouseEvent)=>{
    let obj = imgMainCont;
    let obj_left = 0;
    let obj_top = 0;
    let xPos;
    let yPos;

    while(obj.offsetParent){
        obj_left += obj.offsetLeft;
        obj_top += obj.offsetTop;
        obj = obj.offsetParent
        console.log("obj_left: " + obj_left);
        console.log("obj_top: " + obj_top);
    }

    if(mouseEvent){
        xPos = mouseEvent.pageX;
        yPos = mouseEvent.pageY;
        console.log(mouseEvent);
        console.log("xPos: " + xPos);
        console.log("yPos: " + yPos);
    }else{
        xPos = window.event.x + document.body.scrollLeft - 2;
        yPos = window.event.y + document.body.scrollTop - 2;
        console.log("xPos: " + xPos);
        console.log("yPos: " + yPos);
    }

    xPos -= obj_left;
    yPos -= obj_top;

    const imgWidth = imgMainElm.clientWidth;
    const imgHeight = imgMainElm.clientHeight;

    imgMainElm.style.top = -(((imgHeight - this.clientHeight) * yPos) / this.clientHeight) + "px";
    // imgMainElm.style.left = -(((imgWidth - this.imgWidth) * xPos) / this.imgWidth) + "px";
});

Array.from(imgSubCont.children).forEach((prodImg, i, list) =>{
    prodImg.addEventListener("click", ()=>{
        const newSrc = prodImg.querySelector("img").src;
        imgMainElm.src = newSrc;

        list.forEach(prod => prod.classList.remove("active"));
        prodImg.classList.add("active");
    });
});

function cngeHeight(){
    imgMainCont.style.height = imgMainCont.clientHeight + 'px';
}
cngeHeight();
window.addEventListener('resize', cngeHeight);