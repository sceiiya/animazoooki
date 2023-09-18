<?php
    include("../important/connect_DB.php");
    session_start();

    if(!isset($_SESSION['admusername'])){
        header('Location: /admin/index.php');
    }else if( $_SESSION['admaccess'] == 'Agent') {
        header('Location: /admin/index.php');
    }else if( $_SESSION['admaccess'] == 'Supervisor') {
        header('Location: /admin/index.php');
    }else {
        $admAccess = $_SESSION['admaccess'];
        $admUsername = $_SESSION['admusername'];
    }

    if ($dbConnection == true) {
        $index = $_POST['index'];

        $dateTime = date("Y-m-d H:i:s");
        $qUpdate = "UPDATE $dbDatabase .`adminusers` SET `date_deactivated` = '{$dateTime}', `status` = 'Inactive', `deactivated_by` = '{$admUsername}' WHERE `adminid` = '{$index}'";
        $eUpdate = mysqli_query($dbConnection, $qUpdate);

        if ($eUpdate == true) {
            echo "Account Deactivated!";
        } else {
            echo "Failed to process, please call system administrator!";
         }
    } else {
        echo "Failed to connect, please call system administrator!";
    }