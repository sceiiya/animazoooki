
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
        toastr.warning('Please complete all fields', 'Blank Field Detected');
    }

});

function ValidateProdNAme(sPname){
    var nameprod = {
        name: sPname
    };
    $.ajax({
        type: 'POST',
        url: "/controllers/admin/prodNameValidate.php",
        data: nameprod,
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


$("#yes-addProd").on('click', () => {
        var x = document.querySelector('#adminSpinner');
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
});


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

  const modPrevImg1 = $("#modPrevImg1");
  const modPrevImg2 = $("#modPrevImg2");
  const modPrevImg3 = $("#modPrevImg3");
  const modPrevImg4 = $("#modPrevImg4");

  const productCat = $("#productCat");
  const productSer = $("#productSer");
  const productName = $("#productName");
  const productPrice = $("#productPrice");
  const productQuantity = $("#productQuantity");
  const productSizes = $('#productSizes');
  const productVar = $('#productVar');
  const modDescription = $("#modDescription");
  const modDesign = $('#modDesign');
  const modManuf = $('#modManuf');
  
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
            //   alert("Please call system admnistrator");
        } else {
            var objRes = JSON.parse(result);
            var imageUrls = JSON.parse(objRes.images);
            modPrevImg1.attr('src', imageUrls[0]);
            modPrevImg2.attr('src', imageUrls[1]);
            modPrevImg3.attr('src', imageUrls[2]);
            modPrevImg4.attr('src', imageUrls[3]);
            
                productCat.val(objRes.category);
                productSer.val(objRes.series);
                productName.val(objRes.name);
                productPrice.val(objRes.price);
                productQuantity.val(objRes.stocks);
                productSizes.val(JSON.parse(objRes.sizes).join(', '));
                productVar.val(JSON.parse(objRes.variation).join(', '));
                modDescription.val(objRes.description);
                modDesign.val(objRes.designer);
                modManuf.val(objRes.manufacturer);

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

$('#modClose').on('click', () => {
    modPrevImg1.attr('src', '');
    modPrevImg2.attr('src', '');
    modPrevImg3.attr('src', '');
    modPrevImg4.attr('src', '');

    productCat.val("");
    productSer.val("");
    productName.val("");
    productPrice.val("");
    productQuantity.val("");
    productSizes.val("");
    productVar.val("");
    modDescription.val("");
    modDesign.val("");
    modManuf.val("");
  });
  
// SAVE MODIFY PRODUCT
$("#Modiffy").on('click', () => {
    $('#confirm-modProd').modal('show');
});

$("#yes-modProd").on('click', () => {

// confirm modify
    var x = document.querySelector('#adminSpinner');
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
});
