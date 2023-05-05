<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head meta tags and css links -->
    <?php include("../../includes/head.php"); ?>
    <title>Animazoooki | Cart</title>
</head>

<body class="bg-light">

    <!-- messenger -->
    <?php include('../../includes/messenger_plugin.php'); ?>
    <!-- toaster -->
    <?php include("../../includes/cart_toaster.php"); ?>
    <!-- back to top -->
    <?php include('../../includes/back_to_top.php'); ?>
    <!-- promo -->
    <?php include("../../includes/promo_animation.php"); ?>
    <!-- header -->
    <?php include("../../includes/headers.php"); ?>
    <!-- login modal -->
    <?php include("../../includes/login_modal.php"); ?>
    <!-- signup modal -->
    <?php include("../../includes/signup_modal.php"); ?>
    <!-- navigation bar heading -->
    <?php include("../../includes/main_navbar_header.php"); ?>
    <!-- navigation bar heading -->

    <div class="modal" id="checkoutModal">
        <div class="modal-dialog modal-lg txtl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Checkout</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                <input id="xedni" value="<?php echo $_SESSION['userid']; ?>" style="display: none;">
                    <div id="checkout-container" class="container">
                        <div class="container mt-3 row justify-content-center align-items-center text-align-left">
                            <h2>Contact and Shipping Information</h2>
                            <div class="rwflx">
                                <div class="mb-1 mt-1 clflx w-25 txtr">
                                    <label class="mb-2 mt-2" for="name">Name:  </label>
                                    <label class="mb-2 mt-2" for="email">Email:  </label>
                                    <label class="mb-2 mt-2" for="address">Address:  </label>
                                    <label class="mb-2 mt-2" for="number">Contact Number:  </label>
                                </div>
                                <div class="mb-1 mt-2 clflx w-75">
                                    <input type="name" class="form-control" id="checkName" name="name" value="<?php echo $_SESSION['fullname']; ?>">
                                    <input type="text" class="form-control" id="checkaddress" placeholder="Enter Shipping Address" name="address" value="<?php echo $_SESSION['shipping_add']?>">
                                    <input type="number" class="form-control" id="checkNumber" placeholder="Enter Contact Number" name="number" value="<?php echo $_SESSION['billing_add'];?>">
                                    <input type="email" class="form-control" id="checkEmail" name="email" value="<?php echo $_SESSION['email']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="container mt-3 align-items-center">
                            <h2>Payment Method</h2>
                                <div style="left: 50; right: 50; margin:auto; align-self:center;" allign="center" class="txtl clflx w-25">
                                <div class="form-check  mt-2">
                                    <input type="radio" class="form-check-input" id="payPaypal" name="optradio" value="Paypal">
                                    <label class="form-check-label" for="paygcash">Paypal</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="radio" class="form-check-input" id="payCod" name="optradio" value="Cash On Delivery">
                                    <label class="form-check-label" for="paycod">Cash On Delivery</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="radio" class="form-check-input" id="payBank" name="optradio" value="Bank">
                                    <label class="form-check-label" for="paycod">Bank</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="radio" class="form-check-input" id="payCard" name="optradio" value="VISA/MasterCard">
                                    <label class="form-check-label" for="paycod">VISA/MasterCard</label>
                                </div>
                                </div>
                        </div>
                    </div>
                    <div class="mt-3 justify-content-center allign-items-center">
                            <h2>Order Preview</h2>
                            <div id="previewOrder" class="mb-3 mt-3 w-100">
                                
                            </div>
                        </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        
                        <!-- <input type="text" class="form-control" id="modalTotal"> -->
                        <div class="">
                            <!-- <input class="btn btn-primary btn-lg" type="submit" value="Register" /> -->
                            <button id='PurchaseOrderBttn' class='btn redbgwhitec'>Place Order</button>
                            <!-- <button class="btn btn-primary" id="purchase">Purchase</button> -->
                        </div>
                        <button type="button" class="btn " data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="confirmOrder">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="z-index: 999">

                <div class="modal-header">
                    <h4 class="modal-title">Confirm Order</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    Please make sure that your Shipping details is accurate avoid further issues.
                </div>

                <div class="modal-footer flex-row d-flex justify-content-between">
                    <button type="button" id="yes-ORDER" class="btn redbgwhitec">Proceed</button>
                    <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </div>
    <section class="wrapper">
        <!--left side of the main--->
        <aside class="side-l"> </aside> <!--left side of the main--->
        <!--content of the main--->
        <main class="cartmain main bg-light-in">

        </main>
        <!--right side of the main--->
        <aside class="side-r ">
            <aside class="side-sec-t">
                <!-- suggest top product container here -->
                <?php include("../../includes/right_top_suggest_side.php"); ?>
            </aside>

            <aside class="side-sec-b">
                <!-- suggest bottom article container here -->
                <?php include("../../includes/right_bottom_suggest_side.php"); ?>
            </aside>
        </aside>
        <!--end of right side of the main--->
    </section>

<!-- footer -->
<?php include("../../includes/footer.php"); ?>
</body>
</html>
<!-- scripts libries -->
<?php include("../../includes/scripts_library.php"); ?>
<script src="/assets/js/script.js"></script>
<script src="/assets/js/cart_scripts.js"></script>
<?php include("../../includes/validatorControl.php"); ?>
<?php include('../../controllers/forbidGuest.php'); ?>