<!-- MODALS -->
<!-- Spinner Modal -->
<div id="adminSpinner" class="spinner-border text-danger" style="display: none;"></div>

<!-- Sign out Modal -->
<div class="modal" id="signoutModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="modal-title">SIGN OUT</h4>
            </div>


            <div class="modal-body">
                Are you sure you want to sign out?
                <br>
                <br>
            </div>


            <div class="modal-footer flex-row d-flex justify-content-between">
                <button type="button" class="btn redbgwhitec" id="yes-signout">YES</button>
                <button type="button" class="btn" data-bs-dismiss="modal">NO</button>
            </div>

        </div>
    </div>
</div>

<!-- PRODUCTS MODAL -->

<!-- form outie -->
<form action="../../controllers/admin/admin_save_products.php" method="post" enctype="multipart/form-data">
<!-- <form action="" method="post" id='SubmitNewProduct'enctype="multipart/form-data"> -->

<div class="modal modal-xl" id="addProductModal">
    <div class="modal-dialog">
        <div class="modal-content p-4 cpborder modalbg">

            <div class="add-list-cont">
                <h3 class="txtc mb-4">Product Info</h3>

                <!-- form outie -->
                <!-- <form action="../../controllers/admin/admin_save_products.php" method="post" enctype="multipart/form-data"> -->
                <div class="form-outline mb-3">
                    <label for="">Product Name</label>
                    <input type="text" id="adminProdName" name='name' class="form-control" maxlength="150" required/>
                </div>
                <!-- in div to row >>>>>-->
                <div class="row">
                <div class="form-outline col-md-6 mb-4">
                    <label for="">Product Category</label>
                    <input type="text" id="adminProdCat" name='category' class="form-control" maxlength="30" required/>
                </div>

                <div class="form-outline col-md-6 mb-4">
                    <label for="">Product Series</label>
                    <input type="text" id="adminProdSer" name='series' class="form-control" maxlength="30" required/>
                </div>
                </div>
                <!-- <<<<<<<<<<<<  out div to row -->

                <!-- in div to row >>>>>>>>>>>-->
                <div class="row">
                <div class="form-outline col-md-6 mb-4">
                    <label for="">Product Price</label>
                    <input type="number" id="adminProdPrice" name='price' class="form-control" max='9999999' required/>
                </div>

                <div class="form-outline col-md-6 mb-4">
                    <label for="">Product Stocks</label>
                    <input type="number" id="adminProdQty" name='stocks' class="form-control" max='9999999' required/>
                </div>
                </div>
                <!-- <<<<<<<<<<< out div to row -->

                <div class="row">
                <div class="form-outline col-md-6 mb-4">
                    <label for="">Product Sizes</label>
                    <input type="text" id="adminProdSizes" name='sizes' class="form-control" maxlength="200" required/>
                </div>

                <div class="form-outline col-md-6 mb-4">
                    <label for="">Product Variation</label>
                    <input type="text" id="adminProdVar" name='variation' class="form-control" maxlength="200" required/>
                </div>
                </div>

                <div class="form-outline mb-3">
                    <label for="">Product Description</label>
                    <textarea type="text" id="adminProdDesc" name='description' rows="10" cols="50" class="form-control pDescription" maxlength="1000" required></textarea>
                </div>

                <!-- in div to row >>>>>>>>>>>-->
                <div class="row">
                <div class="form-outline col-md-6 mb-4">
                    <label for="">Product Designer</label>
                    <input type="text" id="adminProdDesig" name='designer' class="form-control" maxlength="40"/>
                </div>

                <div class="form-outline col-md-6 mb-4">
                    <label for="">Product Manufacturer</label>
                    <input type="text" id="adminProdManuf" name='manufacturer' class="form-control" maxlength="40"/>
                </div>
                </div>
                <!-- <<<<<<<<<<< out div to row -->

                <!-- <div class="form-outline mb-2">
                    <label for="">Product Image</label>
                    <input type="file" id="adminProdImage" class="form-control" accept="image/*" />
                </div> -->

                    <div class="preview-container">
                        <div>
                            <!-- <label for="file1">Choose an image:</label> -->
                            <input type="file" name="file[]" id="prodimg1" accept="image/*" class="file-input" required>
                            <div class="preview"><img src="/controllers/important/animazoooki_onload.png"></div>
                        </div>

                        <div>
                            <!-- <label for="file2">Choose an image:</label> -->
                            <input type="file" name="file[]" id="prodimg2" accept="image/*" class="file-input">
                            <div class="preview"><img src="/controllers/important/animazoooki_onload.png"></div>
                        </div>

                        <div>
                            <!-- <label for="file3">Choose an image:</label> -->
                            <input type="file" name="file[]" id="prodimg3" accept="image/*" class="file-input">
                            <div class="preview"><img src="/controllers/important/animazoooki_onload.png"></div>
                        </div>

                        <div>
                            <!-- <label for="file4">Choose an image:</label> -->
                            <input type="file" name="file[]" id="prodimg4" accept="image/*" class="file-input">
                            <div class="preview"><img src="/controllers/important/animazoooki_onload.png"></div>
                        </div>
                    </div>


                <div class="flex-row d-flex justify-content-between">
                <button type="button" id="saveProduct" class="btn redbgwhitec mb-1 mt-3">Add Product</button>
                <button type="button" class="btn mb-1 mt-3" data-bs-dismiss="modal">Close</button>
                    
                <!-- form button -->
                <!-- <input type="submit" value="Upload">
                </form> -->


                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="confirm-addProd">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="modal-title">ADD PRODUCT</h4>
            </div>


            <div class="modal-body">
                Are you sure you want to add this product?
                <br>
                <br>
            </div>


            <div class="modal-footer flex-row d-flex justify-content-between">
                <input type="submit" value="Yes" id="yes-addProd" class="btn redbgwhitec">
                <!-- <button type="button" id="yes-addProd" class="btn redbgwhitec">Yes</button> -->
                <button type="button" class="btn" data-bs-dismiss="modal">No</button>
            </div>

        </div>
    </div>
</div>

<!-- <input type="submit" value="Upload"> -->
</form>

<!-- MODIFY PRODUCT MODAL -->
<!-- form outie -->
<!-- <form action="../../controllers/admin/admin_modify_save.php" method="post" enctype="multipart/form-data"> -->
<form action="" method="post" enctype="multipart/form-data">

<div class="modal modal-xl" id="modifyModal">
    <div class="modal-dialog ">
        <div class="modal-content modalbg">

            <div class="modal-header">
                <h4 class="modal-title">Modify</h4>
            </div>

            <div class="modal-body">
                <input id="indexer" style="display: none;">

                    <div class="form-outline mb-3">
                        <input type="text" id="productName" name="productName" class="form-control form-control-lg" maxlength="150" required/>
                        <label class="form-label" for="productName">Product Name</label>
                    </div>

                <div class="row">
                    <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <input type="text" id="productCat" name="productCat" class="form-control form-control-lg" maxlength="30" required/>
                            <label class="form-label" for="productCat">Product Category</label>
                        </div>

                    </div>
                    <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <input type="text" id="productSer" name="productSer" class="form-control form-control-lg" maxlength="30" required/>
                            <label class="form-label" for="productSer">Product Series</label>
                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-4 pb-2">

                        <div class="form-outline">
                            <input type="email" id="productPrice" name="productPrice" class="form-control form-control-lg" max='9999999' required/>
                            <label class="form-label" for="productPrice">Product Price</label>
                        </div>

                    </div>

                    <div class="col-md-6 mb-4 pb-2">

                        <div class="form-outline">
                            <input type="email" id="productQuantity" name="productQuantity" class="form-control form-control-lg" max='9999999' required/>
                            <label class="form-label" for="productQuantity">Product Stocks</label>
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-outline col-md-6 mb-4">
                            <label for="">Product Sizes</label>
                            <input type="text" id="productSizes" name='sizes' class="form-control" maxlength="200" required/>
                        </div>

                        <div class="form-outline col-md-6 mb-4">
                            <label for="">Product Variation</label>
                            <input type="text" id="productVar" name='variation' class="form-control" maxlength="200" required/>
                        </div>
                    </div>

                    <div class="form-outline mb-1">
                        <label for="">Product Description</label>
                        <textarea type="text" id="productDescription" rows="10" cols="50" class="form-control pDescription" maxlength="1000" required></textarea>
                    </div>

                    <div class="row">
                        <div class="form-outline col-md-6 mb-4">
                            <label for="">Product Designer</label>
                            <input type="text" id="productDesig" name='designer' class="form-control" maxlength="40"/>
                        </div>

                        <div class="form-outline col-md-6 mb-4">
                            <label for="">Product Manufacturer</label>
                            <input type="text" id="productManuf" name='manufacturer' class="form-control" maxlength="40"/>
                        </div>
                    </div>

                    <!-- <div class="form-outline mb-1">
                        <label for="">Replace Image</label>
                        <input type="file" id="productPhoto" class="form-control" accept="image/*" />
                    </div> -->
                    <!-- must edit this for modification -->
                    <div class="preview-container">
                        <div>
                            <!-- <label for="file1">Choose an image:</label> -->
                            <input type="file" name="file[]" id="modprodimg1" accept="image/*" class="file-input" required>
                            <div class="preview"><img src="/controllers/important/animazoooki_onload.png"></div>
                        </div>

                        <div>
                            <!-- <label for="file2">Choose an image:</label> -->
                            <input type="file" name="file[]" id="modprodimg2" accept="image/*" class="file-input">
                            <div class="preview"><img src="/controllers/important/animazoooki_onload.png"></div>
                        </div>

                        <div>
                            <!-- <label for="file3">Choose an image:</label> -->
                            <input type="file" name="file[]" id="modprodimg3" accept="image/*" class="file-input">
                            <div class="preview"><img src="/controllers/important/animazoooki_onload.png"></div>
                        </div>

                        <div>
                            <!-- <label for="file4">Choose an image:</label> -->
                            <input type="file" name="file[]" id="modprodimg4" accept="image/*" class="file-input">
                            <div class="preview"><img src="/controllers/important/animazoooki_onload.png"></div>
                        </div>
                    </div>
                    <!-- must edit this for modification -->

                </div>

            </div>

            <div class="modal-footer flex-row d-flex justify-content-between">
                <div class="">
                    <button class="btn redbgwhitec" id="Modify">Modify</button>
                </div>
                <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="confirm-modProd">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="modal-title">MODIFY PRODUCT</h4>
            </div>


            <div class="modal-body">
                Are you sure you want to modify this product?
                <br>
                <br>
            </div>


            <div class="modal-footer flex-row d-flex justify-content-between">
                <input type="submit" value="Yes" id="yes-modProd" class="btn redbgwhitec">
                <!-- <button type="button" id="yes-modProd" class="btn redbgwhitec">Yes</button> -->
                <button type="button" class="btn" data-bs-dismiss="modal">No</button>
            </div>

        </div>
    </div>
</div>
</form>

<!-- DELETE PRODUCT -->

<div class="modal" id="confirm-delete">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="modal-title">DELETE</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>


            <div class="modal-body">
                Delete this product?
            </div>


            <div class="modal-footer flex-row d-flex justify-content-between">
                <button type="button" id="yes-delete" class="btn redbgwhitec">YES</button>
                <input id="prodDelInd" style="display: none;">
                <button type="button" class="btn" data-bs-dismiss="modal">NO</button>
            </div>

        </div>
    </div>
</div>


<!-- CUSTOMER MODAL -->

<!-- CUSTOMER ACTIVATE -->
<div class="modal" id="confirm-cusAct">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="modal-title">ACTIVATE</h4>
            </div>


            <div class="modal-body">
                Activate this user?
            </div>


            <div class="modal-footer flex-row d-flex justify-content-between">
                <button type="button" id="yes-activate" class="btn redbgwhitec">YES</button>
                <input id="cusActInd" style="display: none;">
                <button type="button" class="btn" data-bs-dismiss="modal">NO</button>
            </div>

        </div>
    </div>
</div>

<!-- CUSTOMER DEACTIVATE -->
<div class="modal" id="confirm-cusDeact">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="modal-title">DEACTIVATE</h4>
            </div>


            <div class="modal-body">
                Deactivate this user?
            </div>


            <div class="modal-footer flex-row d-flex justify-content-between">
                <button type="button" id="yes-deactivate" class="btn redbgwhitec">YES</button>
                <input id="cusDeacInd" style="display: none;">
                <button type="button" class="btn" data-bs-dismiss="modal">NO</button>
            </div>

        </div>
    </div>
</div>

<!-- ADMIN USERS MODAL -->

<!-- ADMIN USER ACTIVATE -->
<div class="modal" id="confirm-admAct">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="modal-title">ACTIVATE</h4>
            </div>


            <div class="modal-body">
                Activate this admin user?
            </div>


            <div class="modal-footer flex-row d-flex justify-content-between">
                <button type="button" id="yes-admActivate" class="btn redbgwhitec">YES</button>
                <input id="userActInd" style="display: none;">
                <button type="button" class="btn" data-bs-dismiss="modal">NO</button>
            </div>

        </div>
    </div>
</div>

<!-- ADMIN USER DEACTIVATE -->
<div class="modal" id="confirm-admDeact">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="modal-title">DEACTIVATE</h4>
            </div>


            <div class="modal-body">
                Deactivate this admin user?
            </div>


            <div class="modal-footer flex-row d-flex justify-content-between">
                <button type="button" id="yes-admDeactivate" class="btn redbgwhitec">YES</button>
                <input id="userDeacInd" style="display: none;">
                <button type="button" class="btn" data-bs-dismiss="modal">NO</button>
            </div>

        </div>
    </div>
</div>

<!-- ADD ADMIN USER -->
<div class="modal" id="addAdminModal">
    <div class="modal-dialog">
        <div class="modal-content p-4 border-0 modalbg">

            <div class="add-list-cont">
                <h3 class="txtc mb-4">Admin User Info</h3>

                <div class="form-outline mb-3 w-75 ms-5">
                    <label for="">First Name</label>
                    <input type="text" id="admRegFirstName" class="form-control" />
                </div>

                <div class="form-outline mb-3 w-75 ms-5">
                    <label for="">Last Name</label>
                    <input type="text" id="admRegLastName" class="form-control" />
                </div>

                <div class="form-outline mb-3 w-75 ms-5">
                    <label for="">Username</label>
                    <input type="text" id="admRegUserame" class="form-control" />
                </div>

                <div class="form-outline mb-3 w-75 ms-5">
                    <label for="">Email</label>
                    <input type="text" id="admRegEmail" class="form-control" />
                </div>
                <div class="flex-row d-flex justify-content-between">
                <button type="button" id="btn-addAdmin" class="btn redbgwhitec mb-1 mt-3">Add Admin</button>
                <button type="button" class="btn mb-1 mt-3" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="confirmAddUser">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="modal-title">ADD USER</h4>
            </div>


            <div class="modal-body">
                WARNING! You are about to add a user.
                <br>
                <br>
                Are you sure?
            </div>


            <div class="modal-footer flex-row d-flex justify-content-between">
                <button type="button" id="yes-addUser" class="btn redbgwhitec">YES</button>
                <button type="button" class="btn" data-bs-dismiss="modal">NO</button>
            </div>

        </div>
    </div>
</div>

<!-- ACCESS MODAL -->

<div class="modal" id="confirm-access">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="modal-title">CHANGE ACCESS</h4>
            </div>


            <div class="modal-body">
                WARNING! You are about to change the access level of this user.
                <br>
                <br>
                <label for="accessPass">Password:</label>
                <input type="password" id="accessPass" name="accessPass">
            </div>


            <div class="modal-footer flex-row d-flex justify-content-between">
                <button type="button" id="change-access" class="btn redbgwhitec">Change</button>
                <input id="accInd" style="display: none;">
                <button type="button" id="cancel-access" class="btn" data-bs-dismiss="modal">Cancel</button>
            </div>

        </div>
    </div>
</div>

<!-- CHANGE PASSWORD MODAL -->

<div class="modal" id="admChangePassModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="modal-title">CHANGE PASSWORD</h4>
            </div>


            <div class="modal-body">
                WARNING! You are about to change the password of this admin user.
                <br>
                <br>
                Are you sure of this change?
            </div>


            <div class="modal-footer flex-row d-flex justify-content-between">
                <button type="button" id="yes-changePass" class="btn redbgwhitec">YES</button>
                <button type="button" class="btn" data-bs-dismiss="modal">NO</button>
            </div>

        </div>
    </div>
</div>