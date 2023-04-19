    <?php     
    session_start(); 

    if(!isset($_SESSION['username'])){
        $_SESSION['name'] = "guest";
        // header('Location: /activity_website/register.php');
    }else{
        $uUname = $_SESSION['username'];
        $uUid = $_SESSION['userid'];    
        $uName = $_SESSION['fullname'];
        $uEmail = $_SESSION['email'];
        $uStatus = $_SESSION['status'];
    }

    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/img/animazooki-b.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/assets/img/animazooki-b.png" />
    <link rel="apple-touch-icon-precomposed" href="/assets/img/animazooki-b.png" />
    <link rel="icon" href="/assets/img/animazooki-b.png" sizes="any">
    <link rel="icon" href="/assets/img/animazooki-b.png" type="image/svg+xml">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" media="screen and (min-device-width: 1200px)" href="/assets/css/desktop-style.css" />
    <link rel="stylesheet" media='screen and (min-width: 800px) and (max-width: 1199px)' href='/assets/css/medium-style.css' />
    <link rel="stylesheet" media='screen and (min-width: 100px) and (max-width: 799px)' href='/assets/css/mobile-style.css' />
    <link rel="stylesheet" href='/assets/css/styles.css'/>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>