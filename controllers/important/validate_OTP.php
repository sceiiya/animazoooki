<?php

    require_once('important/class.database.php');

    session_start();                    
        
    try{
        $ConDB = new ClassDbConn;
        $eCon = $ConDB->NewCon();
        if ($eCon == true){
            // $newotp = ['otp_code' => rand(100000, 999999)];
            $of = ['username' => $_SESSION['username']];
            $valid = $ConDB->GSelect($eCon, 'clients', 'otp_code', $_POST['otp']);
            // $eUpdate = $ConDB->Update($eCon, 'clients', $newotp, $of);
                if($valid == "true"){
                    $upd = ['status' => 'active'];
                    $eUpdate = $ConDB->Update($eCon, 'clients', $upd, $of);
                    echo "otp-sent";
                }elseif($valid == 'false'){

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