const imgMainCont = document.querySelector(".product-img-cont");
const imgMainElm = document.querySelector(".product-img-cont img");
const imgSub = document.querySelector(".product-img-sub");
const imgSubCont = document.querySelector(".product-img-sub-cont-holder");

const ZOOM = 300;

// debugged
let isMoving = false;
let animationFrame;

function updateImage(xPos, yPos) {
  let obj = imgMainCont;
  let obj_left = 0;
  let obj_top = 0;

  while (obj.offsetParent) {
    obj_left += obj.offsetLeft;
    obj_top += obj.offsetTop;
    obj = obj.offsetParent;
  }

  xPos -= obj_left;
  yPos -= obj_top;

  const imgWidth = imgMainElm.clientWidth;
  const imgHeight = imgMainElm.clientHeight;

  imgMainElm.style.top = -(((imgHeight - imgMainCont.clientHeight) * yPos) / imgMainCont.clientHeight) + "px";
  imgMainElm.style.left = -(((imgWidth - imgMainCont.clientWidth) * xPos) / imgMainCont.clientWidth) + "px";
}

function onMouseMove(mouseEvent) {
  if (!isMoving) {
    isMoving = true;
    animationFrame = requestAnimationFrame(() => {
      updateImage(mouseEvent.pageX, mouseEvent.pageY);
      isMoving = false;
    });
  }
}

function onMouseLeave() {
  imgMainElm.style.width = '100%';
  imgMainElm.style.top = '0';
  imgMainElm.style.left = '0';
}

imgMainCont.addEventListener("mouseenter", () => {
  imgMainElm.style.width = ZOOM + '%';
});

imgMainCont.addEventListener("mouseleave", onMouseLeave);

imgMainCont.addEventListener("mousemove", onMouseMove);

//origin
// imgMainCont.addEventListener("mouseenter", () => {
//   imgMainElm.style.width = ZOOM + '%';
// });

// imgMainCont.addEventListener("mouseleave", () => {
//   imgMainElm.style.width = '100%';
//   imgMainElm.style.top = '0';
//   imgMainElm.style.left = '0';
// });

// imgMainCont.addEventListener("mousemove", (mouseEvent) => {
//   let obj = imgMainCont;
//   let obj_left = 0;
//   let obj_top = 0;
//   let xPos;
//   let yPos;

//   while (obj.offsetParent) {
//     obj_left += obj.offsetLeft;
//     obj_top += obj.offsetTop;
//     obj = obj.offsetParent;
//   }

//   if (mouseEvent) {
//     xPos = mouseEvent.pageX;
//     yPos = mouseEvent.pageY;
//   } else {
//     xPos = window.event.x + document.body.scrollLeft - 2;
//     yPos = window.event.y + document.body.scrollTop - 2;
//   }

//   xPos -= obj_left;
//   yPos -= obj_top;

//   const imgWidth = imgMainElm.clientWidth;
//   const imgHeight = imgMainElm.clientHeight;

// imgMainElm.style.top = -(((imgHeight - imgMainCont.clientHeight) * yPos) / imgMainCont.clientHeight) + "px";
// imgMainElm.style.left = -(((imgWidth - imgMainCont.clientWidth) * xPos) / imgMainCont.clientWidth) + "px";

// // imgMainElm.style.top = -(((imgHeight - this.clientHeight) * yPos) / this.clientHeight) + "px ";
// // imgMainElm.style.left = -(((imgWidth - this.clientWidth) * xPos) / this.clientWidth) + "px ";
  

// //   imgMainElm.style.transform = `trsndlateY({-(((imgHeight - imgMainCont.clientHeight) * yPos) / imgMainCont.clientHeight)}px)`;
//   //   imgMainElm.style.top = -(((imgHeight - this.clientHeight) * yPos) / this.clientHeight) + "px ";
//     // imgMainElm.style.transform = `trsndlateX({-(((imgWidth - this.clientWidth) * xPos) / this.clientWidth)}px)`;
  
// });


Array.from(imgSubCont.children).forEach((productElm, i, list) => {
  productElm.addEventListener("click", () => {
    const newSrc = productElm.querySelector("img").src;
    imgMainElm.src = newSrc;

    list.forEach(prod => prod.classList.remove("active"));
    productElm.classList.add("active");
  });
});

function cngeHeight() {
  imgMainCont.style.height = imgMainCont.clientHeight + 'px';
}

cngeHeight();
window.addEventListener('resize', cngeHeight);