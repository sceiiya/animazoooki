    <?php session_start();     ob_start(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/img/animazooki-b.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/assets/img/animazooki-b.png" />
    <link rel="apple-touch-icon-precomposed" href="/assets/img/animazooki-b.png" />
    <link rel="icon" href="/assets/img/animazooki-b.png" sizes="any">
    <link rel="icon" href="/assets/img/animazooki-b.png" type="image/svg+xml">
    <script>function GetCDNFailed(){const screenBlocker = document.getElementById("SlownNoInternet");screenBlocker.style.display = "block";}</script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" onerror="GetCDNFailed()"/>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" onerror="GetCDNFailed()"/> -->
    <link rel="stylesheet" href="/assets/css/toastr.min.css">
    <link rel="stylesheet" media="screen and (min-device-width: 1200px)" href="/assets/css/desktop-style.css" />
    <link rel="stylesheet" media='screen and (min-width: 800px) and (max-width: 1199px)' href='/assets/css/medium-style.css' />
    <link rel="stylesheet" media='screen and (min-width: 100px) and (max-width: 799px)' href='/assets/css/mobile-style.css' />
    <link rel="stylesheet" href='/assets/css/styles.css'/>
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script> -->

    <div id="SlownNoInternet" class="bg-cloud" style="display:none; position:fixed; z-index:99999999999999999999999999999; top:50; left:50; width:100%; height:100%; margin:auto;">
        <div style="margin-top:40vh; display:flex; flex-direction:column">
            <span>
                <p style="color: #a50113; text-shadow: 1px 1px #000000"><strong>Slow Internet or No connection</strong></p>
            </span>
            <br>
            <span>
                <p><strong>Please refresh the page or connect to your Internet</strong></p>
            </span>
            <br>
            <span>
                <p><em>
                408 Request Time-out
                </em></p>
            </span>
        </div>
    </div>
    <div class="position-absolute top-50 start-50 translate-middle" id="LoadingSpinner" style="display: none;">
    <div class="spinner-border text-danger"></div>
    </div>
    <div class="position-absolute top-50 start-50 translate-middle" id="LoadingSpinner" style="display: none;">
    <div class="spinner-border text-danger"></div>
    </div>
    <script>
        //for product img error prod
        async function ProdimgPlaceholder(img) {
          img.onerror = "";
          img.src ="/all-products/animazoooki_onload.png";
        }

        //for product img error in outer pgs
            async function DEFOimgPlaceholder(img) {
          img.onerror = "";
          img.src ="/animazoooki_onload.png";
        }
    </script>
