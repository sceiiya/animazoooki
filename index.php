<!DOCTYPE html>
<html lang="en">

<head>

    <title>Animazooki Merch Co. | Homepage</title>
</head>

<body class="bg-light">







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

    <!-- main hero -->
    <div id="carouselExampleDark" class="carousel carousel-light slide carousel_animazooki_hero" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5" aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="6" aria-label="Slide 7"></button>

        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="4000">
                <img src="/assets/img/tensura-cover.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Series One</h5>
                    <p>This is some featured series.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="8000">
                <img src="https://media.tenor.com/iMeKS77VlEgAAAAd/anime.gif" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Series Two</h5>
                    <p>This is some featured series.</p>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <!-- template here -->
            <div class="carousel-item" data-bs-interval="12000">
                <img src="https://media.tenor.com/9_ygK1r8OFkAAAAd/d4dj-meme.gif" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Series Three</h5>
                    <p>This is some featured series.</p>
                </div>
            </div>
            <!-- template here -->
            <div class="carousel-item" data-bs-interval="16000">
                <img src="https://media.tenor.com/7EVOYN2fDOcAAAAC/haikyuu-anime.gif" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Series Four</h5>
                    <p>This is some featured series.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="20000">
                <img src="https://media.tenor.com/wEko9Isabc8AAAAd/nijisanji-vtuber.gif" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Series Five</h5>
                    <p>This is some featured series.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="24000">
                <img src="https://media.tenor.com/MzTypOGKvlEAAAAd/toradora-minecraft.gif" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Series Six</h5>
                    <p>This is some featured series.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="28000">
                <img src="https://media.tenor.com/cz7GtnlG7M8AAAAd/lazulight-nijisanji.gif" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Series Seven</h5>
                    <p>This is some featured series.</p>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- main hero -->

    <!-- navigation bar heading -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top bg-light-in" style="top:29px">
        <div class="container-fluid">
            <a class="navbar-brand ps-5" href="#">
                <!-- light-mode -->
                <img src="/assets/img/n-logo-b.png" alt="Animazooki" style="max-height: 30px" class="pb-1">
                <!-- dark-mode -->
                <!-- <img src="/assets/img/n-logo-w.png" alt="" style="max-height: 35px"> -->
            </a>
            <button class="burger-toggler navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse bg-light-in" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active txt-light-inv" aria-current="page" href="#">Home &nbsp; </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link txt-light-inv" href="/vouchers/">Vouchers &nbsp; </a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle txt-light-inv" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop By &nbsp;</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item txt-light-inv" href="/all-products/category/">Category</a></li>
                            <li><a class="dropdown-item txt-light-inv" href="/all-products/series/">Series</a></li>
                            <li><a class="dropdown-item txt-light-inv" href="#" onclick="popdev()">Trend</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link txt-light-inv" href="#" onclick="popdev()">New Arrivals &nbsp; </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link txt-light-inv" href="#" onclick="popdev()">Upcoming Merchandise &nbsp; </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link txt-light-inv" href="/all-products/">All Products &nbsp; </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link txt-light-inv" href="/articles/">Articles &nbsp; </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
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
                        PRODUCTS YOU MAY LIKE
                    </h3>
                    <p class="hero-p">
                        life is full of problems,<br />just watch anime
                    </p>

                </section>
                <section class="content-cards-container">
                    <div class="card-cont-attr">

                        <a class="card-attr" href="/all-products/Usada-Pekora_t-shirt/">
                            <div class="item-img-cont">
                                <img src="/all-products/Usada-Pekora_t-shirt/1.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="item-name txt-light-inv">
                                        Usada Pekora HOLOLIVE JP inspired T-shirt
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="item-price">$69</p>
                                </div>
                                <div class="item-inf-tex-cont mt-0 pt-0">
                                    <p class="item-sold-count">486 sold</p>
                                </div>
                                <div class="item-inf-tex-cont">
                                    <p class="rating-cont txt-light-inv">
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star unrated"></i>
                                        <i class="fas fa-star unrated"></i>
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr" href="/all-products/minato-aqua-scale-figurine/">
                            <div class="item-img-cont">
                                <img src="/all-products/minato-aqua-scale-figurine/2.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="item-name txt-light-inv">
                                        Minato Aqua: Aqua Iro Super Dream Ver. 1/7 Scale Figure
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="item-price">$69</p>
                                </div>
                                <div class="item-inf-tex-cont mt-0 pt-0">
                                    <p class="item-sold-count">199 orders</p>
                                </div>
                                <div class="item-inf-tex-cont">
                                    <p class="rating-cont txt-light-inv">
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star unrated"></i>
                                    </p>
                                </div>
                            </div>
                        </a>
                        
                        <a class="card-attr" href="/all-products/Enna-Alouette_t-shirt/">
                            <div class="item-img-cont">
                                <img src="/all-products/Enna-Alouette_t-shirt/3.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="item-name txt-light-inv">
                                        Enna Alouette NIJISANJI EN inspired T-shirt
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="item-price">$69</p>
                                </div>
                                <div class="item-inf-tex-cont mt-0 pt-0">
                                    <p class="item-sold-count">1.9k sold</p>
                                </div>
                                <div class="item-inf-tex-cont">
                                    <p class="rating-cont txt-light-inv">
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                    </p>
                                </div>
                            </div>
                        </a>
                        
                        <a class="card-attr" href="/all-products/Shalltear-Bloodfallen_t-shirt/">
                            <div class="item-img-cont">
                                <img src="/all-products/Shalltear-Bloodfallen_t-shirt/4.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="item-name txt-light-inv">
                                        Shalltear Bloodfallen OVERLORD Anime Series inspired T-shirt
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="item-price">$69</p>
                                </div>
                                <div class="item-inf-tex-cont mt-0 pt-0">
                                    <p class="item-sold-count">668 sold</p>
                                </div>
                                <div class="item-inf-tex-cont txt-light-inv">
                                    <p class="rating-cont txt-light-inv">
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star unrated"></i>
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr" href="/all-products/Shalltear-Bloodfallen_t-shirt/">
                            <div class="item-img-cont">
                                <img src="/all-products/Shalltear-Bloodfallen_t-shirt/4.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="item-name txt-light-inv">
                                        Shalltear Bloodfallen OVERLORD Anime Series inspired T-shirt
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="item-price">$69</p>
                                </div>
                                <div class="item-inf-tex-cont mt-0 pt-0">
                                    <p class="item-sold-count">668 sold</p>
                                </div>
                                <div class="item-inf-tex-cont txt-light-inv">
                                    <p class="rating-cont">
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star unrated"></i>
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr" href="/all-products/Shalltear-Bloodfallen_t-shirt/">
                            <div class="item-img-cont">
                                <img src="/all-products/Shalltear-Bloodfallen_t-shirt/4.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="item-name txt-light-inv">
                                        Shalltear Bloodfallen OVERLORD Anime Series inspired T-shirt
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="item-price">$69</p>
                                </div>
                                <div class="item-inf-tex-cont mt-0 pt-0">
                                    <p class="item-sold-count">668 sold</p>
                                </div>
                                <div class="item-inf-tex-cont">
                                    <p class="rating-cont txt-light-inv">
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star unrated"></i>
                                    </p>
                                </div>
                            </div>
                        </a>

                    </div>
                </section>
            </section>



            <section class="sec-divider">
                <hr />
            </section>



            <!----------- featured collection heree ------------>

            <section class="my-hero-home">
                <section class="my-hero-title">

                    <h3 class="hero-h3">
                        Featured Collection
                    </h3>
                    <p class="hero-p">
                        You won't like missing these collections
                    </p>

                </section>
                <section class="content-cards-container">

                    <div class="series-cont 100 rwflx m-0 p-0 bdbx">
                        <div class="w50 clflx m-0 p-0 bdbx">
                            <div class="featured-collection-header w100 txtc m-0 p-0">
                                <h3>
                                    HOLOLIVE SERIES
                                </h3>
                            </div>
                            <div class="card-cont-attr-featured-coll">

                                <a class="card-attr-featured-coll" href="/all-products/Usada-Pekora_t-shirt/">
                                    <div class="item-img-cont">
                                        <img src="/all-products/Usada-Pekora_t-shirt/3.jpg" class="item-img-main" alt="...">
                                    </div>
                                    <div class=" item-inf-cont">
                                        <div class="item-inf-tex-cont">
                                            <p class="item-name txt-light-inv">
                                                Usada Pekora HOLOLIVE JP inspired T-shirt
                                            </p>
                                        </div>
                                        <div class="item-inf-tex-cont mb-0 pt-0">
                                            <p class="item-price">$69</p>
                                        </div>
                                        <div class="item-inf-tex-cont mt-0 pt-0">
                                            <p class="item-sold-count">486 sold</p>
                                        </div>
                                        <div class="item-inf-tex-cont">
                                            <p class="rating-cont txt-light-inv">
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star unrated"></i>
                                                <i class="fas fa-star unrated"></i>
                                            </p>
                                        </div>
                                    </div>
                                </a>

                                <a class="card-attr-featured-coll" href="/all-products/minato-aqua-scale-figurine/">
                                    <div class="item-img-cont">
                                        <img src="/all-products/minato-aqua-scale-figurine/0.jpg" class="item-img-main" alt="...">
                                    </div>
                                    <div class=" item-inf-cont">
                                        <div class="item-inf-tex-cont">
                                            <p class="item-name txt-light-inv">
                                                Minato Aqua: Aqua Iro Super Dream Ver. 1/7 Scale Figure
                                            </p>
                                        </div>
                                        <div class="item-inf-tex-cont mb-0 pt-0">
                                            <p class="item-price">$199</p>
                                        </div>
                                        <div class="item-inf-tex-cont mt-0 pt-0">
                                            <p class="item-sold-count">199 orders</p>
                                        </div>
                                        <div class="item-inf-tex-cont">
                                            <p class="rating-cont txt-light-inv">
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star unrated"></i>
                                            </p>
                                        </div>
                                    </div>
                                </a>

                                <a class="card-attr-featured-coll" href="/all-products/Usada-Pekora_t-shirt/">
                                    <div class="item-img-cont">
                                        <img src="/all-products/Usada-Pekora_t-shirt/1.jpg" class="item-img-main" alt="...">
                                    </div>
                                    <div class=" item-inf-cont">
                                        <div class="item-inf-tex-cont">
                                            <p class="item-name txt-light-inv">
                                                Usada Pekora HOLOLIVE JP inspired T-shirt
                                            </p>
                                        </div>
                                        <div class="item-inf-tex-cont mb-0 pt-0">
                                            <p class="item-price">$69</p>
                                        </div>
                                        <div class="item-inf-tex-cont mt-0 pt-0">
                                            <p class="item-sold-count">486 sold</p>
                                        </div>
                                        <div class="item-inf-tex-cont">
                                            <p class="rating-cont txt-light-inv">
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star unrated"></i>
                                                <i class="fas fa-star unrated"></i>
                                            </p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <div class="w50 clflx m-0 p-0">
                            <div class="featured-collection-header w100 txtc m-0 p-0">
                                <h3>
                                    MUSHOKU TENSEI SERIES
                                </h3>
                            </div>
                            <div class="card-cont-attr-featured-coll">

                                <a class="card-attr-featured-coll" href="">
                                    <div class="item-img-cont">
                                        <img src="/all-products/mock/1.jpg" class="item-img-main" alt="...">
                                    </div>
                                    <div class=" item-inf-cont">
                                        <div class="item-inf-tex-cont">
                                            <p class="item-name txt-light-inv">
                                                Eris Boreas Greyrat Mushoku Tensei Inspired T-shirt
                                            </p>
                                        </div>
                                        <div class="item-inf-tex-cont mb-0 pt-0">
                                            <p class="item-price">$79</p>
                                        </div>
                                        <div class="item-inf-tex-cont mt-0 pt-0">
                                            <p class="item-sold-count">724 orders</p>
                                        </div>
                                        <div class="item-inf-tex-cont">
                                            <p class="rating-cont txt-light-inv">
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star rated"></i>
                                            </p>
                                        </div>
                                    </div>
                                </a>

                                <a class="card-attr-featured-coll" href="">
                                    <div class="item-img-cont">
                                        <img src="/all-products/mock/2.jpg" class="item-img-main" alt="...">
                                    </div>
                                    <div class=" item-inf-cont">
                                        <div class="item-inf-tex-cont">
                                            <p class="item-name txt-light-inv">
                                                Roxy Migurdia Mushoku Tensei Inspired T-shirt
                                            </p>
                                        </div>
                                        <div class="item-inf-tex-cont mb-0 pt-0">
                                            <p class="item-price">$79</p>
                                        </div>
                                        <div class="item-inf-tex-cont mt-0 pt-0">
                                            <p class="item-sold-count">516 orders</p>
                                        </div>
                                        <div class="item-inf-tex-cont">
                                            <p class="rating-cont txt-light-inv">
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star unrated"></i>
                                                <i class="fas fa-star unrated"></i>
                                            </p>
                                        </div>
                                    </div>
                                </a>

                                <a class="card-attr-featured-coll" href="">
                                    <div class="item-img-cont">
                                        <img src="/all-products/mock/3.jpg" class="item-img-main" alt="...">
                                    </div>
                                    <div class=" item-inf-cont">
                                        <div class="item-inf-tex-cont">
                                            <p class="item-name txt-light-inv">
                                                Rudeus Greyrat Mushoku Tensei Inspired T-shirt
                                            </p>
                                        </div>
                                        <div class="item-inf-tex-cont mb-0 pt-0">
                                            <p class="item-price">$79</p>
                                        </div>
                                        <div class="item-inf-tex-cont mt-0 pt-0">
                                            <p class="item-sold-count">489 orders</p>
                                        </div>
                                        <div class="item-inf-tex-cont">
                                            <p class="rating-cont txt-light-inv">
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star rated"></i>
                                                <i class="fas fa-star unrated"></i>
                                            </p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>

                </section>
            </section>

            <!----------- featured collection heree ------------>








            <section class="sec-divider">
                <hr />
            </section>




            <section class="my-hero-home">
                <section class="my-hero-title">

                    <h3 class="hero-h3">
                        NEW ARRIVALS
                    </h3>
                    <p class="hero-p">
                        beware of truck-kun,<br />you might get isekaid
                    </p>

                </section>
                <section class="content-cards-container">
                    <div class="card-cont-attr">

                        <a class="card-attr" href="/all-products/Usada-Pekora_t-shirt/">
                            <div class="item-img-cont">
                                <img src="/all-products/Usada-Pekora_t-shirt/4.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="item-name txt-light-inv">
                                        Usada Pekora HOLOLIVE JP inspired T-shirt
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="item-price">$69</p>
                                </div>
                                <div class="item-inf-tex-cont mt-0 pt-0">
                                    <p class="item-sold-count">486 sold</p>
                                </div>
                                <div class="item-inf-tex-cont">
                                    <p class="rating-cont txt-light-inv">
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star unrated"></i>
                                        <i class="fas fa-star unrated"></i>
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr" href="/all-products/minato-aqua-scale-figurine/">
                            <div class="item-img-cont">
                                <img src="/all-products/minato-aqua-scale-figurine/2.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="item-name txt-light-inv">
                                        Minato Aqua: Aqua Iro Super Dream Ver. 1/7 Scale Figure
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="item-price">$69</p>
                                </div>
                                <div class="item-inf-tex-cont mt-0 pt-0">
                                    <p class="item-sold-count">199 orders</p>
                                </div>
                                <div class="item-inf-tex-cont">
                                    <p class="rating-cont txt-light-inv">
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star unrated"></i>
                                    </p>
                                </div>
                            </div>
                        </a>
                        
                        <a class="card-attr" href="/all-products/Enna-Alouette_t-shirt/">
                            <div class="item-img-cont">
                                <img src="/all-products/Enna-Alouette_t-shirt/3.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="item-name txt-light-inv">
                                        Enna Alouette NIJISANJI EN inspired T-shirt
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="item-price">$69</p>
                                </div>
                                <div class="item-inf-tex-cont mt-0 pt-0">
                                    <p class="item-sold-count">1.9k sold</p>
                                </div>
                                <div class="item-inf-tex-cont">
                                    <p class="rating-cont txt-light-inv">
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                    </p>
                                </div>
                            </div>
                        </a>
                        
                        <a class="card-attr" href="/all-products/Shalltear-Bloodfallen_t-shirt/">
                            <div class="item-img-cont">
                                <img src="/all-products/Shalltear-Bloodfallen_t-shirt/4.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="item-name txt-light-inv">
                                        Shalltear Bloodfallen OVERLORD Anime Series inspired T-shirt
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="item-price">$69</p>
                                </div>
                                <div class="item-inf-tex-cont mt-0 pt-0">
                                    <p class="item-sold-count">668 sold</p>
                                </div>
                                <div class="item-inf-tex-cont txt-light-inv">
                                    <p class="rating-cont txt-light-inv">
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star unrated"></i>
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr" href="/all-products/Shalltear-Bloodfallen_t-shirt/">
                            <div class="item-img-cont">
                                <img src="/all-products/Shalltear-Bloodfallen_t-shirt/4.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="item-name txt-light-inv">
                                        Shalltear Bloodfallen OVERLORD Anime Series inspired T-shirt
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="item-price">$69</p>
                                </div>
                                <div class="item-inf-tex-cont mt-0 pt-0">
                                    <p class="item-sold-count">668 sold</p>
                                </div>
                                <div class="item-inf-tex-cont txt-light-inv">
                                    <p class="rating-cont">
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star unrated"></i>
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr" href="/all-products/Shalltear-Bloodfallen_t-shirt/">
                            <div class="item-img-cont">
                                <img src="/all-products/Shalltear-Bloodfallen_t-shirt/4.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="item-name txt-light-inv">
                                        Shalltear Bloodfallen OVERLORD Anime Series inspired T-shirt
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="item-price">$69</p>
                                </div>
                                <div class="item-inf-tex-cont mt-0 pt-0">
                                    <p class="item-sold-count">668 sold</p>
                                </div>
                                <div class="item-inf-tex-cont">
                                    <p class="rating-cont txt-light-inv">
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star unrated"></i>
                                    </p>
                                </div>
                            </div>
                        </a>

                    </div>
                </section>
            </section>



            <section class="sec-divider">
                <hr />
            </section>


            <!----------- by series collection heree ------------>

            <section class="my-hero-home">
                <section class="my-hero-title">

                    <h3 class="hero-h3">
                        TOP SERIES MERCH
                    </h3>
                    <p class="hero-p">
                        if you havn't watched these, you know what to do
                    </p>

                </section>
                <section class="content-cards-container">
                    <div class="card-cont-attr">

                        <a class="card-attr">
                            <div class="series-img-cont">
                                <img src="/all-products/series/mock/7.jpg" class="series-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="series-name-cont">
                                    <p class="series-name">
                                        Mushoku Tensei
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr">
                            <div class="series-img-cont">
                                <img src="/all-products/series/mock/8.jpg" class="series-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="series-name-cont">
                                    <p class="series-name">
                                        Nijisanji
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr">
                            <div class="series-img-cont">
                                <img src="/all-products/series/mock/10.jpg" class="series-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="series-name-cont">
                                    <p class="series-name">
                                        Overlord
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr">
                            <div class="series-img-cont">
                                <img src="/all-products/series/mock/3.jpg" class="series-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="series-name-cont">
                                    <p class="series-name">
                                        Eminence in Shadow
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr">
                            <div class="series-img-cont">
                                <img src="/all-products/series/mock/2.jpg" class="series-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="series-name-cont">
                                    <p class="series-name">
                                        Data a Live
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr">
                            <div class="series-img-cont">
                                <img src="/all-products/series/mock/4.jpg" class="series-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="series-name-cont">
                                    <p class="series-name">
                                        Hololive
                                    </p>
                                </div>
                            </div>
                        </a>


                    </div>
                </section>
            </section>

            <!----------- by series collection heree ------------>

            <section class="sec-divider">
                <hr />
            </section>

            <!----------- by categories collection heree ------------>

            <section class="my-hero-home">
                <section class="my-hero-title">

                    <h3 class="hero-h3">
                        SHOP BY CATEGORY HERE
                    </h3>
                    <p class="hero-p">
                        are you missing something in your collection?
                        <br />
                        check out here!
                    </p>

                </section>
                <section class="content-cards-container">
                    <div class="card-cont-attr">

                        <a class="card-attr">
                            <div class="category-img-cont">
                                <img src="/all-products/category/mock/1.jpg" class="series-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="category-name-cont">
                                    <p class="category-name txt-light">
                                        Oversized Tshirt
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr">
                            <div class="category-img-cont">
                                <img src="/all-products/category/mock/6.jpg" class="series-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="category-name-cont">
                                    <p class="category-name txt-light">
                                        Stickers
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr">
                            <div class="category-img-cont">
                                <img src="/all-products/category/mock/2.jpg" class="series-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="category-name-cont">
                                    <p class="category-name txt-light">
                                        Dry-fit T-shirt
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr">
                            <div class="category-img-cont">
                                <img src="/all-products/category/mock/4.jpg" class="series-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="category-name-cont">
                                    <p class="category-name txt-light">
                                        Keychain
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr">
                            <div class="category-img-cont">
                                <img src="/all-products/category/mock/3.jpg" class="series-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="category-name-cont">
                                    <p class="category-name txt-light">
                                        Hoodie Jacket
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr">
                            <div class="category-img-cont">
                                <img src="/all-products/category/mock/7.jpg" class="series-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="category-name-cont">
                                    <p class="category-name txt-light">
                                        1/7 Scale Figurine
                                    </p>
                                </div>
                            </div>
                        </a>

                    </div>
                </section>
            </section>

            <!----------- by categories collection heree ------------>

            <section class="sec-divider">
                <hr />
            </section>


            <section class="my-hero-home">
                <section class="my-hero-title">

                    <h3 class="hero-h3">
                        ANIME UPDATES THAT YOU SHOULD KNOW
                    </h3>
                    <p class="hero-p">
                        don't forget to watch 20 episodes per day!
                    </p>

                </section>
                <section class="content-cards-container">
                    <div class="card-cont-attr">


                        <a class="card-attr" href="/articles/Tensura-Film-to-be-Released-Worldwde-anime-news-1/" target="_blank">
                            <div class="item-img-cont">
                                <img src="https://cdn.animenewsnetwork.com/thumbnails/max500x600/encyc/A20736-2172185775.1528434403.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="article-name txt-light-inv txtl">
                                        That Time I Got Reincarnated as a Slime Film to be Released Worldwde
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="article-tag p-0 ps-2 m-1">Fantasy</p>
                                    <p class="article-tag p-0 ps-2 m-1">Isekai</p>
                                    <p class="article-tag p-0 ps-2 m-1 mb-2">Magic</p>
                                </div>

                            </div>
                        </a>

                        <a class="card-attr" href="/articles/Mushoku-Tensei-2-stage-at-Anime-Japan-2023-anime-news-3/" target="_blank">
                            <div class="item-img-cont">
                                <img src="https://staticg.sportskeeda.com/editor/2023/02/871d9-16757938399220-1920.jpg" class="item-img-main" alt="">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="article-name txt-light-inv txtl">
                                        Mushoku Tensei 2 stage at Anime Japan 2023
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="article-tag p-0 ps-2 m-1">Isekai</p>
                                    <p class="article-tag p-0 ps-2 m-1">Magic</p>
                                    <p class="article-tag p-0 ps-2 m-1 mb-2">Tragic</p>
                                </div>

                            </div>
                        </a>
<!-- article card template -->
                        <a class="card-attr" href="/articles/NIJISANJI-EN-Announces-Ethyria-anime-news-2/" target="_blank">
                            <div class="item-img-cont">
                                <img src="https://cdn.shopify.com/s/files/1/0577/1254/1891/files/y7DTwXkaDymgZyEA7Nkf.jpg?v=1664945493" class="item-img-main" alt="">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="article-name txt-light-inv txtl">
                                        NIJISANJI EN Announces 3rd Virtual YouTuber Group "Ethyria"                                
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="article-tag p-0 ps-2 m-1">Isekai</p>
                                    <p class="article-tag p-0 ps-2 m-1">Fantasy</p>
                                    <p class="article-tag p-0 ps-2 m-1 mb-2">Action</p>
                                </div>

                            </div>
                        </a>
<!-- article card template -->
                        <a class="card-attr" href="/articles/Tensura-Film-to-be-Released-Worldwde-anime-news-1/" target="_blank">
                            <div class="item-img-cont">
                                <img src="https://cdn.animenewsnetwork.com/thumbnails/max500x600/encyc/A20736-2172185775.1528434403.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="article-name txt-light-inv txtl">
                                        That Time I Got Reincarnated as a Slime Film to be Released Worldwde
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="article-tag p-0 ps-2 m-1">Fantasy</p>
                                    <p class="article-tag p-0 ps-2 m-1">Isekai</p>
                                    <p class="article-tag p-0 ps-2 m-1 mb-2">Magic</p>
                                </div>

                            </div>
                        </a>

                        <a class="card-attr" href="/articles/Mushoku-Tensei-2-stage-at-Anime-Japan-2023-anime-news-3/" target="_blank">
                            <div class="item-img-cont">
                                <img src="https://staticg.sportskeeda.com/editor/2023/02/871d9-16757938399220-1920.jpg" class="item-img-main" alt="">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="article-name txt-light-inv txtl">
                                        Mushoku Tensei 2 stage at Anime Japan 2023
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="article-tag p-0 ps-2 m-1">Isekai</p>
                                    <p class="article-tag p-0 ps-2 m-1">Magic</p>
                                    <p class="article-tag p-0 ps-2 m-1 mb-2">Tragic</p>
                                </div>

                            </div>
                        </a>

                        <a class="card-attr" href="/articles/NIJISANJI-EN-Announces-Ethyria-anime-news-2/" target="_blank">
                            <div class="item-img-cont">
                                <img src="https://cdn.shopify.com/s/files/1/0577/1254/1891/files/y7DTwXkaDymgZyEA7Nkf.jpg?v=1664945493" class="item-img-main" alt="">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="article-name txt-light-inv txtl">
                                        NIJISANJI EN Announces 3rd Virtual YouTuber Group "Ethyria"                                
                                    </p>                                
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="article-tag p-0 ps-2 m-1">Isekai</p>
                                    <p class="article-tag p-0 ps-2 m-1">Fantasy</p>
                                    <p class="article-tag p-0 ps-2 m-1 mb-2">Action</p>
                                </div>

                            </div>
                        </a>


                    </div>
                </section>
            </section>



            <section class="sec-divider">
                <hr />
            </section>

            <section class="my-hero-home">
                <section class="my-hero-title">

                    <h3 class="hero-h3">
                        DAILY HAUL
                    </h3>
                    <p class="hero-p">
                        always do your daily tasks!
                    </p>

                </section>
                <section class="content-cards-container">
                    <div class="card-cont-attr">

                        <a class="card-attr" href="/all-products/Usada-Pekora_t-shirt/">
                            <div class="item-img-cont">
                                <img src="/all-products/Usada-Pekora_t-shirt/1.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="item-name txt-light-inv">
                                        Usada Pekora HOLOLIVE JP inspired T-shirt
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="item-price">$69</p>
                                </div>
                                <div class="item-inf-tex-cont mt-0 pt-0">
                                    <p class="item-sold-count">486 sold</p>
                                </div>
                                <div class="item-inf-tex-cont">
                                    <p class="rating-cont txt-light-inv">
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star unrated"></i>
                                        <i class="fas fa-star unrated"></i>
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr" href="/all-products/minato-aqua-scale-figurine/">
                            <div class="item-img-cont">
                                <img src="/all-products/minato-aqua-scale-figurine/2.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="item-name txt-light-inv">
                                        Minato Aqua: Aqua Iro Super Dream Ver. 1/7 Scale Figure
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="item-price">$199</p>
                                </div>
                                <div class="item-inf-tex-cont mt-0 pt-0">
                                    <p class="item-sold-count">199 orders</p>
                                </div>
                                <div class="item-inf-tex-cont">
                                    <p class="rating-cont txt-light-inv">
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star unrated"></i>
                                    </p>
                                </div>
                            </div>
                        </a>
                        
                        <a class="card-attr" href="/all-products/Enna-Alouette_t-shirt/">
                            <div class="item-img-cont">
                                <img src="/all-products/Enna-Alouette_t-shirt/3.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="item-name txt-light-inv">
                                        Enna Alouette NIJISANJI EN inspired T-shirt
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="item-price">$69</p>
                                </div>
                                <div class="item-inf-tex-cont mt-0 pt-0">
                                    <p class="item-sold-count">1.9k sold</p>
                                </div>
                                <div class="item-inf-tex-cont">
                                    <p class="rating-cont txt-light-inv">
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                    </p>
                                </div>
                            </div>
                        </a>
                        
                        <a class="card-attr" href="/all-products/Shalltear-Bloodfallen_t-shirt/">
                            <div class="item-img-cont">
                                <img src="/all-products/Shalltear-Bloodfallen_t-shirt/3.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="item-name txt-light-inv">
                                        Shalltear Bloodfallen OVERLORD Anime Series inspired T-shirt
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="item-price">$69</p>
                                </div>
                                <div class="item-inf-tex-cont mt-0 pt-0">
                                    <p class="item-sold-count">668 sold</p>
                                </div>
                                <div class="item-inf-tex-cont txt-light-inv">
                                    <p class="rating-cont txt-light-inv">
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star unrated"></i>
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr" href="/all-products/Shalltear-Bloodfallen_t-shirt/">
                            <div class="item-img-cont">
                                <img src="/all-products/Shalltear-Bloodfallen_t-shirt/2.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="item-name txt-light-inv">
                                        Shalltear Bloodfallen OVERLORD Anime Series inspired T-shirt
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="item-price">$69</p>
                                </div>
                                <div class="item-inf-tex-cont mt-0 pt-0">
                                    <p class="item-sold-count">668 sold</p>
                                </div>
                                <div class="item-inf-tex-cont txt-light-inv">
                                    <p class="rating-cont">
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star unrated"></i>
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="card-attr" href="/all-products/Shalltear-Bloodfallen_t-shirt/">
                            <div class="item-img-cont">
                                <img src="/all-products/Shalltear-Bloodfallen_t-shirt/4.jpg" class="item-img-main" alt="...">
                            </div>
                            <div class=" item-inf-cont">
                                <div class="item-inf-tex-cont">
                                    <p class="item-name txt-light-inv">
                                        Shalltear Bloodfallen OVERLORD Anime Series inspired T-shirt
                                    </p>
                                </div>
                                <div class="item-inf-tex-cont mb-0 pt-0">
                                    <p class="item-price">$69</p>
                                </div>
                                <div class="item-inf-tex-cont mt-0 pt-0">
                                    <p class="item-sold-count">668 sold</p>
                                </div>
                                <div class="item-inf-tex-cont">
                                    <p class="rating-cont txt-light-inv">
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star rated"></i>
                                        <i class="fas fa-star unrated"></i>
                                    </p>
                                </div>
                            </div>
                        </a>

                    </div>
                </section>
            </section>



            <section class="sec-divider">
                <hr />
            </section>




        </main>
        <!--content of the main--->

        <!--right side of the main--->
        <aside class="side-r ">
            <aside class="side-sec-t">

                <section class="suggest-cards-container">
                    <div class="suggest-card-cont-attr">

                        <a class="suggest-card-attr" href="/all-products/Shalltear-Bloodfallen_t-shirt/" title="Shalltear Bloodfallen OVERLORD Anime Series inspired T-shirt">
                            <div class="suggest-item-img-cont">
                                <img src="/all-products/Shalltear-Bloodfallen_t-shirt/1.jpg" class="suggest-item-img-main" alt="">
                            </div>
                            <div class=" suggest-item-inf-cont">
                                <div class="suggest-item-inf-tex-cont">
                                    <p class="suggest-item-name txt-light-inv">
                                        Shalltear Bloodfallen OVERLORD Anime Series inspired T-shirt
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="suggest-card-attr" href="/all-products/minato-aqua-scale-figurine/" title="Minato Aqua: Aqua Iro Super Dream Ver. 1/7 Scale Figure">
                            <div class="suggest-item-img-cont">
                                <img src="/all-products/minato-aqua-scale-figurine/1.jpg" class="suggest-item-img-main" alt="">
                            </div>
                            <div class=" suggest-item-inf-cont">
                                <div class="suggest-item-inf-tex-cont">
                                    <p class="suggest-item-name txt-light-inv">
                                        Minato Aqua: Aqua Iro Super Dream Ver. 1/7 Scale Figure
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a class="suggest-card-attr"  href="/all-products/Enna-Alouette_t-shirt/" title="Enna Alouette NIJISANJI EN inspired T-shirt">
                            <div class="suggest-item-img-cont">
                                <img src="/all-products/Enna-Alouette_t-shirt/3.jpg" class="suggest-item-img-main" alt="">
                            </div>
                            <div class=" suggest-item-inf-cont">
                                <div class="suggest-item-inf-tex-cont">
                                    <p class="suggest-item-name txt-light-inv">
                                        Enna Alouette NIJISANJI EN inspired T-shirt
                                    </p>
                                </div>
                            </div>
                        </a>

                    </div>
                </section>
            </aside>
            <aside class="side-sec-b">

                <section class="article-cards-container">
                    <div class="article-card-cont-attr">




                        <a class="article-card-attr" href="/articles/Mushoku-Tensei-2-stage-at-Anime-Japan-2023-anime-news-3/" target="_blank" title="Mushoku Tensei 2 stage at Anime Japan 2023">
                            <div class="article-item-img-cont">
                                <img src="https://staticg.sportskeeda.com/editor/2023/02/871d9-16757938399220-1920.jpg" class="suggest-item-img-main" alt="Mushoku Tensei 2 stage at Anime Japan 2023">
                            </div>
                            <div class=" article-item-inf-cont">
                                <div class="article-item-inf-tex-cont">
                                    <p class="article-item-name txtred">
                                        Mushoku Tensei 2 stage at Anime Japan 2023
                                    </p>
                                </div>

                            </div>
                        </a>

                        <a class="article-card-attr" href="/articles/NIJISANJI-EN-Announces-Ethyria-anime-news-2/" target="_blank" title="NIJISANJI EN Announces 3rd Virtual YouTuber Group 'Ethyria'">
                            <div class="article-item-img-cont">
                                <img src="https://cdn.shopify.com/s/files/1/0577/1254/1891/files/y7DTwXkaDymgZyEA7Nkf.jpg?v=1664945493" class="suggest-item-img-main" alt="NIJISANJI EN Announces 3rd Virtual YouTuber Group 'Ethyria'">
                            </div>
                            <div class=" article-item-inf-cont">
                                <div class="article-item-inf-tex-cont">
                                    <p class="article-item-name txtred">
                                        NIJISANJI EN Announces 3rd Virtual YouTuber Group "Ethyria"
                                    </p>
                                </div>

                            </div>
                        </a>

                        <a class="article-card-attr" href="/articles/Tensura-Film-to-be-Released-Worldwde-anime-news-1/" target="_blank" title="That Time I Got Reincarnated as a Slime Film to be Released Worldwde">
                            <div class="article-item-img-cont">
                                <img src="https://cdn.animenewsnetwork.com/thumbnails/max500x600/encyc/A20736-2172185775.1528434403.jpg" class="suggest-item-img-main" alt="That Time I Got Reincarnated as a Slime Film to be Released Worldwde">
                            </div>
                            <div class=" article-item-inf-cont">
                                <div class="article-item-inf-tex-cont">
                                    <p class="article-item-name txtred">
                                        That Time I Got Reincarnated as a Slime Film to be Released Worldwde
                                    </p>
                                </div>

                            </div>
                        </a>




                    </div>
                </section>
            </aside>
        </aside>
        <!--right side of the main--->

    </section>



    <footer class="p-0 m-0 bg-cloud">
        <div class="footer-socmed-mail rwflx w100 p-3 py-2 footer-box">
            <div class="in-footer-socmed rwflx w50 txtr ">
                <div class="in-footer-sm-label txtc">
                    <h5 class="me-2 txtc txt-light">Connect with Us</h5>
                </div>
                <div class="in-footer-sm-links rwflx w50 me-2">
                    <a class="btn btn-outline-light btn-floating m-1" target="_blank"
                        href="https://www.facebook.com/profile.php?id=100090989854633" role="button"><i
                            class="fab fa-facebook-f p-1"></i></a>
                    <a class="btn btn-outline-light btn-floating m-1" target="_blank"
                        href="https://www.tiktok.com/@animazooki" role="button"><i class="fab fa-tiktok"></i></a>
                    <a class="btn btn-outline-light btn-floating m-1" target="_blank"
                        href="https://www.instagram.com/animazooki/" role="button"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-floating m-1" target="_blank"
                        href="https://www.youtube.com/c/animazooki" role="button"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-floating m-1" target="_blank"
                        href="https://www.twitter.com/animazooki" role="button"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="in-footer-mail">
                <!-- <div>
                    <p>Join our mailing list for anime and merchandise news!</p>
                </div> -->
                <div class="w100 txtc rwflx">
                    <div class="in-footer-mail-label txtc">
                        <h5 class="m-0 ms-2 txt-light">Email: &nbsp;&nbsp;</h5>
                    </div>
                    <div class="in-footer-mailinput">
                        <input class="crnrclean" type="email" id="email" name="email" placeholder="animazooki@gmail.com"
                            style="width: auto;">
                    </div>
                    <div class="in-footer-mail-button txtc">
                        <a class="footer-mail-button">
                            <h5 class="m-0 txt-light" onclick="popdev()">&nbsp;&nbsp; Subscribe</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-ship-info rwflx w100 footer-box px-5">
            <div class="clflx w50 txtl px-3 py-2 txt-light">
                <h5>Shipping Info</h5>
                <div>
                    <p class="ps-3 txt-light">Where can it ship? <br />
                        Local Philippines, Japan, China, Indonesia, Taiwan, and Thailand.<br />
                        Shipping fee may differ based on the size of the parcel. </p>
                    <br />
                    <p class="ps-3 txt-light">Expected Shipment Date: <br />
                        In-stick orders may take up to 7-10 business days.<br />
                        Hence for pre-orders, may take up to atleast 30 days to 90 days <br />depending on the
                        capability of
                        the manufacturer.</p>
                </div>
            </div>
            <div class="footer-ship-pay clflx w50 px-3 py-2">
                <div class="in-footer-freight-label txtl txt-light">
                    <h5>Partnered Freight Options</h5>
                </div>
                <div class="in-footer-freight-logos txtl rwflx p-3">

                    <div class="crnrclean">
                        <img class="cs-logo" src="/assets/img/footer/jnt-logo.png" alt="">
                    </div>&nbsp;&nbsp;
                    <div class="crnrclean">
                        <img class="cs-logo" src="/assets/img/footer/gogoxpress-logo.png" alt="">
                    </div>&nbsp;&nbsp;
                    <div class="crnrclean ">
                        <img class="cs-logo" src="/assets/img/footer/ninjavan-logo.png" alt="">
                    </div>&nbsp;&nbsp;
                    <div class="crnrclean ">
                        <img class="cs-logo" src="/assets/img/footer/flash-logo.png" alt="">
                    </div>
                </div>
                <div class="in-footer-pay-label txtl txt-light">
                    <h5>Payment Options</h5>
                </div>
                <div class="in-footer-pay-logos rwflx p-3">
                    <div class="crnrclean">
                        <img class="cs-logo" src="/assets/img/footer/visa-logo.png" alt="">
                    </div>&nbsp;&nbsp;
                    <div class="crnrclean">
                        <img class="cs-logo" src="/assets/img/footer/mastercard-logo.png" alt="">
                    </div>&nbsp;&nbsp;
                    <div class="crnrclean ">
                        <img class="cs-logo" src="/assets/img/footer/paypal-logo.png" alt="">
                    </div>&nbsp;&nbsp;
                    <div class="crnrclean ">
                        <img class="cs-logo" src="/assets/img/footer/paymaya-logo.png" alt="">
                    </div>&nbsp;&nbsp;
                    <div class="crnrclean ">
                        <img class="cs-logo" src="/assets/img/footer/gcash-logo.png" alt="">
                    </div>&nbsp;&nbsp;
                </div>
            </div>
        </div>

        <div class="footer-cs clflx w100 p-2 txtc footer-box foot-txt">
            <div class="in-footer-cs-label w100 txtc txt-light">
                <h5>Customer Service</h5>
            </div>
            <div class="in-footer-cs-list w100 txtc">
                <a class="footer-cs-list-i txt-light" data-bs-toggle="collapse" href="#animazooki-FAQ" role="button"
                    aria-expanded="false" aria-controls="collapseExample">FAQ</a> &nbsp;|&nbsp;
                <a class="footer-cs-list-i txt-light" data-bs-toggle="collapse" href="#animazooki-tracking"
                    role="button" aria-expanded="false" aria-controls="collapseExample">Order Tracking</a> &nbsp;|&nbsp;
                <a class="footer-cs-list-i txt-light" data-bs-toggle="collapse" href="#animazooki-RnR" role="button"
                    aria-expanded="false" aria-controls="collapseExample">Return & Refund</a> &nbsp;|&nbsp;
                <a class="footer-cs-list-i txt-light" data-bs-toggle="collapse" href="#animazooki-TnC" role="button"
                    aria-expanded="false" aria-controls="collapseExample">Terms & Conditions</a> &nbsp;|&nbsp;
                <a class="footer-cs-list-i txt-light" data-bs-toggle="collapse" href="#animazooki-privacy-policy"
                    role="button" aria-expanded="false" aria-controls="collapseExample">Privacy Policy</a> &nbsp;|&nbsp;
                <a class="footer-cs-list-i txt-light" data-bs-toggle="collapse" href="#animazooki-contact-us"
                    role="button" aria-expanded="false" aria-controls="collapseExample">Contact Us</a>
            </div>
            <div class="footer-cs-collapse clflx w100"> <!--- collapse --->
                <div class="collapse" id="animazooki-FAQ">
                    <div class="card card-body txtl ps-4 bg-light-inv">
                        Frequently Asked Question<br />
                        <div class="in-footer-cs-list clflx w100 txtl">
                            <a class="footer-cs-list-i ps-2 txt-light" data-bs-toggle="collapse" href="#faqq1"
                                role="button" aria-expanded="false" aria-controls="collapseExample">Question #1</a>
                            &nbsp;|&nbsp;
                            <div class="collapse" id="faqq1">
                                <div class="txtl ps-4 txt-light">
                                    Answer #1 <br />
                                </div>
                            </div>
                            <a class="footer-cs-list-i ps-2 txt-light" data-bs-toggle="collapse" href="#faqq2"
                                role="button" aria-expanded="false" aria-controls="collapseExample">Question #2</a>
                            &nbsp;|&nbsp;
                            <div class="collapse" id="faqq2">
                                <div class="txtl ps-4 txt-light">
                                    Answer #2 <br />
                                </div>
                            </div>
                            <a class="footer-cs-list-i ps-2 txt-light" data-bs-toggle="collapse" href="#faqq3"
                                role="button" aria-expanded="false" aria-controls="collapseExample">Question #3</a>
                            &nbsp;|&nbsp;
                            <div class="collapse" id="faqq3">
                                <div class=" txtl ps-4 txt-light">
                                    Answer #3 <br />
                                </div>
                            </div>
                            <a class="footer-cs-list-i ps-2 txt-light" data-bs-toggle="collapse" href="#faqq4"
                                role="button" aria-expanded="false" aria-controls="collapseExample">Question #4</a>
                            &nbsp;|&nbsp;
                            <div class="collapse" id="faqq4">
                                <div class="txtl ps-4 txt-light">
                                    Answer #4 <br />
                                </div>
                            </div>
                            <a class="footer-cs-list-i ps-2 txt-light" data-bs-toggle="collapse" href="#faqq5"
                                role="button" aria-expanded="false" aria-controls="collapseExample">Question #5</a>
                            &nbsp;|&nbsp;
                            <div class="collapse" id="faqq5">
                                <div class="txtl ps-4 txt-light">
                                    Answer #5 <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="animazooki-tracking">
                    <div class="card card-body bg-light-inv txtl ps-4">
                        You may go to your order-page and see the tracking status of your merch.<br />
                        &nbsp;In addition, here our our freight partners the you might ask about the status of your
                        parcel<br />&nbsp;by using their tracking app.
                        &nbsp;Copy the Tracking Number in your order-page and paste it in their tracking app.
                    </div>
                </div>
                <div class="collapse" id="animazooki-RnR">
                    <div class="card card-body bg-light-inv txtl ps-4">
                        For Return and Refund, you may contact our customer service in the chat.<br />
                        <p>&nbsp;Please read the Terms and
                                    Conditions in <strong><a href="#" target="_blank" onclick="popdev()">Return and Refund</a></strong> section for validity of your
                            return/refund.
                    </div>
                </div>
                <div class="collapse" id="animazooki-TnC">
                    <div class="card card-body bg-light-inv txtl ps-4">
                        <p>You may read our whole <strong>T&C</strong> on the other page by clicking <a href="#"
                                target="_blank" onclick="popdev()">here.</a>
                    </div>
                </div>
                <div class="collapse" id="animazooki-privacy-policy">
                    <div class="card card-body bg-light-inv txtl ps-4">
                        <p>In accordance to Republic Act No. 10173, otherwise known as the Data Privacy Act,<br />you
                            may read our whole <strong>Privacy Policy</strong> on the other page by clicking <a href="#"
                                target="_blank" onclick="popdev()">here.</a>
                    </div>
                </div>
                <div class="collapse" id="animazooki-contact-us">
                    <div class="card card-body bg-light-inv txtl ps-4">
                        You may reach us out here!<br />
                        &nbsp;&nbsp;E-mail: animazooki@gmail.com<br />
                        &nbsp;&nbsp;Phone number:+6399 999 9999<br />
                        &nbsp;&nbsp;Fax: 999 999 999

                    </div>
                </div>

            </div>
        </div>

        <div class="footer-linker rwflx w100 m-0 footer-box px-5 py-1">
            <div class="in-footer-abt-shop clflx w33 txtl m-4">
                <div>
                    <h5 class="txt-light">About the Shop</h5>
                </div>
                <div>
                    <p class="ps-3 txt-light">Ξ Wear Your Inner Anime Delusions Ξ</p>
                    <br />
                    <p class="ps-3 txt-light">A fantasy is not always that bad. You might even find your courage from it.
                    </p>
                </div>
            </div>
            <div class="in-footer-links clflx w33 txtl m-3">
                <div class="footer-links-label txt-light">
                    <h5>Helpful Links</h5>
                </div>
                <div class="footer-links-list clflx txtl ps-3 foot-txt">
                    <a class="footer-cs-list-i txt-light" href="">Sign-in</a>
                    <a class="footer-cs-list-i txt-light" href="" onclick="popdev()">Refer a friend</a>
                    <a class="footer-cs-list-i txt-light" href="" onclick="popdev()">News</a>
                    <a class="footer-cs-list-i txt-light" href="" onclick="popdev()">More about animazooki. . .</a>
                    <a class="footer-cs-list-i txt-light" href="" onclick="popdev()">Collab with us!</a>
                </div>
            </div>
            <div class="in-footer-debug clflx w33 txtc m-3">
                <div class="footer-debug txt-light">
                    <h5>Seeing bugs? help us improve~</h5>
                </div>
                <div class="">
                    <img class="p-2 m-2 footer-img" src="/assets/img/footer/bug-svgrepo-com.png"
                        style="border: 2px solid salmon; border-radius: 4px;">
                </div>
                <div class="footer-debug-button txt-light">
                    <a class="txt-light foot-txt" onclick="popdev()">Send Feedback</a>
                </div>
            </div>
        </div>
        <div class="footer-copyright txtc py-1 px-4 footer-box txt-light">
            <h6>©2023 Animazooki.&nbsp;All Rights Reserved.</h6>
            <br />
            <h6 class="author">&nbsp;Designed and Developed by Scheidj Villados</h6>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0de39995d2.js" crossorigin="anonymous"></script>
    <script src="/assets/js/script.js"></script>
</body>

</html>