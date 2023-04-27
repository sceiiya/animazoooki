<?php

    require_once('important/class.database.php');

    session_start();                    
        
    try{
        $ConDB = new ClassDbConn;
        $eCon = $ConDB->NewCon();
        if ($eCon == true){
            $newotp = ['otp_code' => rand(100000, 999999)];
            $of = ['username' => $_SESSION['username']];
            $eUpdate = $ConDB->Update($eCon, 'clients', $newotp, $of);
                if($eUpdate == "true"){
                    echo "otp-sent";
                }
        }    
    }catch(Exception $e){
        $_SESSION['error'] = $e->getMessage();
        header("Location: error_logger.php");
        exit();
    } 