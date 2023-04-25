// $('input[type="number"]').on('keydown', function(e) {
// // var invalidChars = ['-', '+', 'e', 'E'];
// if (['-', '+', 'e', 'E'].includes(e.key)) {
// e.preventDefault();
// }
// });

// $('input[type="number"]').on('input', function() {
//     var max = parseInt($(this).attr('max'));
//     var value = parseInt($(this).val());
//     if (value > max) {
//       $(this).val(max);
//     }
// });

function ERROR_logger(nERROR){
    var err={
      error: nERROR
    };
    $.post("/controllers/admin/error_logger.php", err,
    ()=>{toastr.error("Please Report this to our support", "Something went wrong");}
    );
  }

$('input[type="number"]').on('keydown input', function(e) {
    var max = parseInt($(this).attr('max'));
    var value = parseInt($(this).val());

    if (['-', '+', 'e', 'E'].includes(e.key)) {
      e.preventDefault();
    }

    if (value > max) {
      $(this).val(max);
      alert('Maximum value exceeded');
    }
  });



// SAVE PRODUCT

function addProduct() {
    $('#addProductModal').modal('show');
}

$("#saveProduct").on('click', () => {
    $('#confirm-addProd').modal('show');
})

// $("#SubmitNewProduct").on('submit', function(e){
// // $("#addProductModal").on('submit', function(e){
//   e.preventDefault(); // Prevent form from submitting normally
  
//   // Get form data
//   var formData = new FormData(this);
  
//   // Send AJAX request
//   $.ajax({
//       url: '/controllers/admin/admin_save_products.php',
//       type: 'POST',
//       data: formData,
//       dataType: 'json',
//       cache: false,
//       contentType: false,
//       processData: false,
//       success: function(response){
//           // Handle success response
//           ERROR_logger(response);
//           console.log(response);
//           ERROR_logger(formData);
//           console.log(formData);
//       },
//       error: function(jqXHR, textStatus, errorThrown){
//           // Handle error response
//           console.log(textStatus, errorThrown);
//           ERROR_logger(jqXHR + textStatus + errorThrown);
//           ERROR_logger(formData);
//           console.log(formData);
//       }
//   });
// });


// $("#yes-addProd").on('click', () => {
//     iCode = $("#adminProdCode").val();
//     iName = $("#adminProdName").val();
//     iPrice = $("#adminProdPrice").val();
//     iQty = $("#adminProdQty").val();
//     iDescription = $("#adminProdDesc").val();

//     var sJsonProduct = {
//         code: iCode,
//         name: iName,
//         price: iPrice,
//         qty: iQty,
//         description: iDescription,
//     };

//     $.ajax({
//         type: 'POST',
//         url: "/controllers/admin/admin_save_products.php",
//         data: sJsonProduct,
//         beforeSend: function () {
//             var x = document.querySelector('#adminSpinner');
//             if (x.style.display === "none") {
//                 x.style.display = "block";
//             } else {
//                 x.style.display = "none";
//             }
//         },
//         success: (result) => {
//             if (result == "Product info saved!") {
//                 $('#confirm-addProd').modal('hide');
//                 $('#addProductModal').modal('hide');
//                 alert(result)
//                 productsFetch();
//             } else if (result == "Incomplete") {
//                 alert("Please fill out all fields");
//                 $('#confirm-addProd').modal('hide');
//             } else if (result == "Failed to save!") {
//                 alert(result);
//                 $('#confirm-addProd').modal('hide');
//             } else {
//                 alert(result);
//             }
//         },
//         complete: function () {
//             var x = document.querySelector('#adminSpinner');
//             if (x.style.display === "none") {
//                 x.style.display = "block";
//             } else {
//                 x.style.display = "none";
//             }
//         },
//     });

//     iImage = $("#adminProdImage").prop('files')[0];
//     var form_data = new FormData();
//     form_data.append('name', iName);
//     form_data.append('image', iImage);

//     $.ajax({
//         url: '/controllers/admin/admin_save_products_img.php',
//         type: 'POST',
//         data: form_data,
//         contentType: false,
//         processData: false,
//         beforeSend: function () {
//             var x = document.querySelector('#adminSpinner');
//             if (x.style.display === "none") {
//                 x.style.display = "block";
//             } else {
//                 x.style.display = "none";
//             }
//         },
//         success: (result) => {
//             if (result == "Missing image file!") {
//                 alert(result);
//             } else if (result == "Image file saved!") {
//                 productsFetch();
//                 console.log(result);
//             } else if (result == "Failed to save image!") {
//                 alert(result);
//                 console.log(result);
//             } else {
//                 console.log(result);
//             }
//         },
//         complete: function () {
//             var x = document.querySelector('#adminSpinner');
//             if (x.style.display === "none") {
//                 x.style.display = "block";
//             } else {
//                 x.style.display = "none";
//             }
//         },
//     });

// });


$(document).ready(function() {
    $('.file-input').on('change', function() {
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
    });

    $('.preview').on('click', function() {
        const fileInput = $(this).parent().find('.file-input');
        fileInput.click();
    });
});


// $(document).ready(function() {
//     $('.autoNumeric').autoNumeric('init');
// });

$(document).ready(function() {
    // select all input elements of type number
    $('input[type="number"]').each(function() {
      // get the input value as a number
      var num = parseFloat($(this).val());
  
      // if the input value is a valid number, format it with commas
      if (!isNaN(num)) {
        $(this).val(num.toLocaleString());
      }
    });
  });





  // MODIFY PRODUCT
function modify(nId) {
  $("#indexer").val(nId);

  $.ajax({
      type: 'POST',
      url: "/controllers/admin/admin_modify_prod.php",
      data: { nid: nId },
      beforeSend: function () {
          var x = document.querySelector('#adminSpinner');
          if (x.style.display === "none") {
              x.style.display = "block";
          } else {
              x.style.display = "none";
          }
      },
      success: (result) => {
          if (result == "error") {
              alert("Please call system admnistrator");
          } else {
              var objRes = JSON.parse(result);
            //   console.log(JSON.parse(objRes.sizes).join(', '));
              sPcat = $("#productCat").val(objRes.category);
              sPname = $("#productName").val(objRes.name);
              sPprice = $("#productPrice").val(objRes.price);
              sPquantity = $("#productQuantity").val(objRes.stocks);
              sPsizes = $('#productSizes').val(JSON.parse(objRes.sizes).join(', '));
              sPvar = $('#productVar').val(JSON.parse(objRes.variation).join(', '));
              sPdescription = $("#productDescription").val(objRes.description);
              sPdesign = $('#productDesig').val(objRes.designer);
              sPmanu = $('#productManuf').val(objRes.manufacturer);
              sPphoto = $("productPhoto").val(objRes.image);

              $('#modifyModal').modal('show');                
          }
      },
      complete: function () {
          var x = document.querySelector('#adminSpinner');
          if (x.style.display === "none") {
              x.style.display = "block";
          } else {
              x.style.display = "none";
          }
      },
  });
}

// SAVE MODIFY PRODUCT
$("#Modify").on('click', () => {
//   $('#confirm-modProd').modal('show');
// })

// $("#yes-modProd").on('click', () => {

//   var nIndex = $("#indexer").val();
//   var sPcat = $("#productCat").val();
//   var sPname = $("#productName").val();
//   var sPprice = $("#productPrice").val();
//   var sPquantity = $("#productQuantity").val();
//   var sPdescription = $("#productDescription").val();
//   var sPphoto = $("#productPhoto").val();

//   var sJsonData = {
//       index: nIndex,
//       pcat: sPcat,
//       pname: sPname,
//       pprice: sPprice,
//       pquantity: sPquantity,
//       pdescription: sPdescription,
//       pphoto: sPphoto
//   }

//   $.ajax({
//       type: 'POST',
//       url: "/controllers/admin/admin_modify_save.php",
//       data: sJsonData,
//       beforeSend: function () {
//           var x = document.querySelector('#adminSpinner');
//           if (x.style.display === "none") {
//               x.style.display = "block";
//           } else {
//               x.style.display = "none";
//           }
//       },
//       success: (result) => {
//           if (result == "updated") {
//               $('#confirm-modProd').modal('hide');
//               $('#modifyModal').modal('hide');
//               productsFetch();
//           } else {
//               alert(result);
//               $('#confirm-modProd').modal('hide');
//           }
//       },
//       complete: function () {
//           var x = document.querySelector('#adminSpinner');
//           if (x.style.display === "none") {
//               x.style.display = "block";
//           } else {
//               x.style.display = "none";
//           }
//       },
//   });



  iImage = $("#productPhoto").prop('files')[0];
  var form_data = new FormData();
  form_data.append('name', sPname);
  form_data.append('image', iImage);

  $.ajax({
      url: "/controllers/admin/admin_modify_save_img.php",
      type: 'POST',
      data: form_data,
      contentType: false,
      processData: false,
      beforeSend: function () {
          var x = document.querySelector('#adminSpinner');
          if (x.style.display === "none") {
              x.style.display = "block";
          } else {
              x.style.display = "none";
          }
      },
      success: (result) => {
          if (result == "Missing image file!") {
              alert(result);
          } else if (result == "Image file saved!") {
              console.log(result);
          } else if (result == "Failed to save image!") {
              alert(result);
              console.log(result);
          } else {
              console.log(result);
          }
      },
      complete: function () {
          var x = document.querySelector('#adminSpinner');
          if (x.style.display === "none") {
              x.style.display = "block";
          } else {
              x.style.display = "none";
          }
      },
  });

});