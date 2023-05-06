<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head meta tags and css links -->
    <?php include("../includes/head.php"); ?>
    <!-- <profile-nav mx-1>Animazoooki | My Profile</profile-nav mx-1> -->
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
    <!-- signup modal -->
    <?php include("../includes/signup_modal.php"); ?>
    <!-- navigation bar heading -->
    <?php include("../includes/main_navbar_header.php"); ?>

    <section class="profile-cont">

        <div class="profile-cont-l bg-light-in">
        <!-- profile_picture -->
            <div class="clflx txtc mt-0 pt-0">
                <div class="preview clflx txtc mt-0 pt-0">
                    <div class="preview profprevv mb-4 mt-1 pt-1">
                        <label class="mt-1" for="profile_picture">Change Profile</label>
                        <input type="file" name="profile_picture" id="profpicc" accept="image/*" class="file-input" style="display: none;">
                        <div>
                        <img class="profile-img" id="profpicprev" src="<?php echo $_SESSION['profile_img']; ?>" loading="lazy" onerror="defaultimg(this);"  alt="<?php echo 'profile of '.$_SESSION['username'];?>">
                        </div>
                    </div>
                </div>
                <!-- <img class="profile-img" src="<?php //echo $_SESSION['profile_img']; ?>" alt="<?php //echo 'profile of '.$_SESSION['username'];?>"> -->
                <strong class="profile-uname"><?php echo $_SESSION['username'];?></strong>
            </div>
            <div class="profile-label-cont">
                <ul>
                    <li>
                        <a href="#" class="profile-nav mx-1" id="myAccount">
                            <span class="icon"><i class="fas fa-user"></i></span>
                            <span class="title">My Account</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="profile-nav mx-1" id="myPurchases">
                            <span class="icon"><i class="fas fa-shopping-bag"></i></span>
                            <span class="title">My Purchases</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="#" class="profile-nav mx-1" id="mycart">
                            <span class="icon"><i class="fas fa-shopping-cart"></i></span>
                            <span class="title">My Cart</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="#" class="profile-nav mx-1" id="myVouchers">
                            <span class="icon"><i class="fas fa-ticket-alt"></i></span>
                            <span class="title">My Vouchers</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="profile-nav mx-1" id="changePass">
                            <span class="icon"><i class="fas fa-lock"></i></span>
                            <span class="title">Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="profile-nav mx-1" id="mySettings">
                            <span class="icon"><i class="fas fa-user-cog"></i></span>
                            <span class="title">Settings</span>
                        </a>
                    </li>
                </ul>
                <!-- <a class="profile-nav mx-1" id="myAccount"><i class="fas fa-user"></i> My Account</a>
                <a class="profile-nav mx-1" id="myPurchases"><i class="fas fa-shopping-bag"></i> My Purchases</a>
                <a class="profile-nav mx-1" id="mycart"><i class="fas fa-shopping-cart"></i> My Cart</a>
                <a class="profile-nav mx-1" id="myVouchers"><i class="fas fa-ticket-alt"></i> My Vouchers</a>
                <a class="profile-nav mx-1" id="changePass"><i class="fas fa-lock"></i> Change Password</a>
                <a class="profile-nav mx-1" id="mySettings"><i class="fas fa-user-cog"></i> Settings</a>
                </div> -->
            </div>
        </div>
        <div class="profile-cont-r bg-light-in">
            <div class="container pt-5 w-75 bg-light-in" id="dataField">


            </div>
            <br>
            <br>
            <span><button class="profileButton" id="editBtn">EDIT</button></span>
        </div>

    </section>

    <!-- CHANGE PASSWORD MODAL -->

<div class="modal" id="userChangePassModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="modal-title">CHANGE PASSWORD</h4>
            </div>


            <div class="modal-body">
                WARNING! You are about to change the password.
                <br>
                <br>
                Are you sure of this change?
            </div>


            <div class="modal-footer flex-row d-flex justify-content-between">
                <button type="button" id="yes-userChangePass" class="btn redbgwhitec">YES</button>
                <button type="button" class="btn" data-bs-dismiss="modal">NO</button>
            </div>

        </div>
    </div>
</div>

<!-- Spinner Modal -->
<div id="userSpinner" class="spinner-border text-danger" style="display: none;"></div>

    <!-- footer -->
    <?php include("../includes/footer.php"); ?>

</body>
</html>
<!-- scripts libries -->
<!-- <script src="/assets/js/jquery-3.6.3.min.js"></script> -->
<?php include("../includes/scripts_library.php"); ?>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
<!-- <script src="https://kit.fontawesome.com/0de39995d2.js" crossorigin="anonymous"></script> -->
<script src="/assets/js/script.js"></script>
<script src="/assets/js/profile_script.js"></script>
<?php include("../includes/validatorControl.php"); ?>
<?php include('../controllers/forbidGuest.php'); ?>