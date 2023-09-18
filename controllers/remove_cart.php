<?php
require_once("important/class.database.php");
session_start();
try{
    $ConDB = new ClassDbConn;
    $eCon = $ConDB->NewCon();
    if ($eCon == true){
        $cartI = [
            'date_removed' => date("Y-m-d H:i:s"),
        ];
        $of = ['id' => $_POST['cID']];
        $eUpdate = $ConDB->Update($eCon, 'clientcart', $cartI, $of);
            if($eUpdate == "true"){
                echo "updated";
            }
    }    
}catch(Exception $e){
    $_SESSION['error'] = $e->getMessage();
    header("Location: error_logger.php");
    exit();
} 