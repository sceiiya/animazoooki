<?php

    require_once('important/class.database.php');

    session_start();                    
        
    try{
        $ConDB = new ClassDbConn;
        $eCon = $ConDB->NewCon();
        if ($eCon == true){
            // $newotp = ['otp_code' => rand(100000, 999999)];
            // $of = ['username' => $_SESSION['username']];
            $OTP = $_POST['otp'];
            $timestamp =  $_SERVER["REQUEST_TIME"];  // record the current time stamp 
            if(($timestamp - $_SESSION['time']) > 300)  // 300 refers to 300 seconds
            
            $of = ['username' => $_SESSION['username']];
            $valid = $ConDB->GSelect($eCon, 'clients', $of, '', '');
            // $eUpdate = $ConDB->Update($eCon, 'clients', $newotp, $of);
                // if($valid['otp_code'] == $_POST['otp']){
                if($valid['otp_code'] == $OTP){
                    $upd = ['status' => 'active', 'otp_code' => ''];
                    $eUpdate = $ConDB->Update($eCon, 'clients', $upd, $of);
                    echo "true";
                }elseif(!($valid['otp_code'] == $OTP)){
                    echo "false";
                }else{
                    $_SESSION['error'] = $valid;
                    header("Location: error_logger.php");
                    exit();
                }
        }    
    }catch(Exception $e){
        $_SESSION['error'] = $e->getMessage();
        header("Location: error_logger.php");
        exit();
    } 