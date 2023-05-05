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

    <section class="wrapper">
        <!--left side of the main--->
        <aside class="side-l"> </aside> <!--left side of the main--->
        <!--content of the main--->
        <main class="cartmain main bg-light-in">


            <!-- <section class="h-100 w100 bg-light-in" style="background-color: #eee;">
                <div class="container h-100 py-5">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-10">

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3 class="fw-normal mb-0 text-black">My Cart</h3>
                                <div>
                                    <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                                </div>
                            </div>

                            <div class="card rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="form-check mb-2 ms-2">
                                            <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                                        </div>
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="/all-products/Enna-Alouette_t-shirt/3.jpg" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2">Enna Alouette NIJISANJI EN inspired T-shirt</p>
                                            <p><span class="text-muted">Size: </span>M <span class="text-muted">Variation:
                                                </span>Black n White v1</p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <input id="form1" min="0" name="quantity" value="3" type="number" class="form-control form-control-sm" />

                                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="mb-0">$69.00</h5>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="form-check mb-2 ms-2">
                                            <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                                        </div>
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="/all-products/Usada-Pekora_t-shirt/1.jpg" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2">Usada Pekora HOLOLIVE JP inspired T-shirt</p>
                                            <p><span class="text-muted">Size: </span>S <span class="text-muted">Variation:
                                                </span>White n Black v1</p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <input id="form1" min="0" name="quantity" value="1" type="number" class="form-control form-control-sm" />

                                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="mb-0">$69.00</h5>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="form-check mb-2 ms-2">
                                            <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                                        </div>
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="/all-products/Shalltear-Bloodfallen_t-shirt/4.jpg" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2">Shalltear Bloodfallen OVERLORD Anime Series inspired T-shirt</p>
                                            <p><span class="text-muted">Size: </span>XXL <span class="text-muted">Variation:
                                                </span>Red n White v2</p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <input id="form1" min="0" name="quantity" value="2" type="number" class="form-control form-control-sm" />

                                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="mb-0">$69.00</h5>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="form-check mb-4 ms-2">
                                            <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                                        </div>
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="/all-products/minato-aqua-scale-figurine/1.jpg" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2">Minato Aqua: Aqua Iro Super Dream Ver. 1/7 Scale Figure</p>
                                            <p><span class="text-muted">Size: </span>1/7 scale <span class="text-muted">Variatin:
                                                </span>White</p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <input id="form1" min="0" name="quantity" value="1" type="number" class="form-control form-control-sm" />

                                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="mb-0">$199.00</h5>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4 d-flex flex-row">
                                <div class="card-body p-4 d-flex flex-column justify-content-center">
                                    <div class="form-outline flex-fill  justify-content-center">
                                        <input type="text" id="form1" class="form-control form-control-lg" />
                                        <label class="form-label" for="form1">Voucher code</label>
                                    </div>
                                    <div>
                                    <button type="button" class="btn btn-outline-warning btn-sm inbg-red w-25">Apply</button>
                                    </div>
                                </div>
                                <div class="card-body p-4 d-flex flex-column">
                                    <fieldset disabled>
                                    <div class="form-outline d-flex flex-row justify-content-end">
                                        <label class="form-label mt-3 pe-2" for="form1">SUBTOTAL:</label>
                                        <input type="text" id="form1" class="form-control form-control-sm mt-2 w-50" />
                                    </div>
                                    <div class="form-outline d-flex flex-row justify-content-end">
                                        <label class="form-label mt-3 pe-2" for="form1">DISCOUNT:</label>
                                        <input type="text" id="form1" class="form-control form-control-sm mt-2 w-50" />
                                    </div>
                                    <div class="form-outline d-flex flex-row justify-content-end">
                                        <label class="form-label mt-3 pe-2" for="form1">TOTAL:</label>
                                        <input type="text" id="form1" class="form-control form-control-sm mt-2 w-50 " />
                                    </div>
                                    </fieldset>
                                </div>                               
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <button type="button" class="btn btn-warning btn-block btn-lg inbg-red"><a class="txt-light" href="/all-products/checkout">Proceed to Pay</a></button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section> -->



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