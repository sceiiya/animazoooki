<?php
    include("../important/connect_DB.php");

    if ($dbConnection == true) {
        $index = $_POST['index'];

        $dateTime = date("Y-m-d H:i:s");
        $qUpdate = "UPDATE $dbDatabase .`adminusers` SET `date_deactivated` = '{$dateTime}', `status` = 'Inactive' WHERE `adminid` = '{$index}'";
        $eUpdate = mysqli_query($dbConnection, $qUpdate);

        if ($eUpdate == true) {
            echo "Account Deactivated!";
        } else {
            echo "Failed to process, please call system administrator!";
         }
         
    } else {
        echo "Failed to connect, please call system administrator!";
    }