//menu toggle
// let toggle = document.querySelector('.toggle');
// let navigation = document.querySelector('.navigation');
// let main = document.querySelector('.mainAdmin');

// toggle.onclick = function() {
//     navigation.classList.toggle('active');
//     main.classList.toggle('active');
// }

// add hovered class on selected list items
let list = document.querySelectorAll('.navigation li');
function activelink() {
    list.forEach((item) =>
        item.classList.remove('hovered'));
    this.classList.add('hovered');
}
list.forEach((item) =>
    item.addEventListener('mouseover', activelink));

// ADMIN
var container = $('.mainAdmin');
var adminDashboard = $('#adminDashboard');
var adminProducts = $('#adminProducts');
var adminCustomers = $('#adminCustomers');
var adminOrders = $('#adminOrders');
var adminUsers = $('#adminUsers');
var adminAccess = $('#adminAccess');
var adminChangePass = $('#adminChangePass');
var adminSignout = $('#adminSignout');

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

$(document).ready(function () {
    loadContent('/controllers/admin/admin_dashboard.php');
    var access = $('#accessChecker').val();
    if(access != "System Admin") {
        adminAccess.css('display', 'none');
    } else {
        adminAccess.css('display', 'default');
    }
});
adminDashboard.on('click', function (e) {
    loadContent('/controllers/admin/admin_dashboard.php');
    e.preventDefault();
});
adminProducts.on('click', function (e) {
    loadContent('/controllers/admin/admin_products.php');
    e.preventDefault();
    productsFetch();
});
adminCustomers.on('click', function (e) {
    loadContent('/controllers/admin/admin_customers.php');
    e.preventDefault();
    customersFetch();
});
adminOrders.on('click', function (e) {
    loadContent('/controllers/admin/admin_orders.php');
    e.preventDefault();
    ordersFetch();
});
adminUsers.on('click', function (e) {
    loadContent('/controllers/admin/admin_users.php');
    e.preventDefault();
    adminusersFetch();
});
adminAccess.on('click', function (e) {
    loadContent('/controllers/admin/admin_access.php');
    e.preventDefault();
});
adminChangePass.on('click', function (e) {
    loadContent('/controllers/admin/admin_pass_change_page.php');
    e.preventDefault();
});


// FETCH

function productsFetch() {

    $.ajax({
        type: 'POST',
        url: "/controllers/admin/admin_products.php",
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
                $(".mainAdmin").html(result);
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

function customersFetch() {

    $.ajax({
        type: 'POST',
        url: "/controllers/admin/admin_customers.php",
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
                $(".mainAdmin").html(result);
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

function ordersFetch() {

    $.ajax({
        type: 'POST',
        url: "/controllers/admin/admin_orders.php",
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
                $(".mainAdmin").html(result);
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

function adminusersFetch() {

    $.ajax({
        type: 'POST',
        url: "/controllers/admin/admin_users.php",
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
                $(".mainAdmin").html(result);
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


// MODALS

function addProduct() {
    $('#addProductModal').modal('show');
}


// DATABASE RELATED

// SAVE PRODUCT
$("#saveProduct").on('click', () => {
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
                $('#addProductModal').modal('hide');
                alert(result)
                // productsFetch();
            } else if (result == "Incomplete") {
                alert("Please fill out all fields");
            } else if (result == "Failed to save!") {
                alert(result);
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

// REMOVE PRODUCT FROM LIST
function archive(nId) {

    $('#confirm-delete').modal('show');
    $("#yes-delete").on('click', () => {
        var nIndex = {
            index: nId
        };
        // console.log(nIndex);
        $.ajax({
            type: 'POST',
            url: "/controllers/admin/admin_archive.php",
            data: nIndex,
            beforeSend: function () {
                var x = document.querySelector('#adminSpinner');
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            },
            success: (result) => {
                if (result == "Deleted!") {
                    productsFetch();
                    $('#confirm-delete').modal('hide');
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
    })
}

// MODIFY PRODUCT
function modify(nId) {
    var hiddenIndex = $("#indexer").val(nId);
    console.log(hiddenIndex.val());

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
                sPcat = $("#productCat").val(objRes.category);
                sPname = $("#productName").val(objRes.name);
                sPprice = $("#productPrice").val(objRes.price);
                sPquantity = $("#productQuantity").val(objRes.stocks);
                sPdescription = $("#productDescription").val(objRes.description);
                sPphoto = $("productPhoto").val(objRes.image);

                $('#modifyModal').modal('show');

                $("#Modify").on('click', () => {

                    var nIndex = $("#indexer").val();
                    var sPcat = $("#productCat").val();
                    var sPname = $("#productName").val();
                    var sPprice = $("#productPrice").val();
                    var sPquantity = $("#productQuantity").val();
                    var sPdescription = $("#productDescription").val();
                    var sPphoto = $("#productPhoto").val();

                    var sJsonData = {
                        index: nIndex,
                        pcat: sPcat,
                        pname: sPname,
                        pprice: sPprice,
                        pquantity: sPquantity,
                        pdescription: sPdescription,
                        pphoto: sPphoto
                    }

                    $.ajax({
                        type: 'POST',
                        url: "/controllers/admin/admin_modify_save.php",
                        data: sJsonData,
                        beforeSend: function () {
                            var x = document.querySelector('#adminSpinner');
                            if (x.style.display === "none") {
                                x.style.display = "block";
                            } else {
                                x.style.display = "none";
                            }
                        },
                        success: (result) => {
                            if (result == "updated") {
                                $('#modifyModal').modal('hide');
                                productsFetch();
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

                    iImage = $("#productPhoto").prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('name', sPname);
                    form_data.append('image', iImage);

                    $.ajax({
                        url: "/controllers/admin/admin_modify_save_img.php",
                        type: 'post',
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

// ACTIVATE CUSTOMER
function cusAct(nId) {

    $('#confirm-cusAct').modal('show');
    $("#yes-activate").on('click', () => {

        var nIndex = {
            index: nId,
            }
        $.ajax({
            type: 'POST',
            url: "/controllers/admin/admin_cus_activate.php",
            data: nIndex,
            beforeSend: function () {
                var x = document.querySelector('#adminSpinner');
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            },
            success: (result) => {
                if (result == "Account Activated!") {
                    customersFetch();
                    $('#confirm-cusAct').modal('hide');
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
    })
}

// DEACTIVATE CUSTOMER
function cusDeact(nId) {

    $('#confirm-cusDeact').modal('show');
    $("#yes-deactivate").on('click', () => {

        var nIndex = {
            index: nId,
            }
        $.ajax({
            type: 'POST',
            url: "/controllers/admin/admin_cus_deactivate.php",
            data: nIndex,
            beforeSend: function () {
                var x = document.querySelector('#adminSpinner');
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            },
            success: (result) => {
                if (result == "Account Deactivated!") {
                    customersFetch();
                    $('#confirm-cusDeact').modal('hide');
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
    })
}

// ACTIVATE ADMIN USER
function admAct(nId) {

    $('#confirm-admAct').modal('show');
    $("#yes-admActivate").on('click', () => {

        var nIndex = {
            index: nId,
            }
        $.ajax({
            type: 'POST',
            url: "/controllers/admin/admin_admuser_activate.php",
            data: nIndex,
            beforeSend: function () {
                var x = document.querySelector('#adminSpinner');
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            },
            success: (result) => {
                if (result == "Account Activated!") {
                    adminusersFetch();
                    $('#confirm-admAct').modal('hide');
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
    })
}

// DEACTIVATE ADMIN USER
function admDeact(nId) {

    $('#confirm-admDeact').modal('show');
    $("#yes-admDeactivate").on('click', () => {

        var nIndex = {
            index: nId,
            }
        $.ajax({
            type: 'POST',
            url: "/controllers/admin/admin_admuser_deactivate.php",
            data: nIndex,
            beforeSend: function () {
                var x = document.querySelector('#adminSpinner');
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            },
            success: (result) => {
                if (result == "Account Deactivated!") {
                    adminusersFetch();
                    $('#confirm-admDeact').modal('hide');
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
    })
}

// ADD ADMIN

function addAdmin() {
    $('#addAdminModal').modal('show');
    $('#btn-addAdmin').on('click', () => {

        var sFname = $('#admRegFirstName').val();
        var sLname = $('#admRegLastName').val();
        var sUname = $('#admRegUserame').val();
        var sEmail = $('#admRegEmail').val();

        var objData = {
            regfirstname: sFname,
            reglastname: sLname,
            regusername: sUname,
            regemail: sEmail,
            }

        $.ajax({
            type: 'POST',
            url: "/controllers/admin/admin_add_admuser.php",
            data: objData,
            beforeSend: function () {
                var x = document.querySelector('#adminSpinner');
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            },
            success: (result) => {
                if (result == "Admin Added!") {
                    alert(result);
                    $('#addAdminModal').modal('hide');
                    $('#admRegFirstName').val("");
                    $('#admRegLastName').val("");
                    $('#admRegUserame').val("");
                    $('#admRegEmail').val("");
                    adminusersFetch();
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
    })
}

// CHANGE ACCESS LEVEL TO ADMIN USER
function changeaccess() {
    $('#confirm-access').modal('show');
    $("#yes-access").on('click', () => {

        var sFname = $('#adminFirstName').val();
        var sLname = $('#adminLastName').val();
        var sUname = $('#adminUsername').val();
        var sEmail = $('#adminEmail').val();
        var sAccess = $('#accesslevel').val();

        var objData = {
            firstname: sFname,
            lastname: sLname,
            username: sUname,
            email: sEmail,
            access: sAccess
            }

        $.ajax({
            type: 'POST',
            url: "/controllers/admin/admin_access_change.php",
            data: objData,
            beforeSend: function () {
                var x = document.querySelector('#adminSpinner');
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            },
            success: (result) => {
                if (result == "Access Changed!") {
                    alert(result);
                    $('#confirm-access').modal('hide');
                    loadContent('/controllers/admin/admin_access.php');
                } else {
                    alert(result);
                    $('#confirm-access').modal('hide');
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
    })
}

// CHANGE PASSWORD

function admSaveNewPass () {
    $('#admChangePassModal').modal('show');
    $('#yes-changePass').on('click', () => {

        var sCurrentPass = $('#admOldPass').val();
        var sNewPass = $('#admNewPass').val();
        var sConfirmPass = $('#admConfirmPass').val();

        var sJsonData = {
            currentpassword: sCurrentPass,
            newpassword: sNewPass,
            confirmpassword: sConfirmPass
        }
    
        $.ajax({
            type:'POST',
            url: "/controllers/admin/admin_pass_change.php",
            data: sJsonData,
            beforeSend: function () {
                var x = document.querySelector('#adminSpinner');
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            },
            success: (result) => {
                if( result == "Password saved!") {
                    alert(result);
                    $('#admChangePassModal').modal('hide');
                    loadContent('/controllers/admin/admin_pass_change_page.php');

                } else {
                    alert(result);
                    $('#admChangePassModal').modal('hide');

                }
            },
            complete: function () {
                var x = document.querySelector('#adminSpinner');
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        })
    })
}

// PASSWORD CHECKER IF MATCH

$('#admNewPass, #admConfirmPass').on('keyup', function () {
    if ($('#admNewPass').val() == $('#admConfirmPass').val()) {
      $('#admPassMessage').html('Passwords match').css('color', 'green');
    } else 
      $('#admPassMessage').html('Passwords does not match').css('color', 'red');
  });

// LOGIN AND REGISTER


$("#loginClient").on('click', () => {
    var sUsername = $("#admLoginUsername").val();
    var sPassword = $("#admLoginPassword").val();

    var sJsonData = {
        username: sUsername,
        password: sPassword,
    };

    $.ajax({
        type: 'POST',
        url: "/controllers/admin/admin_login.php",
        data: sJsonData,
        beforeSend: function () {
            var x = document.querySelector('#adminSpinner');
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        },
        success: (result) => {
                if( result == "Login Success") {
                    window.location = "/admin/dashboard/index.php";
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
        }
    });
});


// SIGNOUT

$('#adminSignout').on('click', () => {
    $('#signoutModal').modal('show');
    $('#yes-signout').on('click', () => {

        $.ajax({
            type: 'POST',
            url: "/controllers/admin/admin_signout.php",
            beforeSend: function () {
                var x = document.querySelector('#adminSpinner');
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            },
            success: (result) => {
                if (result == "Signed out") {
                    console.log(result);
                    $('#signoutModal').modal('hide');
                    window.location = "/admin/login/index.php";
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
            }
        });
    })
})
