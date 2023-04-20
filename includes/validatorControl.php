<?php     
    session_start(); 

    if(!isset($_SESSION['username'])){
        echo '<script type="text/javascript"> newguest();</script>';
        // $_SESSION['name'] = "guest";
        // header('Location: /activity_website/register.php');
        // echo 'the username is '.$_SESSION['username'].'<br/>';
    }elseif(str_contains($_SESSION['username'], 'guest')){
        // echo "is a guest";
    }elseif(!str_contains($_SESSION['username'], 'guest')){
        $uUname = $_SESSION['username'];
        $uUid = $_SESSION['userid'];    
        $uName = $_SESSION['fullname'];
        $uEmail = $_SESSION['email'];
        $uStatus = $_SESSION['status'];
        // echo "not a guest";
    }