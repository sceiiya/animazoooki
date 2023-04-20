// Customer Profile

var container = $('.profile-cont-r');
var linkAccount = $('#myAccount');
var linkPurchases = $('#myPurchases');
var linkCart = $('#mycart');
var linkVouchers = $('#myVouchers');
var linkPassword = $('#changePass');
var linkSettings = $('#mySettings');


function loadContent(content) {
  $.ajax({
      type: 'POST',
      url: content,
      success: (result) => {
          var element = $('<div/>');
          element.html(result);
          container.empty();
          container.prepend(element);
      }
  })

}

$(document).ready(()=>{
  loadContent('/profile/content/myprofile.php');
});
linkAccount.on('click', function(e){
  loadContent('/profile/content/myprofile.php');
  e.preventDefault() ;
});
linkPurchases.on('click', function(e){
  loadContent('/profile/content/mypurchases.php');
  e.preventDefault() ;
});
linkCart.on('click', function(e){
  loadContent('/profile/content/mycart.php');
  e.preventDefault() ;
});
linkVouchers.on('click', function(e){
  loadContent('/profile/content/myvouchers.php');
  e.preventDefault() ;
});
linkPassword.on('click', function(e){
  loadContent('/profile/content/changepass.php');
  e.preventDefault() ;
});
linkSettings.on('click', function(e){
  loadContent('/profile/content/mysettings.php');
  e.preventDefault() ;
});

let list = document.querySelectorAll('.profile-label-cont li');
function activelink() {
    list.forEach((item) =>
    item.classList.remove('hovered'));
    this.classList.add('hovered');
}
list.forEach((item) =>
item.addEventListener('mouseover', activelink));