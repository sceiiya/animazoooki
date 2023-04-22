<?php

require_once("important/class.database.php");

session_start();

try{
    $ConDB = new ClassDbConn;
    $eCon = $ConDB->NewCon();
    if ($eCon == true){
        $user = [
            'username' => $_POST['username'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'contactno' => $_POST['cellno'],
            'default_shipping_address' => $_POST['ShipAd'],
            'billing_address' => $_POST['BillAd'],
            'date_modified' => date("Y-m-d H:i:s")
        ];
        $of = ['username' => $_SESSION['username']];
        $eUpdate = $ConDB->Update($eCon, 'clients', $user, $of);
            if($eUpdate == "true"){
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['fullname'] = $_POST['name'];    
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['cellno'] = $_POST['cellno'];
                $_SESSION['shipping_add'] = $_POST['ShipAd'];
                $_SESSION['billing_add'] = $_POST['BillAd'];
                // $_SESSION['ttl_ordrs'] = $Data['total_orders'];
                // $_SESSION['ttl_rvws'] = $Data['total_reviews'];
                echo "updated";
            }
    }    
}catch(Exception $e){
    $_SESSION['error'] = $e->getMessage();
    header("Location: error_logger.php");
    exit();
} 