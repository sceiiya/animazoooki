<div class="sticky-top navic-cont ic-l">
            <a class="navbar-brand px-2" href="#">
                <!-- light-mode -->

                <img src="/assets/img/animazooki-b.png" alt="Animazooki" style="max-height: 40px" class="mt-1 pb-1">


                <!-- dark-mode -->
                <!-- <img src="/assets/img/animazooki-w.svg" alt="" style="max-height: 40px">
                 -->

            </a>
        </div>
        <div class="sticky-top navic-cont ic-r px-2"> <!-- <i class="bi bi-moon"></i> -->
            <a class="nav-button" id="mode-toggle"><i class="fas fa-moon mx-2 txt-light-inv"></i></button>
            <a class="nav-button"><i class="fas fa-search mx-2 txt-light-inv" type="button" class="" data-bs-toggle="modal" data-bs-target="#searchmodal"></i></a>
            <a class="nav-button" href="/profile/cart/"><i class="fas fa-shopping-cart mx-2 txt-light-inv"></i></a>
            <a class="nav-button" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-circle mx-2 txt-light-inv"></i></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item txt-light-inv" href="/log-in/">Log in</a></li>
                            <li><a class="dropdown-item txt-light-inv" href="/sign-up/">Sign up</a></li>
                            <li><a class="dropdown-item txt-light-inv" href="/profile/">My Profile</a></li>
                            <li><a class="dropdown-item txt-light-inv" href="#" onclick="popdev()">Log out</a></li>
                        </ul>
        </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade bg-light-in" id="searchmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
    </div>