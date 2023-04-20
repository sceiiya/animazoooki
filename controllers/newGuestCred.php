<?php

    session_start();
    $guestUN = 'guest_';
    $guestN = 'zooki_';
    $guestNNN = substr(sha1(mt_rand()),17,6);
    $nGuestUN = $guestUN.$guestNNN;
    $nGuestN = $guestN.$guestNNN;
    $newGuest = [
        'id' => '',
        'username' => $nGuestUN,
        'name' => $nGuestN,
        'email' => 'Register to Enter Email',
        'theme' => 'light',
        'status' => 'spectating'
    ];

    $newGuestDB = [
        'username' => $newGuest['username'],
        'name' =>  $newGuest['name'],
        'email' => $newGuest['email'],
        'theme' => $newGuest['theme'],
        'status' => $newGuest['status'],
        'date_added' => date("Y-m-d H:i:s")
    ];
    echo json_encode($newGuestDB);
    echo "<br/>";
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