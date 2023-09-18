<?php
    require_once('important/class.database.php');
    session_start();                    
    try{
        $ConDB = new ClassDbConn;
        $eCon = $ConDB->NewCon();
        if ($eCon == true){
            $OTP = $_POST['otp'];
            $timestamp =  $_SERVER["REQUEST_TIME"];  
            $of = ['username' => $_SESSION['username']];
            $valid = $ConDB->GSelect($eCon, 'clients', $of, '', '');
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