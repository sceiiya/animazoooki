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
            // $OTP = 625296;
            $timestamp =  $_SERVER["REQUEST_TIME"];  
            // $timestamp =  '1682784577';
            // $timestamp =  date("Y-m-d H:i:s"); // record the current time stamp 
            // if(($timestamp - $_SESSION['time']) > 600)  // 300 refers to 300 seconds

            // $of = ['username' => 'sceiiya'];
            $of = ['username' => $_SESSION['username']];
            $valid = $ConDB->GSelect($eCon, 'clients', $of, '', '');
            // $eUpdate = $ConDB->Update($eCon, 'clients', $newotp, $of);
                // if($valid['otp_code'] == $_POST['otp']){
                if($valid['otp_code'] == $OTP){
                    if(($timestamp - $valid['new_otp_dt']) > 600){
                        echo 'expired';
                    }else{
                        $upd = ['status' => 'Active', 'otp_code' => ''];
                        $eUpdate = $ConDB->Update($eCon, 'clients', $upd, $of);
                        echo "true";
                    }
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