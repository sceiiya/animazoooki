<div class="sticky-top navic-cont ic-l">
    <a class="navbar-brand px-2" href="/#">
                <!-- light-mode -->

    <img id="headAzlogo" src="/assets/img/animazooki-b.png" alt="Animazooki" style="max-height: 40px" class="mt-1 pb-1 header_floater">
                <!-- dark-mode -->
                <!-- <img src="/assets/img/animazooki-w.svg" alt="" style="max-height: 40px"> -->
    </a>
</div>
<div class="sticky-top navic-cont ic-r px-2"> <!-- <i class="bi bi-moon"></i> -->
    <a class="nav-button" id="Az_theme"><i class="fas fa-moon mx-2 txt-light-inv header_floater"></i></button>
    <a class="nav-button"><i class="fas fa-search mx-2 txt-light-inv header_floater" type="button" id="btn-search"></i></a>
    <a class="nav-button" id="myCartBttn"><i class="fas fa-shopping-cart mx-2 txt-light-inv header_floater"></i></a>
    <a class="nav-button" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-circle mx-2 txt-light-inv header_floater"></i></a>
    <ul class="dropdown-menu bg-light-in">
        <li id="lgInBttn"><a class="dropdown-item txt-light-invb btn-login" id="loginBttn">Log in</a></li>
        <li id="SgUpBttn"><a class="dropdown-item txt-light-invb btn-signup" id="signupBttn">Sign up</a></li>
        <li id=""><a class="dropdown-item txt-light-invb" id="myProfileBttn">My Profile</a></li>
        <li id="lgOutBttn"><a class="dropdown-item txt-light-invb" id="logoutBttn" >Log out</a></li>
        <li id="OTPBttn"><a class="dropdown-item txt-light-invb" id="verifOTPBttn" >Verify account</a></li>
    </ul>
</div>

<div class="modal fade" id="searchModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content bg-transparent">
            <input type="text" class="w100" placeholder="search">
            <button type="button" class="btn btn-secondary" onclick="popdev()" data-bs-dismiss="modal"><i class="fas fa-search mx-2"></i></button>
         </div>
    </div>
</div>


    <!-- Button trigger modal -->

    <!-- class="" data-bs-toggle="modal" data-bs-target="#searchmodal" -->
    <!-- Modal -->
    <!-- <div class="modal fade bg-light-in" id="searchmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">

                <input class="w100" placeholder="search">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <button type="button" class="btn btn-secondary" onclick="popdev()" data-bs-dismiss="modal"><i
                        class="fas fa-search mx-2"></i></button>
            </div>
        </div>
    </div>
    </div> -->