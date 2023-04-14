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
            <div class="clflx txtc">
                <img class="profile-img" src="/assets/img/sceiiya-pro.png" alt="Sceiiya">
                <strong class="profile-uname">Sceiiya</strong>
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
                    <li>
                        <a href="#" class="profile-nav mx-1" id="mycart">
                            <span class="icon"><i class="fas fa-shopping-cart"></i></span>
                            <span class="title">My Cart</span>
                        </a>
                    </li>
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
                <h2>My Account</h2>
                <form action="">
                    <div class="mb-3 mt-3 w-75 profile-data">
                        <label>Username</label>
                        <input type="text" class="form-control" id="userName" placeholder="Username">
                    </div>
                    <div class="mb-3 w-75 profile-data">
                        <label>First Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="First Name">
                    </div>
                    <div class="mb-3 w-75 profile-data">
                        <label>Last Name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                    </div>
                    <div class="mb-3 w-75 profile-data">
                        <label>Email Address</label>
                        <input type="email" class="form-control" id="emailAdd" placeholder="example@email.com">
                    </div>
                    <div class="mb-3 w-75 profile-data">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" id="contactNo" placeholder="ex. +63 987 654 3210">
                    </div>
                    <div class="mb-3 w-75 profile-data">
                        <label>Billing Address</label>
                        <input type="text" class="form-control" id="billingAdd" placeholder="House No., Street Name, City, Country">
                    </div>
                    <div class="mb-3 w-75 profile-data">
                        <label>Bank Account</label>
                        <input type="text" class="form-control" id="bankAcc" placeholder="Bank Name">
                    </div>

                </form>

            </div>
            <br>
            <br>
            <span><button class="profileButton" id="editBtn">EDIT</button></span>
        </div>

    </section>

    <!-- footer -->
    <?php include("../includes/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0de39995d2.js" crossorigin="anonymous"></script>
    <script src="/assets/js/jquery-3.6.3.min.js"></script>
    <script src="/assets/js/profile_script.js"></script>
    <script src="/assets/js/script.js"></script>
</body>

</html>