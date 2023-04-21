<?php     
    // session_start(); 
    try{
    // $uUname = $_SESSION['username'];
    if(!isset($_SESSION['username'])){
        try{
        echo '<script type="text/javascript"> newguest();</script>';
        var_dump($_SESSION);
        echo !isset($_SESSION['username']);
        // $_SESSION['name'] = "guest";
        // header('Location: /activity_website/register.php');
        // echo 'the username is '.$_SESSION['username'].'<br/>';
        }catch(Exception $e){
            // return "false";
            echo $e->getMessage();
        }
    }elseif(isset($_SESSION['username']) && str_contains($_SESSION['username'], 'guest')){
        // return true;
        var_dump($_SESSION);
        echo "is a guest";
    }elseif(isset($_SESSION['username']) && !str_contains($_SESSION['username'], 'guest')){
        $uUid = $_SESSION['userid'];    
        $uName = $_SESSION['fullname'];
        $uEmail = $_SESSION['email'];
        $uStatus = $_SESSION['status'];
        // echo "not a guest";
        var_dump($_SESSION);
    }
    }catch(Exception $e){
        $e->getMessage();
        return "false";
    }