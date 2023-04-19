<?php
    include("../important/connect_DB.php");

    session_start();

    if(!isset($_SESSION['admusername'])){
        header('Location: /admin/login/index.php');
    }else{
        $admAccess = $_SESSION['admaccess'];
    }

    if ($dbConnection == true) {
        $index = $_POST['index'];

        $dateTime = date("Y-m-d H:i:s");
        $qUpdate = "UPDATE $dbDatabase .`clients` SET `date_modified` = '{$dateTime}', `status` = 'Inactive' WHERE `id` = '{$index}'";
        $eUpdate = mysqli_query($dbConnection, $qUpdate);

        if ($eUpdate == true) {
            echo "Account Deactivated!";
        } else {
            echo "Failed to process, please call system administrator!";
         }
         
    } else {
        echo "Failed to connect, please call system administrator!";
    }