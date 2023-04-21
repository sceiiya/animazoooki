<?php

    session_start();

    $guestUN = 'guest_';
    $guestN = 'zooki_';
    $guestNNN = substr(sha1(mt_rand()),17,6);
    $nGuestUN = $guestUN.$guestNNN;
    $nGuestN = $guestN.$guestNNN;
    $newGuest = [
        'username' => $nGuestUN,
        'name' => $nGuestN,
        'email' => 'Register to Enter Email',
        'theme' => 'light',
        'status' => 'spectating'
    ];

    $_SESSION['username'] = $newGuest['username'];   
    $_SESSION['fullname'] = $newGuest['name'];    
    $_SESSION['email'] = $newGuest['email'];
    $_SESSION['cellno'] = "Please log in to see info!";
    $_SESSION['shipping_add'] = "Please log in to see info!";
    $_SESSION['billing_add'] = "Please log in to see info!";
    $_SESSION['ttl_ordrs'] = "Please log in to see info!";
    $_SESSION['ttl_rvws'] = "Please log in to see info!";
    $_SESSION['status'] = $newGuest['status'];



    $newGuestDB = [
        'username' =>  addslashes($newGuest['username']),
        'name' =>  addslashes($newGuest['name']),
        'email' => $newGuest['email'],
        'theme' => $newGuest['theme'],
        'status' => $newGuest['status'],
        'date_added' => date("Y-m-d H:i:s")
    ];
    // echo json_encode($newGuestDB);
    // echo "<br/>";
    echo json_encode($newGuest);

    require_once("important/class.database.php");

    $ConDB = new ClassDbConn;
    $eCon = $ConDB->NewCon();
    if($eCon == true){
        try{
        $GenGuest = $ConDB->Insert($eCon, 'guest', $newGuestDB);
            if ($GenGuest == true){
                return 'new guest';
            }else{
                return $e->getMessage();
            }
        }catch(Exception $e){
            $_SESSION['error'] = $e->getMessage();
            header("Location: error_logger.php");
            exit();
        }
    }else{
        return "not connected";
    }