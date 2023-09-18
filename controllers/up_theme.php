<?php
require_once("important/class.database.php");
session_start();
try{
    $ConDB = new ClassDbConn;
    $eCon = $ConDB->NewCon();
    if ($eCon == true){
        $user = [
            'theme' => $_POST['theme'],
        ];
        $of = ['id' => $_SESSION['userid']];
        $eUpdate = $ConDB->Update($eCon, 'clients', $user, $of);
            if($eUpdate == "true"){
                echo "updated";
            }
    }    
}catch(Exception $e){
    $_SESSION['error'] = $e->getMessage();
    header("Location: error_logger.php");
    exit();
} 