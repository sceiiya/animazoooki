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


// SAVE PRODUCT

function addProduct() {
    $('#addProductModal').modal('show');
}

$("#saveProduct").on('click', () => {
    $('#confirm-addProd').modal('show');
})

$("#yes-addProd").on('click', () => {
    iCode = $("#adminProdCode").val();
    iName = $("#adminProdName").val();
    iPrice = $("#adminProdPrice").val();
    iQty = $("#adminProdQty").val();
    iDescription = $("#adminProdDesc").val();

    var sJsonProduct = {
        code: iCode,
        name: iName,
        price: iPrice,
        qty: iQty,
        description: iDescription,
    };

    $.ajax({
        type: 'POST',
        url: "/controllers/admin/admin_save_products.php",
        data: sJsonProduct,
        beforeSend: function () {
            var x = document.querySelector('#adminSpinner');
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        },
        success: (result) => {
            if (result == "Product info saved!") {
                $('#confirm-addProd').modal('hide');
                $('#addProductModal').modal('hide');
                alert(result)
                productsFetch();
            } else if (result == "Incomplete") {
                alert("Please fill out all fields");
                $('#confirm-addProd').modal('hide');
            } else if (result == "Failed to save!") {
                alert(result);
                $('#confirm-addProd').modal('hide');
            } else {
                alert(result);
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

    iImage = $("#adminProdImage").prop('files')[0];
    var form_data = new FormData();
    form_data.append('name', iName);
    form_data.append('image', iImage);

    $.ajax({
        url: '/controllers/admin/admin_save_products_img.php',
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
                productsFetch();
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