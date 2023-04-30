<!DOCTYPE html>
<html lang="en">
    
<head>
    <!-- head meta tags and css links -->
    <?php include("../includes/head.php"); ?>
    <title>Animazoooki | All Products</title>
</head>
<body class="bg-light">

<!-- messenger -->
    <?php include('../includes/messenger_plugin.php'); ?>
<!-- toaster -->
    <?php include("../includes/cart_toaster.php"); ?>
<!-- back to top -->
    <?php include('../includes/back_to_top.php'); ?>
<!-- promo -->
    <?php include("../includes/promo_animation.php"); ?>
<!-- header -->
    <?php include("../includes/headers.php"); ?>
<!-- login modal -->
    <?php include("../includes/login_modal.php"); ?>
    <!-- navigation bar heading -->
    <?php include("../includes/main_navbar_header.php"); ?>
<!-- navigation bar heading -->

    <section class="wrapper">
        <!--left side of the main--->
        <aside class="side-l">
            <!-- <div class="chat-div">
            chat assistant
           </div> -->

        </aside>
        <!--left side of the main--->

        <!--content of the main--->
        <main class="main">


            <section class="my-hero-home">
                <section class="my-hero-title">

                    <h3 class="hero-h3">
                        BROWSE ALL PRODUCTS
                    </h3>
                    <p class="hero-p">
                        discover different products here<br />lots of merch to pc with
                    </p>

                </section>


        </main>
        <!-- end of content for the main--->

        <!--right side of the main--->
        <aside class="side-r ">
            <aside class="side-sec-t">
<!-- suggest top product container here -->
                <?php include("../includes/right_top_suggest_side.php"); ?>
            </aside>

            <aside class="side-sec-b">
<!-- suggest bottom article container here -->
                <?php include("../includes/right_bottom_suggest_side.php"); ?>
            </aside>
        </aside>
        <!--end of right side of the main--->
    </section>

<!-- footer -->
<?php include("../includes/footer.php"); ?>

</body>

</html>
<!-- scripts libries -->
<?php include("../includes/scripts_library.php"); ?>
<script src="/assets/js/script.js"></script>
<script src="/assets/js/Give_allItems.js"></script>
<?php include("../includes/validatorControl.php"); ?>