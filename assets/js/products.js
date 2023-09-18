const imgMainCont = document.querySelector(".product-img-cont");
const imgMainElm = document.querySelector(".product-img-cont img");
const imgSub = document.querySelector(".product-img-sub");
const imgSubCont = document.querySelector(".product-img-sub-cont-holder");

const ZOOM = 300;

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

Array.from(imgSubCont.children).forEach((productElm, i, list) => {
  productElm.addEventListener("click", () => {
    const newSrc = productElm.querySelector("img").src;
    imgMainElm.src = newSrc;

    list.forEach(prod => prod.classList.remove("active"));
    productElm.classList.add("active");
  });
});

$(document).ready(async()=>{
  similarItems();
});

async function similarItems(){
  try{
    $.get('/controllers/get_randSimilar.php', (data, status)=>{
      if (status === "success"){
        $('#sim-prods').append(data);
      }
    });
  }catch(error){
      ERROR_logger(error);
  }
}

const ThisPID = $('#pID');
$('#CARTbtn').on('click', ()=>{
  var pId = {id: ThisPID.val()};
  $.ajax({
    type: 'POST',
    url: "/controllers/add_cart.php",
    data: pId,
    beforeSend: function () {
      var x = document.querySelector('#LoadingSpinner');
      if (x.style.display === "none") {
          x.style.display = "block";
      } else {
          x.style.display = "none";
      }
      },
    success: (result) => {
      if (result == "true") {
        toastr.success('You can now view this product in your cart <a href="/profile/cart/">here!<a/>', 'Product Added to Cart');
      }else if(result == "false"){
          toastr.warning('Failed to add product in your cart', 'Something went wrong!');
      }else{
        toastr.error('Ask a Tech Support to Resolve', 'Something went wrong');
        ERROR_logger(result);
      }
    },
    complete: function () {
      var x = document.querySelector('#LoadingSpinner');
      if (x.style.display === "none") {
          x.style.display = "block";
      } else {
          x.style.display = "none";
      }
    },
  });
});

$('#BUYbtn').on('click', ()=>{
  ThisPID.val()
});