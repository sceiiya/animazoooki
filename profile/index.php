<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head meta tags and css links -->
    <?php include("../includes/head.php"); ?>
    <title>Animazoooki | My Profile</title> </head>

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
    
    <section class="profile-cont">
    
    
        <div class="profile-cont-l bg-light-in">
            <div class="clflx txtc">
                <img class="profile-img" src="/assets/img/sceiiya-pro.png" alt="Sceiiya">
                <strong class="profile-uname">Sceiiya</strong>
            </div>
            <div class="profile-label-cont">
                <a class="profile-nav mx-1">My Account</a>
                <a class="profile-nav mx-1">My Purchase</a>
                <a class="profile-nav mx-1">My Cart</a>
                <a class="profile-nav mx-1">My Vouchers</a>
                <a class="profile-nav mx-1">Notification</a>
                <a class="profile-nav mx-1">Settings</a>
            </div>
        </div>
        <div class="profile-cont-r bg-light-in">
            <div class="profile-header">
                My Profile
            </div>
            <div class="profile-cont-r-in">
                <div class="profile-label-cont">
                    <div class="profile-label">Username</div>
                    <div class="profile-label">Name</div>
                    <div class="profile-label">Email</div>
                    <div class="profile-label">Phone</div>
                    <div class="profile-label">Billing Address</div>
                    <div class="profile-label">Bank Account</div>
                </div>
                <div class="profile-detail-cont">
                    <div class="profile-details">Sceiiya</div>
                    <div class="profile-details">Scheidj Villados</div>
                    <div class="profile-details">example@gmail.com</div>
                    <div class="profile-details">0999 999 9999</div>
                    <div class="profile-details">Bulacan, Philippines</div>
                    <div class="profile-details">UnionBank</div>
                </div>
            </div>
        </div>
    
    
    </section>

<!-- footer -->
<?php include("../includes/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0de39995d2.js" crossorigin="anonymous"></script>
    <script src="assets/js/jquery-3.6.3.min.js"></script>
    <script src="/assets/js/script.js"></script>
</body>

</html>