<?php

    session_start();
    $guestUN = 'guest_';
    $guestN = 'zooki_';
    $guestNNN = substr(sha1(mt_rand()),17,6);
    $nGuestUN = $guestUN += $guestNNN;
    $nGuestN = $guestN += $guestNNN;
    $newGuest = [
        'username' => $nGuestUN,
        'name' => $nGuestN,
        'email' => 'Register to Enter Email',
        'theme' => 'light',
        'status' => 'spectating'
    ];

    $newGuestDB = [
        'username' => $newGuest['username'],
        'name' =>  $newGuest[''],
        'email' => $newGuest[''],
        'theme' => $newGuest[''],
        'status' => $newGuest['status'],
        'status' => $newGuest['status']
    ];

    echo json_encode($newGuest);

    require_once("important/class.database.php");

    $ConDB = new ClassDbConn;
    $eCon = $ConDB->NewCon();
    if($eCon == true){
        try{
        $GenGuest = $ConDB->Insert($eCon, 'clients', $newGuestDB);
            if ($GenGuest == true){
                return 'new guest';
            }else{
                return $e->getMessage();
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }else{
        return "not connected";
    }