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

    
    var sPcat = $("#adminProdCat").val();
    var sPser = $("#adminProdSer").val();
    var ssname = $("#adminProdName").val();
    var sPprice = $("#adminProdPrice").val();
    var sPquantity = $("#adminProdQty").val();
    var sPsizes = $('#adminProdSizes').val();
    var sPvar = $('#adminProdVar').val();
    var sPdescription = $("#adminProdDesc").val();
    var sPdesign = $('#adminProdDesig').val();
    var sPmanu = $('#adminProdManuf').val();
    console.log(sPcat, sPser, ssname, sPprice, sPquantity, sPsizes, sPvar, sPdescription, sPdesign, sPmanu);

    if(sPmanu != '' && sPdesign != '' && sPdescription != '' && sPvar != '' && sPsizes != '' && sPquantity != '' && sPprice != '' && ssname != '' && sPser != '' && sPcat ){
        ValidateProdNAme(ssname);
    }else{
        toastr.warning('Please compleatte all fields', 'Blank Field Detected');
    }

});

function ValidateProdNAme(sPname){
    var blobb = {
        name: sPname
    };
    $.ajax({
        type: 'POST',
        url: "/controllers/admin/prodNameValidate.php",
        data: blobb,
        beforeSend: function () {
            var x = document.querySelector('#adminSpinner');
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        },
        success: (result) => {
          if (result == "new") {
            $('#confirm-addProd').modal('show');
        } else if(result == "exist"){
            toastr.warning('Please avoid duplication', 'Product Name Already Exist');
        }else if(result == "error validating"){
            toastr.error('Can\'t check if the product already exist', 'Error Validation');
        }else{
            toastr.error('Ask a Tech Support to Resolve', 'Something went wrong');
            ERROR_logger(result);
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

$("#yes-addProd").on('click', () => {
        var x = document.querySelector('#adminSpinner');
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
});
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
            sPphoto = $("#modPrevImg1").attr('src', JSON.parse(objRes.images)[0]);
            sPphoto = $("#modPrevImg2").attr('src', JSON.parse(objRes.images)[1]);
            sPphoto = $("#modPrevImg3").attr('src', JSON.parse(objRes.images)[2]);
            sPphoto = $("#modPrevImg4").attr('src', JSON.parse(objRes.images)[3]);

            // console.log(JSON.parse(objRes.images)[0]);
            sPcat = $("#productCat").val(objRes.category);
            sPser = $("#productSer").val(objRes.series);
            sPname = $("#productName").val(objRes.name);
            sPprice = $("#productPrice").val(objRes.price);
            sPquantity = $("#productQuantity").val(objRes.stocks);
            sPsizes = $('#productSizes').val(JSON.parse(objRes.sizes).join(', '));
            sPvar = $('#productVar').val(JSON.parse(objRes.variation).join(', '));
            sPdescription = $("#modDescription").val(objRes.description);
            sPdesign = $('#modDesign').val(objRes.designer);
            sPmanu = $('#modManuf').val(objRes.manufacturer);

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
$("#Modiffy").on('click', () => {
                $('#confirm-modProd').modal('show');
            // $('#modifyModal').modal('show');    
    // var nIndex = $("#indexer").val();
});

$("#yes-modProd").on('click', () => {

// confirm na modify
    // var nIndex = $("#indexer").val();
    var x = document.querySelector('#adminSpinner');
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
});
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



//   iImage = $("#productPhoto").prop('files')[0];
//   var form_data = new FormData();
//   form_data.append('name', sPname);
//   form_data.append('image', iImage);

//   $.ajax({
//       url: "/controllers/admin/admin_modify_save_img.php",
//       type: 'POST',
//       data: form_data,
//       contentType: false,
//       processData: false,
//       beforeSend: function () {
//           var x = document.querySelector('#adminSpinner');
//           if (x.style.display === "none") {
//               x.style.display = "block";
//           } else {
//               x.style.display = "none";
//           }
//       },
//       success: (result) => {
//           if (result == "Missing image file!") {
//               alert(result);
//           } else if (result == "Image file saved!") {
//               console.log(result);
//           } else if (result == "Failed to save image!") {
//               alert(result);
//               console.log(result);
//           } else {
//               console.log(result);
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

// });