// Customer Profile

var container = $('.profile-cont-r');
var linkAccount = document.querySelector('#myAccount');
var linkPurchases = document.querySelector('#myPurchases');
var linkCart = document.querySelector('#mycart');
var linkVouchers = document.querySelector('#myVouchers');
var linkPassword = document.querySelector('#changePass');
var linkSettings = document.querySelector('#mySettings');

function loadContent(content) {
    // AJAX request in Javascript
    var xhr = new XMLHttpRequest();
    xhr.open('POST', content, true);
    xhr.onload = function() {
      var el = document.createElement('div');
      el.innerHTML = this.response;
      container.empty();
      container.prepend(el);
    }
    xhr.send();
}

linkAccount.addEventListener('click', function(e){
  loadContent('/profile/content/myprofile.php');
  e.preventDefault() ;
});
linkPurchases.addEventListener('click', function(e){
  loadContent('/profile/content/mypurchases.php');
  e.preventDefault() ;
});
linkCart.addEventListener('click', function(e){
  loadContent('/profile/content/mycart.php');
  e.preventDefault() ;
});
linkVouchers.addEventListener('click', function(e){
  loadContent('/profile/content/myvouchers.php');
  e.preventDefault() ;
});
linkPassword.addEventListener('click', function(e){
  loadContent('/profile/content/changepass.php');
  e.preventDefault() ;
});
linkSettings.addEventListener('click', function(e){
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