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
        'status' => 'Spectating'
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
        'email' => addslashes($newGuest['email']),
        'theme' => addslashes($newGuest['theme']),
        'status' => addslashes($newGuest['status']),
        'date_added' => addslashes(date("Y-m-d H:i:s"))
    ];
    // echo json_encode($newGuestDB);
    // echo "<br/>";
    $ThrowData = json_encode($newGuest);
    echo $ThrowData;

    require_once("important/class.database.php");

    $ConDB = new ClassDbConn;
    $eCon = $ConDB->NewCon();
    if($eCon == true){
        try{
        $GenGuest = $ConDB->Insert($eCon, 'clients', $newGuestDB);
            if ($GenGuest == true){
                return true;
            }else{
                return false;
            }
        }catch(Exception $e){
            $_SESSION['error'] = $e->getMessage();
            header("Location: error_logger.php");
            exit();
        }
    }else{
        return "not connected";
    }