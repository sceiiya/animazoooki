<?php

require_once("important/class.database.php");

session_start();

try{
    $ConDB = new ClassDbConn;
    $eCon = $ConDB->NewCon();
    if ($eCon == true){
        $rcvd = [
            'order_status' => 'Delivered',
            'date_delivered' => date("Y-m-d H:i:s"),
        ];
        $of = ['order_code' => $_POST['cID']];
        $eUpdate = $ConDB->Update($eCon, 'orders', $rcvd, $of);
            if($eUpdate == "true"){
                echo "updated";
            }
    }    
}catch(Exception $e){
    $_SESSION['error'] = $e->getMessage();
    header("Location: error_logger.php");
    exit();
} 