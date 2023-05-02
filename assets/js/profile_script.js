// var varifcont ="";
// function updateprofpic() {
  
//   $.ajax({
//       type: 'POST',
//       url: content,
//       success: (result) => {
//           var element = $('<div/>');
//           element.html(result);
//           container.empty();
//           container.prepend(element);
//           myProfileEdit();
//           // varifcont = content;
//       }
//   })

// }
// mynewpicModal
// $(document).ready(function() {
// $('.profprevv').on('click', ()=> {
//   // const picInput = $(this).parent().find('#profpicc');
// $('#profpicc').click();
  
  // picInput.click();
// });
// });

document.querySelector('.profprevv').addEventListener('click', function() {
  document.querySelector('#profpicc').click();
  });

//for profile pic change
// $('.profprevv').on('click', function() {
//   const fileInput = $(this).parent().find('.file-input');
  
//   fileInput.click();
// });

//for profile pic change
$('#profpicc').on('change', function() {
  const previewContainer = $(this).parent();
  const preview = previewContainer.find('.preview');
  preview.html('');
  const files = $(this)[0].files;

  for (let i = 0; i < files.length && i < 4; i++) {
      const file = files[i];
      const reader = new FileReader();
      const fileType = file.type;

      if (fileType.match('image.*')) {
          reader.addEventListener('load', () => {
              const img = $('<img>').attr('src', reader.result);
              preview.html(img);
          });
          reader.readAsDataURL(file);
      }
  }

  var file = $('#profpicc')[0].files[0];
  var formData = new FormData();
  formData.append('file', file);

  $.ajax({
      url: '/controllers/profile_pic_update.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: function () {
        var x = document.querySelector('#LoadingSpinner');
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
      },
      success: (result)=>{
        if(result == 'true'){
          toastr.success("Profile Picture Updated");
        }else if(result == "false"){
          toastr.warning("Failed to upload profie picture", "Something went wrong");
        }else{
          console.log(result);
          toastr.error("Please ask for technical assistant to resolve this!", "Something went wrong");
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


// $('#profpicc').on('change', function() {
//   const previewContainer = $(this).parent();
//   const preview = previewContainer.find('#profpicprev');
//   preview.html('');
//   const files = $(this).files;

//       const file = files;
//       const reader = new FileReader();
//       const fileType = file.type;

//       if (fileType.match('image.*')) {
//           reader.addEventListener('load', () => {
//               const img = $('<img>').attr('src', reader.result);
//               preview.html(img);
//           });
//           reader.readAsDataURL(file);
      
//   }
// });


// Customer Profile

var container = $('.profile-cont-r');
var linkAccount = $('#myAccount');
var linkPurchases = $('#myPurchases');
var linkCart = $('#mycart');
var linkVouchers = $('#myVouchers');
var linkPassword = $('#changePass');
var linkSettings = $('#mySettings');
// myProfileEdit();
// setTimeout(myProfileEdit, 2000);


// var varifcont ="";
function loadContent(content) {
  $.ajax({
      type: 'POST',
      url: content,
      success: (result) => {
          var element = $('<div/>');
          element.html(result);
          container.empty();
          container.prepend(element);
          myProfileEdit();
          // varifcont = content;
      }
  })

}

$(document).ready(()=>{
  loadContent('/profile/content/myprofile.php');
  // setTimeout( ()=>{myProfileEdit()}, 2000);
  // myProfileEdit();
});
linkAccount.on('click', function(e){
  loadContent('/profile/content/myprofile.php');
  e.preventDefault() ;
  // setTimeout(myProfileEdit, 2000);
  // myProfileEdit();
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



function myProfileEdit() {
  var editBTN = $("#editBtn");
  // const restoreButton = $("#restoreReadonly");

  const Un = $("#userName");
  const Nm = $("#Name");
  const Em = $("#emailAdd");
  const Cell = $("#contactNo");
  const DefSA = $("#shippingAdd");
  const DefBA = $("#billingAdd");


  editBTN.on('click', function() {
    switch (editBTN.text()) {
      case "EDIT":
        $("#userName").prop("readonly", false);
        $("#Name").prop("readonly", false);
        Em.prop("readonly", false);
        Cell.prop("readonly", false);
        DefSA.prop("readonly", false);
        DefBA.prop("readonly", false);
        editBTN.text("SAVE");
        break;
    
      default:
        try{
          var iUn = $("#userName").val();
          var iNm = $("#Name").val();
          var iEm = $("#emailAdd").val();
          var iCell = $("#contactNo").val();
          var iDefSA = $("#shippingAdd").val();
          var iDefBA = $("#billingAdd").val();
          // var iDUn = $("#profile-uname").text();
        
          var UserUpdate = {
            username: iUn,
            name: iNm,
            email: iEm,
            cellno: iCell,
            ShipAd: iDefSA,
            BillAd:iDefBA
          };
        $.ajax({
          type: 'POST',
          url: "/controllers/profile_update.php",
          data: UserUpdate,
          success: (result) => {
            if(result == "updated"){
            toastr.success("Profile Updated");
            editBTN.text("EDIT");
            $(".profile-uname").text(iUn);
          }else{
            ERROR_logger(result);
          }
        }
      })}catch(error){
        ERROR_logger(error);
      }

        Un.prop("readonly", true);
        Nm.prop("readonly", true);
        Em.prop("readonly", true);
        Cell.prop("readonly", true);
        DefSA.prop("readonly", true);
        DefBA.prop("readonly", true);
        editBTN.text("EDIT");
        break;
    }
    // if(editBTN.text() == "EDIT"){
    // Un.prop("readonly", false);
    // N.prop("readonly", false);
    // Em.prop("readonly", false);
    // Cell.prop("readonly", false);
    // DefSA.prop("readonly", false);
    // DefBA.prop("readonly", false);
    // editBTN.text() = "SAVE"
    // }
  });
  
  // restoreButton.click(function() {
  //   myInput.prop("readonly", true);
  // });
};